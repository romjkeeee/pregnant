<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

use App\Cat;
use App\Prop;

class AdminPropsController extends Controller {
	
    public function __construct() {
        $this->middleware('auth');
    }

    public function index(Request $request) {
		
		$list = Prop::orderBy('id', 'desc')->get();
		if ($list->count()) {
			foreach ($list as $rec) {
				
				$rec->category = 'не указана';
				$this_category = Cat::find($rec->category_id);
				if ($this_category) {
					$rec->category = $this_category->name;
				}
				
			}
		}
		
		/* */
		$return = [
		
			'page_title' => 'Свойства категорий',
			'list' => $list,
		
		];
		
        return view('props', $return);
		
    }
	
	public function add(Request $request) {
		
		$rec = [	
		
			'category_id' => '',			
			'name' => '',			
			'values' => '',		
			
		];
		
		/* Сохранение данных */
		if ($request->isMethod('post')) {
						
			/* Правила валидации */
			$rules = [	
			
				'category_id' => ['required'],				
				'name' => ['required'],				
				'values' => ['required'],
				
			];
			
			$validator_msg = [ 		
			
				'category_id.required' => 'Поле "Категория" обязательно для заполнения!',
				'name.required' => 'Поле "Название" обязательно для заполнения!',
				'values.required' => 'Поле "Возможные значения" обязательно для заполнения!',
				
			];
			
			$valid = Validator::make($request->all(), $rules, $validator_msg)->validate();
			
			/* */
			$new = new Prop;		
			
			$new->category_id = $request->input('category_id');
			$new->name = $request->input('name');
			$new->values = $request->input('values');

			$new->save();
			
			return redirect('/admin/props')->with('success', 'Свойство добавлено');
			
		}
		
		/* */
		$return = [
		
			'page_title' => 'Добавить свойство',
			'rec' => (object)$rec,
	    	'categories' => Cat::orderBy('name', 'asc')->get(),
			
		]; 
		
		return view('prop_form', $return);
		
	}
	
	public function edit($id, Request $request) {
				
		$rec = Prop::find($id);
		if (!$rec) {
			return redirect('/admin/props')->with('error', 'Свойство не найдено!');
		}
		
		/* Сохранение данных */
		if ($request->isMethod('post')) {
						
			/* Правила валидации */
			$rules = [	
			
				'category_id' => ['required'],				
				'name' => ['required'],				
				'values' => ['required'],
				
			];
			
			$validator_msg = [ 		
			
				'category_id.required' => 'Поле "Категория" обязательно для заполнения!',
				'name.required' => 'Поле "Название" обязательно для заполнения!',
				'values.required' => 'Поле "Возможные значения" обязательно для заполнения!',
				
			];
			
			$valid = Validator::make($request->all(), $rules, $validator_msg)->validate();
			
			/* */
			$new = $rec;		
			
			$new->category_id = $request->input('category_id');
			$new->name = $request->input('name');
			$new->values = $request->input('values');

			$new->save();
			
			return redirect('/admin/props')->with('success', 'Свойство обновлено');
			
		}
		
		/* */
		$return = [
		
			'page_title' => 'Редактировать свойство',
			'rec' => $rec,
			'id' => $id,
	    	'categories' => Cat::orderBy('name', 'asc')->get(),
			
		]; 
		
		return view('prop_form', $return);
		
	}
	
}
