<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

use App\Review;
use App\User;
use App\Clinic;
use App\Doctor;
use App\Patient;

class AdminReviewController extends Controller {
	
    public function __construct() {
        $this->middleware('auth');
    }
	
	/* Список отзывов */
    public function index(Request $request) {
		
		$list = Review::orderBy('id', 'desc')->get();
		$search = '';

		if ($list->count()) {
			foreach ($list as $rec) {
				
				/* Пациент */
				$rec->patient = 'не указан';
				$this_user = Patient::find($rec->user_id);
				if ($this_user) {
					$rec->patient = '<a href="'.route('admin_patient_info', $rec->user_id).'">'.$this_user->last_name.' '.$this_user->name.' '.$this_user->second_name.'</a>';
				}
				
				/* Больница / Врач */
				$rec->for = 'не указано';
				if ($rec->is_for == 'clinic') {
					
					$this_object = Clinic::find($rec->for_id);
					if ($this_object) {
						$rec->for = '<a href="'.route('admin_clinic_info', $rec->for_id).'">'.$this_object->name.'</a>';
					}					
					
				}
				else {
					
					$this_object = Doctor::find($rec->for_id);
					if ($this_object) {
						$rec->for = '<a href="'.route('admin_med_info', $rec->for_id).'">'.$this_object->last_name.' '.$this_object->name.' '.$this_object->second_name.'</a>';
					}														
					
					
				}

				$rec->empty_stars = 5 - $rec->rating;
			
			}
		}
						
		/* */
		$return = [
		
			'page_title' => 'Список отзывов',
			
			'list' => $list,
		
		];
		
        return view('reviews', $return);
		
    }
	
	/* Добавить отзыв */
	public function add(Request $request) {
		
		$rec = [
		
			'user_id' => '',
			'is_for' => '',
			'for_id' => '',
			'rate' => 5,
			'text' => '',
			
		];
		
		$selected = $request->input('is_for');
		
		/* Сохранение данных */
		if ($request->isMethod('post')) {
						
			/* Правила валидации */
			$rules = [
			
				'user_id' => ['required'],			
				'is_for' => ['required'],			
				'for_id' => ['required'],			
				'text' => ['required'],		
				
			];
			
			$validator_msg = [ 
			
				'user_id.required' => 'Поле "Пациент" обязательно для заполнения!',
				'is_for.required' => 'Поле "Кому отзыв" обязательно для заполнения!',
				'for_id.required' => 'Поле "Врач" обязательно для заполнения!',
				'text.required' => 'Поле "Комментарий" обязательно для заполнения!',
				
			];
			
			if ($selected == 'clinic') {
				$validator_msg['for_id'] = trim(str_replace('Врач', 'Клиника', $validator_msg['for_id']));
			}
			
			$valid = Validator::make($request->all(), $rules, $validator_msg)->validate();
			
			/* */
			$new = new Review;
			
			$new->user_id = $request->input('user_id');
			$new->is_for = $request->input('is_for');
			$new->for_id = $request->input('for_id');
			$new->text = $request->input('text');
			$new->rate = $request->input('rating');

			$new->save();
			
			return redirect('/admin/reviews')->with('success', 'Отзыв добавлен');
			
		}
		
		/* */
		$return = [
		
			'page_title' => 'Добавить отзыв',
			'rec' => (object)$rec,
			'selected' => $selected,
			'patients' => Patient::orderBy('name', 'asc')->get(),
			'doctors' => Doctor::orderBy('name', 'asc')->get(),
			'clinics' => Clinic::orderBy('name', 'asc')->get(),
			
		];
		
		return view('review_form', $return);
		
	}
	
	/* Редактировать отзыв */
	public function edit($id, Request $request) {
				
		$rec = Review::find($id);
		if (!$rec) {
			return redirect('/admin/reviews')->with('error', 'Отзыв не найден!');
		}
		
		$selected = $rec->is_for;
		
		/* Сохранение данных */
		if ($request->isMethod('post')) {
						
			/* Правила валидации */
			$rules = [
			
				'user_id' => ['required'],			
				'is_for' => ['required'],			
				'for_id' => ['required'],			
				'text' => ['required'],		
				
			];
			
			$validator_msg = [ 
			
				'user_id.required' => 'Поле "Пациент" обязательно для заполнения!',
				'is_for.required' => 'Поле "Кому отзыв" обязательно для заполнения!',
				'for_id.required' => 'Поле "Врач" обязательно для заполнения!',
				'text.required' => 'Поле "Комментарий" обязательно для заполнения!',
				
			];
			
			if ($selected == 'clinic') {
				$validator_msg['for_id'] = trim(str_replace('Врач', 'Клиника', $validator_msg['for_id']));
			}
			
			$valid = Validator::make($request->all(), $rules, $validator_msg)->validate();
			
			/* */
			$new = $rec;
			
			$new->user_id = $request->input('user_id');
			$new->is_for = $request->input('is_for');
			$new->for_id = $request->input('for_id');
			$new->text = $request->input('text');
			$new->rate = $request->input('rating');

			$new->save();
			
			return redirect('/admin/reviews')->with('success', 'Отзыв обновлен');
			
		}
		
		/* */
		$return = [
		
			'page_title' => 'Редактировать отзыв',
			'rec' => $rec,
			'id' => $id,
			'selected' => $selected,
			'patients' => Patient::orderBy('name', 'asc')->get(),
			'doctors' => Doctor::orderBy('name', 'asc')->get(),
			'clinics' => Clinic::orderBy('name', 'asc')->get(),
			
		];
		
		return view('review_form', $return);
		
	}

}