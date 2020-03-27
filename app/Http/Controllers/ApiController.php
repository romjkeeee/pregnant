<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

use Auth;
use App\City;
use App\Clinic;
use App\Content;
use App\Doctor;
use App\Duration;
use App\Msg;
use App\Patient;
use App\Region;
use App\Review;
use App\Spec;
use App\AuthHistory;

class ApiController extends Controller {
    
    public static $home = 'http://med.weedoo.ru/';
    
    /* JSON ответ */
    public function json_response($status, $message, $data = null) {
        
        $response = [
          
            'status' => $status,
            'message' => $message,
            
        ];
        
        if ($data) {
            $response['data'] = $data;
        }
        
        header('Content-Type: application/json');
        die(json_encode($response, JSON_UNESCAPED_UNICODE));
        
    }
    
    /* Проверка токена авторизации */
    public function check_token(Request $request) {
        
        if (!$request->input('token')) {
            Self::json_response(400, 'Token Missing');
        }
        
        $auth = AuthHistory::where(['token' => $request->input('token')])->first();
		if (!$auth) {
			Self::json_response(400, 'Token Wrong');
		}
		
		$type = $auth->type;
		$user_id = $auth->user_id;
		
		if ($type == 'doctor') {
			$user = Doctor::find($user_id);
		}
		else {
			$user = Patient::find($user_id);
		}
		
		if (!$user or $user->token !== $request->input('token')) {
			Self::json_response(400, 'Token Wrong');
		}
        
        return $user->id;
        
    }
    
    /* Проверка обязательных полей */
    public function check_required($required, Request $request) {
        
        if (!is_array($required)) {
            return false;
        }
        
        $data = [];
        foreach ($required as $field) {
            if (!$request->input($field)) {
                $data[] = 'Field "'.$field.'" Required';
            }
        }
        
        if ($data) {
            Self::json_response(400, 'Parameters Missing', $data);
        }
        
        return true;
        
    }
	
	/* Авторизация врача */
	public function login_doctor(Request $request) {
		
		/* Обязательные */
		$required = [
		
			'phone',
			'password',
		
		];
		
		Self::check_required($required, $request);
		
		/* Попытка авторизации */
		$cred = $request->only('phone', 'password');		
		$cred['phone'] = urldecode($cred['phone']);
		$cred['phone'] = '+'.$cred['phone'];

		$auth = Auth::guard('doctor')->attempt($cred);

		if (!$auth) {
			Self::json_response(400, 'Wrong Phone / Password');
		}
		
		/* ID */
		$user_id = Doctor::where(['phone' => $cred['phone']])->first();
		if (!$user_id) {
			Self::json_response(400, 'Something went wrong');
		}
		
		/* Токен + Сессия */
		$token = sha1('tok'.$cred['phone'].rand(100, 999));
		
		$user = Doctor::find($user_id->id);
		$user->token = $token;
		$user->save();
		
		$ah = new AuthHistory;
		$ah->fill(['token' => $token, 'type' => 'doctor', 'user_id' => $user_id->id]);
		$ah->save();
		
		Self::json_response(200, 'Success', ['token' => $token]);
		
	}
	
	/* Авторизация пациента */
	public function login_patient(Request $request) {
		
		/* Обязательные */
		$required = [
		
			'phone',
			'password',
		
		];
		
		Self::check_required($required, $request);
		
		/* Попытка авторизации */
		$cred = $request->only('phone', 'password');		
		$cred['phone'] = urldecode($cred['phone']);
		$cred['phone'] = '+'.$cred['phone'];

		$auth = Auth::guard('patient')->attempt($cred);

		if (!$auth) {
			Self::json_response(400, 'Wrong Phone / Password');
		}
		
		/* ID */
		$user_id = Patient::where(['phone' => $cred['phone']])->first();
		if (!$user_id) {
			Self::json_response(400, 'Something went wrong');
		}
		
		/* Токен + Сессия */
		$token = sha1('tok'.$cred['phone'].rand(100, 999));
		
		$user = Patient::find($user_id->id);
		$user->token = $token;
		$user->save();
		
		$ah = new AuthHistory;
		$ah->fill(['token' => $token, 'type' => 'patient', 'user_id' => $user_id->id]);
		$ah->save();
		
		Self::json_response(200, 'Success', ['token' => $token]);
		
	}

	/* Регистрация врача */
	public function signup_doctor($step, Request $request) {
				
		/* Регистрация и отправка СМС */
		$phone = '+'.$request->input('phone');
		
		if ($step == '1') {

			/* Обязательные */
			$required = [
			
				'last_name',
				'name',
				'phone',
				'password',
			
			];
			
			Self::check_required($required, $request);
			
			if (strlen($request->input('password')) < 6) {
				Self::json_response(400, 'Password must contain at least 6 symbols!');
			}
			
			/* Проверка существования телефона */
			$phone_ex = Doctor::where(['phone' => $phone])->first();
			if ($phone_ex) {
				Self::json_response(404, 'Phone Exists');
			}
			
			/* SMS */
			$code = rand(1000, 9999);
			
			/* Регистрация */
			$data = $request->all();
			$data['code'] = $code;
			$data['phone'] = '+'.$data['phone'];
			$data['password'] = Hash::make($data['password']);
			
			$doctor = new Doctor;
			$doctor->fill($data);
			$doctor->save();
			
			/* Отсылаем SMS */
			$url = 'https://smsc.ru/sys/send.php?login=veaceslav_c&psw=sb782841&phones='.$phone.'&mes=Medical Code: '.$code;
			file_get_contents($url);
			
			Self::json_response(200, 'Registered', ['user_id' => $doctor->id, 'code' => $code]);
			
		}
		else {
			
			/* Обязательные */
			$required = [
			
				'phone',
				'code',
			
			];
			Self::check_required($required, $request);
			
			/* Ищем врача */
			$phone_ex = Doctor::where(['phone' => $phone])->first();
			if (!$phone_ex) {
				Self::json_response(404, 'Phone Wrong');
			}

			if ($phone_ex->code !== $request->input('code')) {
				Self::json_response(404, 'Code Wrong');
			}

			/* Обновляем */
			$data = $request->all();
			$data['phone'] = '+'.$data['phone'];
			$data['confirmed'] = true;
			
			$doctor = Doctor::find($phone_ex->id);
			$doctor->fill($data);
			$doctor->save();
			
			Self::json_response(200, 'Confirmed', ['user_id' => $doctor->id]);
			
		}		
		
	}

	/* Регистрация пациента */
	public function signup_patient($step, Request $request) {
				
		/* Регистрация и отправка СМС */
		$phone = '+'.$request->input('phone');
		
		if ($step == '1') {

			/* Обязательные */
			$required = [
			
				'date_of_birth',
				'last_name',
				'name',
				'phone',
				'password',
			
			];
			
			Self::check_required($required, $request);
			
			if (strlen($request->input('password')) < 6) {
				Self::json_response(400, 'Password must contain at least 6 symbols!');
			}
			
			/* Проверка существования телефона */
			$phone_ex = Patient::where(['phone' => $phone])->first();
			if ($phone_ex) {
				Self::json_response(404, 'Phone Exists');
			}
			
			/* SMS */
			$code = rand(1000, 9999);
			
			/* Регистрация */
			$data = $request->all();
			$data['code'] = $code;
			$data['date_of_birth'] = date('Y-m-d', strtotime($data['date_of_birth']));
			$data['phone'] = '+'.$data['phone'];
			$data['password'] = Hash::make($data['password']);
			
			$patient = new Patient;
			$patient->fill($data);
			$patient->save();
			
			/* Отсылаем SMS */
			$url = 'https://smsc.ru/sys/send.php?login=veaceslav_c&psw=sb782841&phones='.$phone.'&mes=Medical Code: '.$code;
			file_get_contents($url);
			
			Self::json_response(200, 'Registered', ['user_id' => $patient->id, 'code' => $code]);
			
		}
		else {
			
			/* Обязательные */
			$required = [
			
				'phone',
				'code',
			
			];
			Self::check_required($required, $request);
			
			/* Ищем пациента */
			$phone_ex = Patient::where(['phone' => $phone])->first();
			if (!$phone_ex) {
				Self::json_response(404, 'Phone Wrong');
			}

			if ($phone_ex->code !== $request->input('code')) {
				Self::json_response(404, 'Code Wrong');
			}

			/* Обновляем */
			$data = $request->all();
			$data['phone'] = '+'.$data['phone'];
			$data['confirmed'] = 1;
			
			$patient = Patient::find($phone_ex->id);
			$patient->fill($data);
			$patient->save();
			
			Self::json_response(200, 'Confirmed', ['user_id' => $patient->id]);
			
		}		
		
	}

    /* Список регионов */
    public function get_regions(Request $request) {
        
        Self::check_token($request);
        
        $list = Region::get();

        Self::json_response(200, 'Success', $list->toArray());
        
    }

    /* Список городов */
    public function get_cities(Request $request) {
        
        Self::check_token($request);
        
		if (!$request->input('region_id')) {
			$list = City::get();
		}
		else {
			$list = City::where(['region_id' => $request->input('region_id')])->get();
		}

        Self::json_response(200, 'Success', $list->toArray());
        
    }  

    /* Список недель */
    public function get_durations(Request $request) {
        
        Self::check_token($request);
        
		$list = Duration::get();
		if ($list->count()) {
			foreach ($list as $rec) {
				
				$rec->photo = Self::$home.'/'.$rec->photo;
				$rec->photo = trim(str_replace('photo//', 'photo/', $rec->photo));
				
			}
		}

        Self::json_response(200, 'Success', $list->toArray());
        
    }

    /* Список специализаций */
    public function get_spec(Request $request) {
        
        Self::check_token($request);
        
		$list = Spec::get();
		if ($list->count()) {
			foreach ($list as $rec) {
				
				if (!$rec->photo) {
					continue;
				}
				
				$rec->photo = Self::$home.'/'.$rec->photo;
				$rec->photo = trim(str_replace('spec//', 'photo/', $rec->photo));
				
			}
		}

        Self::json_response(200, 'Success', $list->toArray());
        
    }

    /* Список клиник */
    public function get_clinics(Request $request) {
        
        Self::check_token($request);
        
		$list = Clinic::get();
		if ($list->count()) {
			foreach ($list as $rec) {
				
				/* Регион */
				$this_region = Region::find($rec->region_id);
				if ($this_region) {
					$rec->region_info = $this_region->toArray();
				}
				
				/* Город */
				$this_city = City::find($rec->city_id);
				if ($this_city) {
					$rec->city_info = $this_city->toArray();
				}
				
			}
		}

        Self::json_response(200, 'Success', $list->toArray());
        
    }

    /* Список отзывов */
    public function get_reviews(Request $request) {
        
        Self::check_token($request);
        
		if (!$request->input('clinic_id') && !$request->input('doctor_id')) {
			$list = Review::get();
		}
		else {
			
			if ($request->input('clinic_id')) {
				$list = Review::where(['is_for' => 'clinic', 'for_id' => $request->input('clinic')])->get();
			}
			if ($request->input('doctor_id')) {
				$list = Review::where(['is_for' => 'doctor', 'for_id' => $request->input('doctor_id')])->get();
			}
			
		}
		
		if ($list->count()) {
			foreach ($list as $rec) {
				
				/* Пациент */
				$this_patient = Patient::find($rec->user_id);
				if ($this_patient) {
					$rec->patient = $this_patient->toArray();
				}
				
				/* Кому отзыв */
				if ($rec->is_for == 'doctor') {
					$this_for = Doctor::find($rec->for_id);
				}
				else {
					$this_for = Clinic::find($rec->for_id);
				}
				
				if ($this_for) {
					$rec->for = $this_for->toArray();
				}
				
			}
		}

        Self::json_response(200, 'Success', $list->toArray());
        
    }

    /* Список новостей */
    public function get_news(Request $request) {
        
        Self::check_token($request);
        
		$list = Content::where(['post_type' => 'news'])->orderBy('id', 'desc')->get();

        Self::json_response(200, 'Success', $list->toArray());
        
    }
	
    /* Список статей */
    public function get_articles(Request $request) {
        
        Self::check_token($request);
        
		$list = Content::where(['post_type' => 'article'])->orderBy('id', 'desc')->get();

        Self::json_response(200, 'Success', $list->toArray());
        
    }
	
    /* Список рекомендаций */
    public function get_recomendations(Request $request) {
        
        Self::check_token($request);
        
		$list = Content::where(['post_type' => 'reco'])->orderBy('id', 'desc')->get();

        Self::json_response(200, 'Success', $list->toArray());
        
    }
	
    /* Список документов */
    public function get_documents(Request $request) {
        
        Self::check_token($request);
        
		$list = Content::where(['post_type' => 'doc'])->orderBy('id', 'desc')->get();

        Self::json_response(200, 'Success', $list->toArray());
        
    }
	
	/* Старт чата */
	public function chat_start($user_id, Request $request) {
		
		/* Обязательные */
		$required = [
		
			'token',
		
		];
		
		Self::check_required($required, $request);
		$my_id = Self::check_token($request);

		$chat_id = rand(100000, 999999);

		$new = new Msg;
		
		$new->chat_id = $chat_id;
		$new->sender_id = $my_id;
		$new->rec_id = $user_id;
		$new->text = 'Привет!';
		
		$new->save();
		
		Self::json_response(200, 'Success', ['chat_id' => $chat_id]);
		
	}
	
	/* Информация о докторе */
	public function doctor_info(Request $request) {
		
		/* Обязательные */
		$required = [
			
			'doctor_id',
			
		];
			
		Self::check_required($required, $request);
		
		$doctor = Doctor::find($request->input('doctor_id'));
		if (!$doctor) {
			Self::json_response(404, 'Doctor ID Wrong');
		}
		
		/* Специализации */
		$this_spec = json_decode($doctor->specialization, true);
		$spec = [];
		if ($this_spec) {
			foreach ($this_spec as $key => $spec_id) {
				
				$this_s = Spec::find($spec_id);
				if ($this_s) {
					$spec[$spec_id] = $this_s->name;
				}
				
			}
		}
		$doctor->specialization = $spec;
		
		/* Клиники */
		$this_clin = json_decode($doctor->clinics, true);
		$clin = [];
		if ($this_clin) {
			foreach ($this_clin as $key => $clin_id) {
				
				$this_s = Clinic::find($clin_id);
				if ($this_s) {
					$clin[$clin_id] = $this_s->toArray();
				}
				
			}
		}	
		$doctor->clinics = $clin;
		
		$doctor = $doctor->toArray();
		unset($doctor['code']);
		unset($doctor['token']);
		
		Self::json_response(200, 'Success', $doctor);
		
	}

	/* Информация о пациенте */
	public function patient_info(Request $request) {
		
		/* Обязательные */
		$required = [
			
			'patient_id',
			
		];
			
		Self::check_required($required, $request);
		
		$patient = Patient::find($request->input('patient_id'));
		if (!$patient) {
			Self::json_response(404, 'Patient ID Wrong');
		}
		
		/* Регион */
		$this_region = Region::find($patient->region_id);
		if ($this_region) {
			$patient->region = $this_region->toArray();
		}
	
		/* Город */
		$this_city = City::find($patient->city_id);
		if ($this_city) {
			$patient->city = $this_city->toArray();
		}
		
		/* Клиника */
		$this_clinic = Clinic::find($patient->clinic_id);
		if ($this_clinic) {
			$patient->clinic = $this_clinic->toArray();
		}
		
		/* Врач */
		$this_doctor = Doctor::find($patient->doctor_id);
		if ($this_doctor) {
			$patient->doctor = $this_doctor->toArray();
		}
		
		/* Неделя */
		$this_duration = Duration::find($patient->duration_id);
		if ($this_duration) {
			$patient->duration = $this_duration->toArray();
		}
		
		$patient = $patient->toArray();
		unset($patient['code']);
		unset($patient['token']);
		
		Self::json_response(200, 'Success', $patient);
		
	}
	
	/* Сообщение в чат */
	public function chat_send($chat_id, Request $request) {
		
		/* Обязательные */
		$required = [
		
			'token',
			'text',
		
		];
		
		Self::check_required($required, $request);
		$my_id = Self::check_token($request);
		
		$chat = Msg::where(['chat_id' => $chat_id])->first();

		$new = new Msg;
		
		$new->chat_id = $chat_id;
		$new->sender_id = $my_id;
		$new->rec_id = $chat->rec_id;
		$new->text = $request->input('text');
		
		$new->save();
		
		Self::json_response(200, 'Success', ['chat_id' => $chat_id, 'message' => $request->input('text')]);
		
	}
	
	/* Сообщения чата */
	public function chat_updates($chat_id, Request $request) {
		
		/* Обязательные */
		$required = [
		
			'token',
		
		];
		
		Self::check_required($required, $request);
		$my_id = Self::check_token($request);
		
		$chat = Msg::where(['chat_id' => $chat_id])->orderBy('id', 'desc')->get();

		Self::json_response(200, 'Success', ['chat_id' => $chat_id, 'messages' => $chat->toArray()]);
		
	}
    
}