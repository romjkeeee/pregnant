<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

use App\User;
use App\Category;
use App\City;
use App\Course;

class AdminCatController extends Controller {
	
    public function __construct() {
        $this->middleware('auth');
    }

    public function index(Request $request) {
		
		$order_by = 'id';
		$order = 'desc';		
		
		if ($request->input('order_by')) {
			
			$order_by = $request->input('order_by');
			$order = $request->input('order');
			
		}		
		
		/* Список пользователей */
		$list = Category::orderBy($order_by, $order)->get();
		$search = '';
		$opts = [];
				
		if ($request->input('nr')) {
			
			$search = $request->input('nr');
			$search = urldecode($search);
			
			$list = Category::where('name', 'LIKE', '%'.$search.'%')->orderBy($order_by, $order)->get();
		
		}
		
		if ($list->count()) {
			foreach ($list as $rec) {
				
				$opts[$rec->id]['who'] = 'не указано';
				
				/* Кто создал */
				$who = User::find($rec->created_user_id);
				if ($who) {
					$opts[$rec->id]['who'] = $who->last_name.' '.$who->name;
				}
				if ($rec->created_user_id == 15) {
					$opts[$rec->id]['who'] = 'ADMINISTRATOR';
				}
				
			}
		}
		
		/* */
		$return = [
		
			'page_title' => 'Список категорий звуков',
			
			'list' => $list,
			'opts' => $opts,
			'search' => $search,
			'order_by' => $order_by,
			'order' => $order,
			'adminUser' => 15,
		
		];
		
        return view('categories', $return);
		
    }
	
	public function add(Request $request) {
		
		$rec = [
		
			'name' => '',
			'status' => 'active',
			'created_user_id' => 0,
			'official' => 'off',
			
		];
		
		/* Сохранение данных */
		if ($request->isMethod('post')) {
						
			/* Правила валидации */
			$rules = [
			
				'name' => ['required'],
				'courses_id' => ['required'],
				
			];
			
			$validator_msg = [ 
			
				'name.required' => 'Поле "Название категории" обязательно для заполнения!',		
				'courses_id.required' => 'Выберите курсы, которые нужно прикрепить к категории!',		
				
			];
			
			$valid = Validator::make($request->all(), $rules, $validator_msg)->validate();
			
			$off = 'off';
			if ($request->input('official')) {
				$off = 'on';
			}
			
			/* */
			$new = new Category;
			
			$new->created_user_id = Auth()->user()->id;
			$new->official = $off;
			$new->name = $request->input('name');
			$new->courses_id = json_encode($request->input('courses_id'));
			$new->status = $request->input('status');

			$new->save();
			
			return redirect('/admin/cats')->with('success', 'Категория добавлена');
			
		}
		
		/* Курсы */
		$courses = Course::orderBy('name', 'asc')->get();
		$course_ids = [];
		
		if ($courses->count()) {
			foreach ($courses as $cou) {
				
				$course_ids[] = $cou->name;
				
			}
		}
		
		$course_ids = json_encode($course_ids, JSON_UNESCAPED_UNICODE);
		
		/* */
		$return = [
		
			'page_title' => 'Добавить категорию',
			'rec' => (object)$rec,
			'courses' => $courses,
			'users' => User::orderBy('name', 'asc')->get(),
			'course_ids' => $course_ids,
			
		]; 
		
		return view('category_form', $return);
		
	}
	
	public function edit($id, Request $request) {
				
		$rec = Category::find($id);
		if (!$rec) {
			return redirect('/admin/cats')->with('error', 'Категория не найдена!');
		}
		
		/* Сохранение данных */
		if ($request->isMethod('post')) {
			
			/* Правила валидации */
			$rules = [
			
				'name' => ['required'],
				'courses_id' => ['required'],
				
			];
			
			$validator_msg = [ 
			
				'name.required' => 'Поле "Название категории" обязательно для заполнения!',		
				'courses_id.required' => 'Выберите курсы, которые нужно прикрепить к категории!',		
				
			];
			
			$valid = Validator::make($request->all(), $rules, $validator_msg)->validate();
			
			$off = 'off';
			if ($request->input('official')) {
				$off = 'on';
			}			
			
			/* */
			$new = $rec;
			
			$new->name = $request->input('name');
			$new->official = $off;
			$new->courses_id = json_encode($request->input('courses_id'));
			$new->status = $request->input('status');
			
			$new->save();
			
			return redirect('/admin/cats')->with('success', 'Категория обновлена');
			
		}	
		
		/* Курсы */
		$courses = Course::orderBy('name', 'asc')->get();
		$course_ids = [];
		
		if ($courses->count()) {
			foreach ($courses as $cou) {
				
				$course_ids[] = $cou->name;
				
			}
		}
		
		$course_ids = json_encode($course_ids, JSON_UNESCAPED_UNICODE);
		$courses = json_decode($rec->courses_id, true);
		$courses = explode(',', $courses[0]);	
	
		/* */
		$return = [
		
			'page_title' => 'Редактировать категорию',
			'id' => $id,
			'rec' => $rec,
			'courses' => $courses,
			'course_ids' => $course_ids,
			'users' => User::orderBy('name', 'asc')->get(),
			
		];
		
		return view('category_form', $return);
		
	}
	
	public function info($id) {
		
		$rec = Category::find($id);
		if (!$rec) {
			return redirect('/admin/cats')->with('error', 'Категория не найдена!');
		}
		
		/* Курсы из этой категории */
		$courses = Course::where(['cat_id' => $id])->get();
		
		$courses = json_decode($rec->courses_id, true);
		$courses = explode(',', $courses[0]);
		$ids = [];
		
		if (sizeof($courses) > 0) {
			foreach ($courses as $cid) {
				
				$course = Course::where(['name' => $cid])->first();
				if ($course) {
					$ids[] = $course->id;
				}
				
			}
		}
		
		$courses = Course::whereIn('id', $ids)->get();
		//var_dump($ids); exit;
		
		$return = [
		
			'page_title' => 'Категория '.$rec->name,
			'rec' => $rec,
			'list' => $courses,
			'users' => User::orderBy('name', 'asc')->get(),
			
		];
		
		return view('category_info', $return);
	
	}
	
}
