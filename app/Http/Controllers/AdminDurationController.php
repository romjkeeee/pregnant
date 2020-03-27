<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

use App\Duration;

class AdminDurationController extends Controller {
	
    public function __construct() {
        $this->middleware('auth');
    }

    public function index(Request $request) {
		
		$list = Duration::orderBy('pos', 'asc')->get();
		
		/* */
		$return = [
		
			'page_title' => 'Список недель',
			'list' => $list,
		
		];
		
        return view('durations', $return);
		
    }
	
	public function add(Request $request) {
		
		$rec = [	
		
			'pos' => '',			
			'name' => '',			
			'text' => '',			
			'photo' => null,						
			
		];
		
		/* Сохранение данных */
		if ($request->isMethod('post')) {
						
			/* Правила валидации */
			$rules = [	
			
				'name' => ['required'],				
				'text' => ['required'],				

			];
			
			$validator_msg = [ 		
			
				'name.required' => 'Поле "Название" обязательно для заполнения!',
				'text.required' => 'Поле "Описание" обязательно для заполнения!',
				
			];
			
			$valid = Validator::make($request->all(), $rules, $validator_msg)->validate();
			
			/* Заливка фото */
			$photo = null;
			if ($request->file('photo')) {
				$photo = $request->file('photo')->store('photo/'.$request->input('token'), 'photo');
			}
			
			/* */
			$new = new Duration;		

			$new->pos = $request->input('pos');
			$new->name = $request->input('name');
			$new->text = $request->input('text');
			$new->photo = $photo;

			$new->save();
			
			return redirect('/admin/duration')->with('success', 'Неделя добавлена');
			
		}

		/* */
		$return = [
		
			'page_title' => 'Добавить неделю',
			'rec' => (object)$rec,
			
		]; 
		
		return view('duration_form', $return);
		
	}
	
	public function edit($id, Request $request) {
				
		$rec = Duration::find($id);
		if (!$rec) {
			return redirect('/admin/duration')->with('error', 'Неделя не найдена!');
		}
		
		/* Сохранение данных */
		if ($request->isMethod('post')) {
						
			/* Правила валидации */
			$rules = [	
			
				'name' => ['required'],				
				'text' => ['required'],				

			];
			
			$validator_msg = [ 		
			
				'name.required' => 'Поле "Название" обязательно для заполнения!',
				'text.required' => 'Поле "Описание" обязательно для заполнения!',
				
			];
			
			$valid = Validator::make($request->all(), $rules, $validator_msg)->validate();
			
			/* Заливка фото */
			$photo = $rec->photo;
			if ($request->file('photo')) {
				$photo = $request->file('photo')->store('photo/'.$request->input('token'), 'photo');
			}
			
			/* */
			$new = $rec;		

			$new->pos = $request->input('pos');
			$new->name = $request->input('name');
			$new->text = $request->input('text');
			$new->photo = $photo;

			$new->save();
			
			return redirect('/admin/duration')->with('success', 'Неделя обновлена');
			
		}

		/* */
		$return = [
		
			'page_title' => 'Редактировать неделю',
			'rec' => $rec,
			'id' => $id,
			
		]; 
		
		return view('duration_form', $return);
		
	}
	
}
