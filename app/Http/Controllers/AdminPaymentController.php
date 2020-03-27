<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

use App\Review;
use App\User;
use App\App;
use App\Payment;

class AdminPaymentController extends Controller {
	
    public function __construct() {
        $this->middleware('auth');
    }
	
	/* Список отзывов */
    public function index(Request $request) {
		
		$list = Payment::orderBy('id', 'desc')->get();
		$search = '';

		if ($list->count()) {
			foreach ($list as $rec) {
				
				/* Пользователь */
				$rec->arenus = 'не указан';
				$this_user = User::find($rec->by_user);
				if ($this_user) {
					$rec->arenus = '<a href="/admin/arenus/info/'.$rec->by_user.'">'.$this_user->last_name.' '.$this_user->name.'</a>';
				}
				
				/* Объект */
				$rec->object = 'не указан';
				$this_object = App::find($rec->app_id);
				if ($this_object) {
				    $rec->object = '<a href="/admin/app/info/'.$rec->app_id.'">'.$this_object->title.'</a>';
				}
				
				$rec->empty_stars = 5 - $rec->rating;
			
			}
		}
						
		/* */
		$return = [
		
			'page_title' => 'Список платежей',
			
			'list' => $list,
		
		];
		
        return view('payments', $return);
		
    }
	
	/* Добавить отзыв */
	public function add(Request $request) {
		
		$rec = [
		
			'app_id' => '',
			'by_user' => '',
			'rate' => 5,
			'text' => '',
			
		];
		
		/* Сохранение данных */
		if ($request->isMethod('post')) {
						
			/* Правила валидации */
			$rules = [
			
				'app_id' => ['required'],			
				'by_user' => ['required'],			
				'text' => ['required'],		
				
			];
			
			$validator_msg = [ 
			
				'app_id.required' => 'Поле "Объект" обязательно для заполнения!',
				'by_user.required' => 'Поле "Арендатор" обязательно для заполнения!',
				'text.required' => 'Поле "Комментарий" обязательно для заполнения!',
				
			];
			
			$valid = Validator::make($request->all(), $rules, $validator_msg)->validate();
			
			/* */
			$new = new Review;
			
			$new->app_id = $request->input('app_id');
			$new->by_user = $request->input('by_user');
			$new->text = $request->input('text');
			$new->rate = $request->input('rating');

			$new->save();
			
			return redirect('/admin/reviews')->with('success', 'Отзыв добавлен');
			
		}
		
		/* */
		$return = [
		
			'page_title' => 'Добавить отзыв',
			'rec' => (object)$rec,
			'users' => User::where(['type' => 'arenus'])->orderBy('id', 'desc')->get(),
			'apps' => App::orderBy('title', 'asc')->get(),
			
		];
		
		return view('review_form', $return);
		
	}
	
	/* Редактировать отзыв */
	public function edit($id, Request $request) {
				
		$rec = Review::find($id);
		if (!$rec) {
			return redirect('/admin/reviews')->with('error', 'Отзыв не найден!');
		}
		
		/* Сохранение данных */
		if ($request->isMethod('post')) {
						
			/* Правила валидации */
			$rules = [
			
				'user_id' => ['required'],			
				'studio_id' => ['required'],			
				'comment' => ['required'],		
				
			];
			
			$validator_msg = [ 
			
				'user_id.required' => 'Поле "Пользователь" обязательно для заполнения!',
				'studio_id.required' => 'Поле "Студия" обязательно для заполнения!',
				'comment.required' => 'Поле "Комментарий" обязательно для заполнения!',
				
			];
			
			$valid = Validator::make($request->all(), $rules, $validator_msg)->validate();
			
			/* */
			$new = $rec;
			
			$new->recall_date = $request->input('created_at');
			$new->user_id = $request->input('user_id');
			$new->studio_id = $request->input('studio_id');
			$new->rating = $request->input('rating');
			$new->comment = $request->input('comment');

			$new->save();
			
			return redirect('/admin/reviews')->with('success', 'Отзыв обновлен');
			
		}
		
		/* */
		$return = [
		
			'page_title' => 'Редактировать отзыв',
			'rec' => (object)$rec,
			'id' => $id,
			'users' => User::orderBy('id', 'desc')->get(),
			'studios' => Studio::orderBy('id', 'desc')->get(),
			
		];
		
		return view('review_form', $return);
		
	}

}