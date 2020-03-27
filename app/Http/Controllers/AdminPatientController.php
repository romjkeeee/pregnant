<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

use App\Doctor;
use App\Clinic;
use App\Region;
use App\City;
use App\Patient;
use App\Duration;
use App\Review;

class AdminPatientController extends Controller {
	
    public function __construct() {
        $this->middleware('auth');
    }

    public function index(Request $request) {
		
		$list = Patient::orderBy('id', 'desc')->get();
		$search = $request->input('query');
		
		if ($search) {
			
			$list = Patient::where('last_name', 'LIKE', '%'.$search.'%')->
					orWhere('name', 'LIKE', '%'.$search.'%')->
					orWhere('second_name', 'LIKE', '%'.$search.'%')->
					orWhere('phone', 'LIKE', '%'.$search.'%')->get();

		}
		
		if ($list->count()) {
			foreach ($list as $rec) {
				
				/* Регион, Город */
				$rec->region = '&mdash;';
				$this_region = Region::find($rec->region_id);
				if ($this_region) {
					$rec->region = $this_region->name;
				}
				
				$rec->city = '&mdash;';
				$this_city = City::find($rec->city_id);
				if ($this_city) {
					$rec->city = $this_city->name;
				}
				
				/* Клиника */
				$rec->clinic = '&mdash;';
				$this_clinic = Clinic::find($rec->clinic_id);
				if ($this_clinic) {
					$rec->clinic = '<a href="'.route('admin_clinic_info', $rec->clinic_id).'">'.$this_clinic->name.'</a>';
				}
				
				/* Врач */
				$rec->doctor = '&mdash;';
				$this_doctor = Doctor::find($rec->doctor_id);
				if ($this_doctor) {
					$rec->doctor = '<a href="'.route('admin_med_info', $rec->doctor_id).'">'.$this_doctor->last_name.' '.$this_doctor->name.' '.$this_doctor->second_name.'</a>';
				}
				
				/* Беременность */			
				if ($rec->pregnant) {
					
					/* Срок */
					$this_duration = Duration::find($rec->duration_id);
					if ($this_duration) {
						$rec->pregnant = '<span class="badge badge-info">Беременность '.$this_duration->name.'</span>';
					}
					else {
						$rec->pregnant = '<span class="badge badge-info">Беременность. Срок не установлен</span>';
					}
					
				}
				else {
					$rec->pregnant = '<span class="badge badge-warning">Нет</span>';
				}
				
			}
		}
		
		/* */
		$return = [
		
			'page_title' => 'Список пациентов',
			'list' => $list,
			'search' => $search,
		
		];
		
        return view('patients', $return);
		
    }
	
	public function info($id, Request $request) {
		
		$rec = Patient::find($id);
		if (!$rec) {
			return redirect('/admin/patient')->with('error', 'Пациент не найден!');
		}

		/* Клиника */
		$rec->clinic = '&mdash;';
		$this_clinic = Clinic::find($rec->clinic_id);
		if ($this_clinic) {
			$rec->clinic = '<a href="'.route('admin_clinic_info', $rec->clinic_id).'">'.$this_clinic->name.'</a>';
		}
		
		/* Врач */
		$rec->doctor = '&mdash;';
		$this_doctor = Doctor::find($rec->doctor_id);
		if ($this_doctor) {
			$rec->doctor = '<a href="'.route('admin_med_info', $rec->doctor_id).'">'.$this_doctor->last_name.' '.$this_doctor->name.' '.$this_doctor->second_name.'</a>';
		}
		
		/* Отзывы */
		$reviews = Review::where(['is_for' => 'doctor', 'for_id' => $id])->orderBy('id', 'desc')->get();
		if ($reviews->count()) {
			foreach ($reviews as $rev) {
				
				/* Пациент */
				$rev->patient = 'не указан';
				$this_pat = Patient::find($rev->user_id);
				if ($this_pat) {
					$rev->patient = '<a href="'.route('admin_patient_info', $rev->user_id).'">'.$this_pat->last_name.' '.$this_pat->name.' '.$this_pat->second_name.'</a>';
				}
				
			}
		}
		
		/* Беременность */	
		if ($rec->pregnant) {
					
			/* Срок */
			$this_duration = Duration::find($rec->duration_id);
			if ($this_duration) {
				$rec->pregnant = '<span class="badge badge-info">Беременность '.$this_duration->name.'</span>';
			}
			else {
				$rec->pregnant = '<span class="badge badge-info">Беременность. Срок не установлен</span>';
			}
					
		}
		else {
			$rec->pregnant = '<span class="badge badge-warning">Нет</span>';
		}
		
		/* */
		$return = [
		
			'page_title' => 'Пациент '.$rec->last_name.' '.$rec->name.' '.$rec->second_name,
			'rec' => $rec,
			'reviews' => $reviews,
		
		];
		
		return view('patient_info', $return);
		
	}
	
	public function add(Request $request) {
		
		$rec = [	
		
			'region_id' => '',			
			'city_id' => '',			
			'clinic_id' => '',			
			'doctor_id' => '',			
			'duration_id' => '',			
			'date_of_birth' => '',			
			'last_name' => '',			
			'name' => '',			
			'second_name' => '',			
			'phone' => '',								
			'pregnant' => 0,								
			
		];
		
		/* Сохранение данных */
		if ($request->isMethod('post')) {
						
			/* Правила валидации */
			$rules = [	
			
				'region_id' => ['required'],				
				'city_id' => ['required'],				
				'last_name' => ['required'],				
				'name' => ['required'],				
				'second_name' => ['required'],				
				'date_of_birth' => ['required'],				
				'phone' => ['required'],							
				'password' => ['required', 'confirmed'],							
				
			];
			
			$validator_msg = [ 		
			
				'region_id.required' => 'Поле "Регион" обязательно для заполнения!',
				'city_id.required' => 'Поле "Город" обязательно для заполнения!',
				'last_name.required' => 'Поле "Фамилия" обязательно для заполнения!',
				'name.required' => 'Поле "Имя" обязательно для заполнения!',
				'second_name.required' => 'Поле "Отчество" обязательно для заполнения!',
				'date_of_birth.required' => 'Поле "Дата рождения" обязательно для заполнения!',
				'phone.required' => 'Поле "Телефон" обязательно для заполнения!',
				'password.required' => 'Поле "Пароль" обязательно для заполнения!',
				'password.confirmed' => 'Пароли не совпадают!',
				
			];
			
			$valid = Validator::make($request->all(), $rules, $validator_msg)->validate();
			
			/* */
			$new = new Patient;		

			$new->region_id = $request->input('region_id');
			$new->city_id = $request->input('city_id');
			$new->clinic_id = $request->input('clinic_id');
			$new->doctor_id = $request->input('doctor_id');
			$new->duration_id = $request->input('duration_id');
			$new->date_of_birth = date('Y-m-d', strtotime($request->input('date_of_birth')));
			$new->last_name = $request->input('last_name');
			$new->name = $request->input('name');
			$new->second_name = $request->input('second_name');
			$new->phone = $request->input('phone');
			$new->password = Hash::make($request->input('password'));
			$new->pregnant = $request->input('pregnant');

			$new->save();
			
			return redirect('/admin/patient')->with('success', 'Пациент добавлен');
			
		}

		/* */
		$return = [
		
			'page_title' => 'Добавить пациента',
			'rec' => (object)$rec,
			'regions' => Region::orderBy('name', 'asc')->get(),
			'cities' => City::orderBy('name', 'asc')->get(),
			'clinics' => Clinic::orderBy('name', 'asc')->get(),
			'doctors' => Doctor::orderBy('name', 'asc')->get(),
			'durations' => Duration::orderBy('id', 'desc')->get(),
			
		]; 
		
		return view('patient_form', $return);
		
	}
	
	public function edit($id, Request $request) {
				
		$rec = Patient::find($id);
		if (!$rec) {
			return redirect('/admin/patient')->with('error', 'Пациент не найден!');
		}
		
		/* Сохранение данных */
		if ($request->isMethod('post')) {
						
			/* Правила валидации */
			$rules = [	
			
				'region_id' => ['required'],				
				'city_id' => ['required'],				
				'last_name' => ['required'],				
				'name' => ['required'],				
				'second_name' => ['required'],				
				'date_of_birth' => ['required'],				
				'phone' => ['required'],							
				'password' => ['required', 'confirmed'],							
				
			];
			
			if (!$request->input('password')) {
				unset($rules['password']);
			}
			
			$validator_msg = [ 		
			
				'region_id.required' => 'Поле "Регион" обязательно для заполнения!',
				'city_id.required' => 'Поле "Город" обязательно для заполнения!',
				'last_name.required' => 'Поле "Фамилия" обязательно для заполнения!',
				'name.required' => 'Поле "Имя" обязательно для заполнения!',
				'second_name.required' => 'Поле "Отчество" обязательно для заполнения!',
				'date_of_birth.required' => 'Поле "Дата рождения" обязательно для заполнения!',
				'phone.required' => 'Поле "Телефон" обязательно для заполнения!',
				'password.required' => 'Поле "Пароль" обязательно для заполнения!',
				'password.confirmed' => 'Пароли не совпадают!',
				
			];
			
			$valid = Validator::make($request->all(), $rules, $validator_msg)->validate();
			
			/* */
			$new = $rec;	

			$new->region_id = $request->input('region_id');
			$new->city_id = $request->input('city_id');
			$new->clinic_id = $request->input('clinic_id');
			$new->doctor_id = $request->input('doctor_id');
			$new->duration_id = $request->input('duration_id');
			$new->date_of_birth = date('Y-m-d', strtotime($request->input('date_of_birth')));
			$new->last_name = $request->input('last_name');
			$new->name = $request->input('name');
			$new->second_name = $request->input('second_name');
			$new->phone = $request->input('phone');
			$new->password = Hash::make($request->input('password'));
			$new->pregnant = $request->input('pregnant');

			$new->save();
			
			return redirect('/admin/patient')->with('success', 'Пациент обновлен');
			
		}

		/* */
		$return = [
		
			'page_title' => 'Редактировать пациента',
			'rec' => $rec,
			'id' => $id, 
			'regions' => Region::orderBy('name', 'asc')->get(),
			'cities' => City::orderBy('name', 'asc')->get(),
			'clinics' => Clinic::orderBy('name', 'asc')->get(),
			'doctors' => Doctor::orderBy('name', 'asc')->get(),
			'durations' => Duration::orderBy('id', 'desc')->get(),
			
		]; 
		
		return view('patient_form', $return);
		
	}
	
}
