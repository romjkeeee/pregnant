<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

use App\Clothes;
use App\Like;
use App\User;

class AdminLikesController extends Controller {
	
    public function __construct() {
        $this->middleware('auth');
    }

    public function index(Request $request) {
		
		$list = Like::orderBy('id', 'desc')->get();
		if ($list->count()) {
			foreach ($list as $rec) {
				
				/* Кто добавил */
				$rec->user = 'не указан';
				$this_user = User::find($rec->user_id);
				if ($this_user) {
					$rec->user = $this_user->name.' ('.$this_user->phone.')';
				}
				
				/* Одежда */
				$rec->clothes = 'неизвестно';
				$this_clothes = Clothes::find($rec->clothes_id);
				if ($this_clothes) {
					$rec->clothes = $this_clothes->name;
				}

			}
		}
		
		/* */
		$return = [
		
			'page_title' => 'Лайки / Дизлайки',
			'list' => $list,
		
		];
		
        return view('likes', $return);
		
    }
	
	public function add(Request $request) {
		
		$rec = [	
		
			'user_id' => '',			
			'category_id' => '',			
			'name' => '',			
			'comment' => '',
			'photo' => null,
			
		];
		
		/* Сохранение данных */
		if ($request->isMethod('post')) {
						
			/* Правила валидации */
			$rules = [	
			
				'user_id' => ['required'],				
				'category_id' => ['required'],				
				'name' => ['required'],				
				'comment' => ['required'],
				
			];
			
			$validator_msg = [ 		
			
				'user_id.required' => 'Поле "Кто добавил" обязательно для заполнения!',
				'category_id.required' => 'Поле "Категория" обязательно для заполнения!',
				'name.required' => 'Поле "Название" обязательно для заполнения!',
				'comment.required' => 'Поле "Комментарий" обязательно для заполнения!',
				
			];
			
			$valid = Validator::make($request->all(), $rules, $validator_msg)->validate();
			
			/* Заливка фото */
			$photo = null;
			if ($request->file('photo')) {
				$photo = $request->file('photo')->store('photo/'.$request->input('token'), 'photo');
			}
			
			/* */
			$new = new Clothes;		
			
			$new->user_id = $request->input('user_id');
			$new->category_id = $request->input('category_id');
			$new->props = json_encode($request->input('props'));
			$new->name = $request->input('name');
			$new->comment = $request->input('comment');
			$new->photo = $photo;

			$new->save();
			
			return redirect('/admin/clothes')->with('success', 'Позиция добавлена');
			
		}
		
		$props = Prop::orderBy('name', 'asc')->get();
		if ($props->count()) {
			foreach ($props as $prop) {
				
				$values = explode(PHP_EOL, $prop->values);
				foreach ($values as $key => $val) {
					$values[$key] = trim($val);
				}
				$prop->values = $values;
				
			}
		}
		
		/* */
		$return = [
		
			'page_title' => 'Добавить позицию',
			'rec' => (object)$rec,
	    	'users' => User::orderBy('id', 'desc')->get(),
	    	'categories' => Cat::orderBy('name', 'asc')->get(),
			'props' => $props,
			'my_props' => [],
			
		]; 
		
		return view('clothes_form', $return);
		
	}
	
	public function edit($id, Request $request) {
				
		$rec = Clothes::find($id);
		if (!$rec) {
			return redirect('/admin/clothes')->with('error', 'Позиция не найдена!');
		}
		
		/* Сохранение данных */
		if ($request->isMethod('post')) {
						
			/* Правила валидации */
			$rules = [	
			
				'user_id' => ['required'],				
				'category_id' => ['required'],				
				'name' => ['required'],				
				'comment' => ['required'],
				
			];
			
			$validator_msg = [ 		
			
				'user_id.required' => 'Поле "Кто добавил" обязательно для заполнения!',
				'category_id.required' => 'Поле "Категория" обязательно для заполнения!',
				'name.required' => 'Поле "Название" обязательно для заполнения!',
				'comment.required' => 'Поле "Комментарий" обязательно для заполнения!',
				
			];
			
			$valid = Validator::make($request->all(), $rules, $validator_msg)->validate();
			
			/* Заливка фото */
			$photo = $rec->photo;
			if ($request->file('photo')) {
				$photo = $request->file('photo')->store('photo/'.$request->input('token'), 'photo');
			}
			
			/* */
			$new = $rec;		
			
			$new->user_id = $request->input('user_id');
			$new->category_id = $request->input('category_id');
			$new->props = json_encode($request->input('props'));
			$new->name = $request->input('name');
			$new->comment = $request->input('comment');
			$new->photo = $photo;

			$new->save();
			
			return redirect('/admin/clothes')->with('success', 'Позиция добавлена');
			
		}
		
		$props = Prop::orderBy('name', 'asc')->get();
		if ($props->count()) {
			foreach ($props as $prop) {
				
				$values = explode(PHP_EOL, $prop->values);
				foreach ($values as $key => $val) {
					$values[$key] = trim($val);
				}
				$prop->values = $values;
				
			}
		}
		
		$my_props = json_decode($rec->props, true);
		
		/* */
		$return = [
		
			'page_title' => 'Редактировать позицию',
			'rec' => $rec,
			'id' => $id,
	    	'users' => User::orderBy('id', 'desc')->get(),
	    	'categories' => Cat::orderBy('name', 'asc')->get(),
			'props' => $props,
			'my_props' => $my_props,
			
		]; 
		
		return view('clothes_form', $return);
		
	}
	
}
