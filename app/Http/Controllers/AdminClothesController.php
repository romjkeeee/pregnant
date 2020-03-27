<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

use App\Cat;
use App\Prop;
use App\Clothes;
use App\Like;
use App\User;

class AdminClothesController extends Controller {
	
    public function __construct() {
        $this->middleware('auth');
    }

    public function index(Request $request) {
		
		$list = Clothes::orderBy('id', 'desc')->get();
		$category_id = $request->input('category_id');
		
		if ($category_id) {
			$list = Clothes::where(['category_id' => $category_id])->orderBy('id', 'desc')->get();
		}
		if ($list->count()) {
			foreach ($list as $rec) {
				
				/* Кто добавил */
				$rec->user = 'не указан';
				$this_user = User::find($rec->user_id);
				if ($this_user) {
					$rec->user = $this_user->name.' ('.$this_user->phone.')';
				}
				
				/* Категория */
				$rec->category = 'не указана';
				$this_category = Cat::find($rec->category_id);
				if ($this_category) {
					$rec->category = $this_category->name;
				}
				
				/* Свойства */
				$props = json_decode($rec->props, true);
				$props_text = 'не указаны';
				if (is_array($props)) {
					foreach ($props as $prop_id => $value) {
						
						$this_prop = Prop::find($prop_id);
						if ($this_prop) {
							$props_text = $this_prop->name.': '.$value.'<br />';
						}
						
					}
				}
				$rec->props = $props_text;
				
				/* Лайки / Дизлайки */
				$rec->likes = Like::where(['clothes_id' => $rec->id, 'type' => 'like'])->count();
				$rec->dislikes = Like::where(['clothes_id' => $rec->id, 'type' => 'dislike'])->count();
				
			}
		}
		
		/* */
		$return = [
		
			'page_title' => 'Список позиций',
			'list' => $list,
			'categories' => Cat::orderBy('name', 'asc')->get(),
			'category_id' => $category_id,
		
		];
		
        return view('clothes', $return);
		
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
