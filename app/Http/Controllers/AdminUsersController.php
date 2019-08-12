<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

use App\User;
use App\Ads;
use App\Category;
use App\Country;

class AdminUsersController extends Controller {
	
    public function __construct() {
        $this->middleware('auth');
    }
	
	/* Генерация ID */
	public function random_unique($length) {
		
		$symbols = '1234567890qwertyuiopasdfghjklzxcvbnm';
		$return = '';
		
		for ($a = 0; $a < $length; $a++) {
			$return .= substr($symbols, rand(0, strlen($symbols) - 1), 1);
		}
		
		return $return;
		
	}	
	
	/* Список пользователей */
    public function index(Request $request) {
		
		$list = User::orderBy('name', 'asc')->get();
		$search = '';
		
		if ($request->input('nr')) {
			
			$sq = $request->input('nr');
			$sq = urldecode($sq);
			
			$list = User::where('country', 'LIKE', '%'.$sq.'%');
			$list = $list->orWhere('company', 'LIKE', '%'.$sq.'%');
			$list = $list->orWhere('name', 'LIKE', '%'.$sq.'%');
			$list = $list->orWhere('email', 'LIKE', '%'.$sq.'%');
			$list = $list->get();

			$search = $sq;
			
		}
		
		if ($list->count()) {
			foreach ($list as $user) {
								
				/* Страна */
				$country = Country::where(['id' => $user->country])->first();
				if ($country) {
					$user->country = $country->name;
				}
				else {
					$user->country = 'не указана';
				}
				
			}
		}
						
		/* */
		$return = [
		
			'page_title' => 'Список пользователей',
			
			'list' => $list,
			'search' => $search,
		
		];
		
        return view('users', $return);
		
    }
	
	/* Информация о пользователе */
	public function info($id) {
		
		/* Ищем пользователя */
		$rec = User::find($id);
		if (!$rec) {
			return redirect('/admin/users')->with('error', 'Пользователь не найден');
		}
		
		/* Объявления пользователя */
		$list = Ads::where(['user_id' => $id])->orderBy('id', 'desc')->get();
		if ($list->count()) {
			foreach ($list as $rec1) {
				
				/* Категория */
				$rec1->category = 'не указана';
				$category = Category::find($rec1->category_id);
				if ($category) {
					$rec1->category = '<a href="/admin/cats/info/'.$rec1->category_id.'">'.$category->name.'</a>';
				}
				
				/* Кто разместил */
				$rec1->author = 'не указано';
				$author = User::find($rec1->user_id);
				if ($author) {
					$rec1->author = $author->name;
				}
				
			}
		}
		
		/* Страна */
		$country = Country::where(['id' => $rec->country])->first();
		$country1 = 'не указана';
		if ($country) {
			$country1 = $country->name;
		}		
				
		/* */
		$return = [
		
			'page_title' => 'Информация о пользователе '.$rec->email,
			
			'rec' => $rec,
			'list' => $list,
			'country1' => $country1,
		
		];
		
		return view('user_info', $return);
		
	}
	
	/* Добавить пользователя */
	public function add(Request $request) {
		
		$rec = [

			'name' => '',
			'company' => '',
			'country' => '',
			'email' => '',
			'active' => 1,
			
		];
		
		/* Сохранение данных */
		if ($request->isMethod('post')) {
						
			/* Правила валидации */
			$rules = [
			
				'name' => ['required'],
				'email' => ['required', 'email'],
			
			];
			
			if ($request->input('password') !== null) {
				$rules['password'] = ['required', 'min:6', 'confirmed'];
			}
			
			$validator_msg = [ 

				'name.required' => 'Поле "ФИО" обязательно для заполнения!',
				'email.required' => 'Поле "E-mail" обязательно для заполнения!',
				'email.email' => 'Некорректный E-mail адрес',
				'min' => 'Пароль не может быть короче 6 символов',
				'confirmed' => 'Пароли не совпадают',
				'password.required' => 'Поле "Пароль" обязательно для заполнения!',
			
			];
			
			$valid = Validator::make($request->all(), $rules, $validator_msg)->validate();
			
			/* */
			$new = new User;
			
			$new->unique_token = $this->random_unique(16);
			$new->country = $request->input('country');
			$new->company = $request->input('company');
			$new->name = $request->input('name');
			$new->email = $request->input('email');
			
			if ($request->input('password') !== null) {
				$new->password = Hash::make($request->input('password'));
			}
			
			$new->save();
			
			return redirect('/admin/users')->with('success', 'Пользователь добавлен');
			
		}
		
		/* */
		$return = [
		
			'page_title' => 'Добавить пользователя',
			'rec' => (object)$rec,
			'countries' => Country::orderBy('name', 'asc')->get(),
			
		];
		
		return view('user_form', $return);
		
	}
	
	/* Редактировать пользователя */
	public function edit($id, Request $request) {
				
		$rec = User::find($id);
		
		if (!$rec) {
			return redirect('/admin/users')->with('error', 'Пользователь не найден!');
		}
		
		/* Сохранение данных */
		if ($request->isMethod('post')) {
						
			/* Правила валидации */
			$rules = [
			
				'name' => ['required'],
				'email' => ['required', 'email'],
			
			];
			
			if ($request->input('password') !== null) {
				$rules['password'] = ['required', 'min:6', 'confirmed'];
			}
			
			$validator_msg = [ 

				'name.required' => 'Поле "ФИО" обязательно для заполнения!',
				'email.required' => 'Поле "E-mail" обязательно для заполнения!',
				'email.email' => 'Некорректный E-mail адрес',
				'min' => 'Пароль не может быть короче 6 символов',
				'confirmed' => 'Пароли не совпадают',
				'password.required' => 'Поле "Пароль" обязательно для заполнения!',
			
			];
			
			$valid = Validator::make($request->all(), $rules, $validator_msg)->validate();
			
			/* */
			$new = $rec;
			
			$new->unique_token = $this->random_unique(16);
			$new->country = $request->input('country');
			$new->company = $request->input('company');
			$new->name = $request->input('name');
			$new->email = $request->input('email');
			
			if ($request->input('password') !== null) {
				$new->password = Hash::make($request->input('password'));
			}
			
			$new->save();
			
			return redirect('/admin/users')->with('success', 'Пользователь обновлен');
			
		}	
	
		/* */
		$return = [
		
			'page_title' => 'Редактировать пользователя',
			'id' => $id,
			'rec' => $rec,
			'countries' => Country::orderBy('name', 'asc')->get(),
			
		];
		
		return view('user_form', $return);
		
	}

}