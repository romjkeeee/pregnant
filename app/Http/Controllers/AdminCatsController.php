<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

use App\Cat;

class AdminCatsController extends Controller {
	
    public function __construct() {
        $this->middleware('auth');
    }

    public function index(Request $request) {
		
		$list = Cat::orderBy('id', 'desc')->get();
		$search = $request->input('query');
		
		if ($search) {
			$list = Cat::where('name', 'LIKE', '%'.$search.'%')->get();
		}
		
		/* */
		$return = [
		
			'page_title' => 'Категории одежды',
			'list' => $list,
			'search' => $search,
		
		];
		
        return view('cats', $return);
		
    }
	
	public function add(Request $request) {
		
		$rec = [	
		
			'parent_id' => '',			
			'name' => '',			
			'icon' => '',	
			'active' => 1,	
			
		];
		
		/* Сохранение данных */
		if ($request->isMethod('post')) {
						
			/* Правила валидации */
			$rules = [			
				'name' => ['required'],				
			];
			
			$validator_msg = [ 								
				'name.required' => 'Поле "Название" обязательно для заполнения!',						
			];
			
			$valid = Validator::make($request->all(), $rules, $validator_msg)->validate();
			
			/* Заливка иконки */
			$icon = null;
			if ($request->file('icon')) {
				$icon = $request->file('icon')->store('cats/'.$request->input('token'), 'cats');
			}
			
			/* */
			$new = new Cat;		
			
			$new->parent_id = $request->input('parent_id');
			$new->name = $request->input('name');
			$new->icon = $icon;
			$new->active = $request->input('active');
			
			$new->save();
			
			return redirect('/admin/cats')->with('success', 'Категория добавлена');
			
		}
		
		/* */
		$return = [
		
			'page_title' => 'Добавить категорию',
			'rec' => (object)$rec,
	    	'categories' => Cat::orderBy('name', 'asc')->get(),
			
		]; 
		
		return view('cat_form', $return);
		
	}
	
	public function edit($id, Request $request) {
				
		$rec = Cat::find($id);
		if (!$rec) {
			return redirect('/admin/cats')->with('error', 'Категория не найдена!');
		}
		
		/* Сохранение данных */
		if ($request->isMethod('post')) {
						
			/* Правила валидации */
			$rules = [			
				'name' => ['required'],				
			];
			
			$validator_msg = [ 								
				'name.required' => 'Поле "Название" обязательно для заполнения!',						
			];
			
			$valid = Validator::make($request->all(), $rules, $validator_msg)->validate();
			
			/* Заливка иконки */
			$icon = $rec->icon;
			if ($request->file('icon')) {
				$icon = $request->file('icon')->store('cats/'.$request->input('token'), 'cats');
			}
			
			/* */
			$new = $rec;		
			
			$new->parent_id = $request->input('parent_id');
			$new->name = $request->input('name');
			$new->icon = $icon;
			$new->active = $request->input('active');
			
			$new->save();
			
			return redirect('/admin/cats')->with('success', 'Категория обновлена');
			
		}
		
		/* */
		$return = [
		
			'page_title' => 'Редактировать категорию',
			'rec' => $rec,
			'id' => $id,
	    	'categories' => Cat::orderBy('name', 'asc')->get(),
			
		]; 
		
		return view('cat_form', $return);
		
	}
	
}
