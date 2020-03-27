<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

use App\Doctor;
use App\Spec;
use App\Clinic;
use App\Region;
use App\City;
use App\Review;
use App\Patient;

class AdminMedController extends Controller {
	
    public function __construct() {
        $this->middleware('auth');
    }

    public function index(Request $request) {
		
		$list = Doctor::orderBy('id', 'desc')->get();
		$search = $request->input('query');
		
		if ($search) {
			
			$list = Doctor::where('last_name', 'LIKE', '%'.$search.'%')->
					orWhere('name', 'LIKE', '%'.$search.'%')->
					orWhere('second_name', 'LIKE', '%'.$search.'%')->
					orWhere('phone', 'LIKE', '%'.$search.'%')->get();
			
		}
		
		if ($list->count()) {
			foreach ($list as $rec) {
				
				/* Специализации */
				$rec->spec = '&mdash;';
				$this_spec = json_decode($rec->specialization, true);
				if (is_array($this_spec)) {
					foreach ($this_spec as $spec) {
						
						$this_ = Spec::find($spec);
						if (!$this_) {
							continue;
						}
						
						$rec->spec .= '<span class="badge badge-info">'.$this_->name.'</span>';
						
					}
					
					$rec->spec = trim(str_replace('&mdash;', '', $rec->spec));
					
				}
				
				/* Клиники */
				$rec->clin = '&mdash;';
				$this_clinics = json_decode($rec->clinics, true);
				if (is_array($this_clinics)) {
					foreach ($this_clinics as $clinic) {
						
						$this_ = Clinic::find($clinic);
						if (!$this_) { 
							continue;
						}
						
						$rec->clin .= '<span class="badge badge-info">'.$this_->name.'</span>';
						
					}
					
					$rec->clin = trim(str_replace('&mdash;', '', $rec->clin));
					
				}
				
			}
		}
		
		/* */
		$return = [
		
			'page_title' => 'Список врачей',
			'list' => $list,
			'search' => $search,
		
		];
		
        return view('med', $return);
		
    }
	
	public function info($id, Request $request) {
		
		$rec = Doctor::find($id);
		if (!$rec) {
			return redirect('/admin/med')->with('error', 'Врач не найден!');
		}

		/* Специализации */
		$rec->spec = '&mdash;';
		$this_spec = json_decode($rec->specialization, true);
		if (is_array($this_spec)) {
			foreach ($this_spec as $spec) {
						
				$this_ = Spec::find($spec);
				if (!$this_) {
					continue;
				}
						
				$rec->spec .= '<span class="badge badge-info">'.$this_->name.'</span>';
						
			}
					
			$rec->spec = trim(str_replace('&mdash;', '', $rec->spec));
					
		}
				
		/* Клиники */
		$rec->clin = '&mdash;';
		$this_clinics = json_decode($rec->clinics, true);
		if (is_array($this_clinics)) {
			foreach ($this_clinics as $clinic) {
						
				$this_ = Clinic::find($clinic);
				if (!$this_) { 
					continue;
				}
						
				$rec->clin .= '<span class="badge badge-info">'.$this_->name.'</span>';
						
			}
					
			$rec->clin = trim(str_replace('&mdash;', '', $rec->clin));
					
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
		
		/* */
		$return = [
		
			'page_title' => 'Врач '.$rec->last_name.' '.$rec->name.' '.$rec->second_name,
			'rec' => $rec,
			'reviews' => $reviews,
		
		];
		
		return view('med_info', $return);
		
	}
	
	public function add(Request $request) {
		
		$rec = [	
		
			'last_name' => '',			
			'name' => '',			
			'second_name' => '',			
			'phone' => '',			
			'password' => '',			
			
		];
		
		/* Сохранение данных */
		if ($request->isMethod('post')) {
						
			/* Правила валидации */
			$rules = [	
			
				'last_name' => ['required'],				
				'name' => ['required'],				
				'second_name' => ['required'],				
				'password' => ['required', 'confirmed'],				
				
			];
			
			$validator_msg = [ 		
			
				'last_name.required' => 'Поле "Фамилия" обязательно для заполнения!',
				'name.required' => 'Поле "Имя" обязательно для заполнения!',
				'second_name.required' => 'Поле "Отчество" обязательно для заполнения!',
				'password.required' => 'Поле "Пароль" обязательно для заполнения!',
				'password.confirmed' => 'Пароли не совпадают!',
				
			];
			
			$valid = Validator::make($request->all(), $rules, $validator_msg)->validate();
			
			/* */
			$new = new Doctor;		
			
			$new->specialization = json_encode($request->input('spec'));
			$new->clinics = json_encode($request->input('clinics'));	
			$new->last_name = $request->input('last_name');
			$new->name = $request->input('name');
			$new->second_name = $request->input('second_name');
			$new->phone = $request->input('phone');
			$new->password = Hash::make($request->input('password'));
			
			$new->save();
			
			return redirect('/admin/med')->with('success', 'Врач добавлен');
			
		}
		
		/* Клиники */
		$clinics = Clinic::orderBy('name', 'asc')->get();
		if ($clinics->count()) {
			foreach ($clinics as $clinic) {
				
				/* Регион, Город */
				$clinic->region = 'Регион';
				$this_region = Region::find($clinic->region_id);
				if ($this_region) {
					$clinic->region = $this_region->name;
				}
				$clinic->city = 'Город';
				$this_city = City::find($clinic->city_id);
				if ($this_city) {
					$clinic->city = $this_city->name;
				}
				
			}
		}

		/* */
		$return = [
		
			'page_title' => 'Добавить врача',
			'rec' => (object)$rec,
			'spec' => Spec::orderBy('name', 'asc')->get(),
			'clinics' => $clinics,
			'my_spec' => [],
			'my_clinics' => [],
			
		]; 
		
		return view('med_form', $return);
		
	}
	
	public function edit($id, Request $request) {
				
		$rec = Doctor::find($id);
		if (!$rec) {
			return redirect('/admin/med')->with('error', 'Врач не найден!');
		}
		
		/* Сохранение данных */
		if ($request->isMethod('post')) {
						
			/* Правила валидации */
			$rules = [	
			
				'last_name' => ['required'],				
				'name' => ['required'],				
				'second_name' => ['required'],				
				'password' => ['required', 'confirmed'],				
				
			];
			
			if (!$request->input('password')) {
				unset($rules['password']);
			}
			
			$validator_msg = [ 		
			
				'last_name.required' => 'Поле "Фамилия" обязательно для заполнения!',
				'name.required' => 'Поле "Имя" обязательно для заполнения!',
				'second_name.required' => 'Поле "Отчество" обязательно для заполнения!',
				'password.required' => 'Поле "Пароль" обязательно для заполнения!',
				'password.confirmed' => 'Пароли не совпадают!',
				
			];
			
			$valid = Validator::make($request->all(), $rules, $validator_msg)->validate();
			
			/* */
			$new = $rec;		
			
			$new->specialization = json_encode($request->input('spec'));
			$new->clinics = json_encode($request->input('clinics'));	
			$new->last_name = $request->input('last_name');
			$new->name = $request->input('name');
			$new->second_name = $request->input('second_name');
			$new->phone = $request->input('phone');
			
			if ($request->input('password')) {
				$new->password = Hash::make($request->input('password'));
			}
			
			$new->save();
			
			return redirect('/admin/med')->with('success', 'Врач обновлен');
			
		}
		
		/* Клиники */
		$clinics = Clinic::orderBy('name', 'asc')->get();
		if ($clinics->count()) {
			foreach ($clinics as $clinic) {
				
				/* Регион, Город */
				$clinic->region = 'Регион';
				$this_region = Region::find($clinic->region_id);
				if ($this_region) {
					$clinic->region = $this_region->name;
				}
				$clinic->city = 'Город';
				$this_city = City::find($clinic->city_id);
				if ($this_city) {
					$clinic->city = $this_city->name;
				}
				
			}
		}

		/* */
		$return = [
		
			'page_title' => 'Редактировать врача',
			'rec' => $rec,
			'id' => $id,
			'spec' => Spec::orderBy('name', 'asc')->get(),
			'clinics' => $clinics,
			'my_spec' => json_decode($rec->specialization, true),
			'my_clinics' => json_decode($rec->clinics, true),
			
		]; 
		
		return view('med_form', $return);
		
	}
	
}
