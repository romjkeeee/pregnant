<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

use App\User;
use App\Region;
use App\City;

class AdminArenusController extends Controller {
	
    public function __construct() {
        $this->middleware('auth');
    }

    public function index(Request $request) {  
		
		$list = User::where(['type' => 'arenus'])->orderBy('id', 'desc')->get();
		$search = '';
		
		if ($request->input('query')) {
			
			$sq = $request->input('query');
			$sq = urldecode($sq);
			
			$list = User::where(['type' => 'arenus'])->where('name', 'LIKE', '%'.$sq.'%');
			$list = $list->orWhere('last_name', 'LIKE', '%'.$sq.'%');
			$list = $list->orWhere('email', 'LIKE', '%'.$sq.'%');
			$list = $list->orWhere('phone', 'LIKE', '%'.$sq.'%');
			$list = $list->get();

			$search = $sq;
			
		}
						
		/* */
		$return = [
		
			'page_title' => 'Арендаторы',
			
			'list' => $list,
			'search' => $search,
		
		];
		
        return view('arenus', $return);
		
    }
    
	public function info($id) {
		
		/* Ищем пользователя */
		$rec = User::find($id);
		if (!$rec) {
			return redirect('/admin/users/parents')->with('error', 'Родитель не найден');
		}
		if ($rec->type !== 'parent') {
			return redirect('/admin/users/parents')->with('error', 'Пользователь не является родителем!');	
		}
		
		/* Город */
		$city = City::find($rec->city_id);
		if ($city) {
			$rec->city = $city->name;
		}
		else {
			$rec->city = 'не указан';
		}
		
		/* Дети */
		$list = User::where(['parent_id' => $id])->orderBy('id', 'desc')->get();
		if ($list->count()) {
			foreach ($list as $child) {

				/* Команда */
				$this_team = Team::find($child->team_id);
				if ($this_team) {
					$child->team = $this_team->name;
				}
				else {
					$child->team = 'не указана';
				}
				
			}
		}
				
		/* */
		$return = [
		
			'page_title' => 'Информация о родителе '.$rec->last_name.' '.$rec->name.' '.$rec->second_name,
			
			'rec' => $rec,
			'list' => $list,
		
		];
		
		return view('user_parent_info', $return);
		
	}

	public function add(Request $request) {
		
		$rec = [

			'region_id' => '',
			'city_id' => '',
			'last_name' => '',
			'name' => '',
			'date_of_birth' => '',
			'email' => '',
			'phone' => '',
			'avatar' => null,
			
		];
		
		/* Сохранение данных */
		if ($request->isMethod('post')) {
						
			/* Правила валидации */
			$rules = [
			
				'last_name' => ['required'],
				'name' => ['required'],
				'email' => ['required', 'email'],
				'phone' => ['required'],
				'date_of_birth' => ['required'],
			
			];
			
			$validator_msg = [ 

				'last_name.required' => 'Поле "Фамилия" обязательно для заполнения!',
				'name.required' => 'Поле "Имя" обязательно для заполнения!',
				'phone.required' => 'Поле "Телефон" обязательно для заполнения!',
				'email.required' => 'Поле "E-mail" обязательно для заполнения!',
				'email.email' => 'Некорректный E-mail адрес',
				'date_of_birth.required' => 'Поле "Дата рождения" обязательно для заполнения!',
			
			];
			
			$valid = Validator::make($request->all(), $rules, $validator_msg)->validate();
			
			/* Заливка аватара */
			$avatar = null;
			if ($request->file('avatar')) {
				$avatar = $request->file('avatar')->store('avatars/'.$request->input('token'), 'avatars');
			}
			
			/* Загрузка документов */
			$ver1 = null;
			if ($request->file('ver1')) {
				$ver1 = $request->file('ver1')->store('ver1/'.$request->input('token'), 'ver1');
			}	
			$ver2 = null;
			if ($request->file('ver2')) {
				$ver2 = $request->file('ver2')->store('ver2/'.$request->input('token'), 'ver2');
			}				
			
			/* */
			$new = new User;
			
			$new->type = 'arenus';
			$new->region_id = $request->input('region_id');
			$new->city_id = $request->input('city_id');
			$new->last_name = $request->input('last_name');
			$new->name = $request->input('name');
			$new->date_of_birth = date('Y-m-d', strtotime($request->input('date_of_birth')));
			$new->email = $request->input('email');
			$new->phone = $request->input('phone');
			$new->password = Hash::make($request->input('email'));
			$new->avatar = $avatar;
			$new->verified = $request->input('verified');
			
			if ($request->input('verified')) {
			    $new->verified_at = date('Y-m-d H:i:s');
			}
			
			$new->ver1 = $ver1;
			$new->ver1_type = $request->input('ver1_type');
			$new->ver2 = $ver2;
			$new->ver2_type = $request->input('ver2_type');
			
			$new->save();
			
			return redirect('/admin/arenus')->with('success', 'Арендатор добавлен');
			
		}
		
		/* */
		$return = [
		
			'page_title' => 'Добавить арендатора',
			'rec' => (object)$rec,
			'regions' => Region::orderBy('name', 'asc')->get(),
			'cities' => City::orderBy('name', 'asc')->get(),
			
		];
		
		return view('arenus_form', $return);
		
	}
	
	public function edit($id, Request $request) {
				
		$rec = User::where(['id' => $id, 'type' => 'arenus'])->first();	
		if (!$rec) {
			return redirect('/admin/arenus')->with('error', 'Арендатор не найден!');
		}
		
		/* Сохранение данных */
		if ($request->isMethod('post')) {
						
			/* Правила валидации */
			$rules = [
			
				'last_name' => ['required'],
				'name' => ['required'],
				'email' => ['required', 'email'],
				'phone' => ['required'],
				'date_of_birth' => ['required'],
			
			];
			
			$validator_msg = [ 

				'last_name.required' => 'Поле "Фамилия" обязательно для заполнения!',
				'name.required' => 'Поле "Имя" обязательно для заполнения!',
				'phone.required' => 'Поле "Телефон" обязательно для заполнения!',
				'email.required' => 'Поле "E-mail" обязательно для заполнения!',
				'email.email' => 'Некорректный E-mail адрес',
				'date_of_birth.required' => 'Поле "Дата рождения" обязательно для заполнения!',
			
			];
			
			$valid = Validator::make($request->all(), $rules, $validator_msg)->validate();
			
			/* Заливка аватара */
			$avatar = $rec->avatar;
			if ($request->file('avatar')) {
				$avatar = $request->file('avatar')->store('avatars/'.$request->input('token'), 'avatars');
			}
			
			/* Загрузка документов */
			$ver1 = $rec->ver1;
			if ($request->file('ver1')) {
				$ver1 = $request->file('ver1')->store('ver1/'.$request->input('token'), 'ver1');
			}	
			$ver2 = $rec->ver2;
			if ($request->file('ver2')) {
				$ver2 = $request->file('ver2')->store('ver2/'.$request->input('token'), 'ver2');
			}				
			
			/* */
			$new = $rec;
			
			$new->type = 'arenus';
			$new->region_id = $request->input('region_id');
			$new->city_id = $request->input('city_id');
			$new->last_name = $request->input('last_name');
			$new->name = $request->input('name');
			$new->date_of_birth = date('Y-m-d', strtotime($request->input('date_of_birth')));
			$new->email = $request->input('email');
			$new->phone = $request->input('phone');
			$new->password = Hash::make($request->input('email'));
			$new->avatar = $avatar;
			$new->verified = $request->input('verified');
			
			if ($request->input('verified')) {
			    $new->verified_at = date('Y-m-d H:i:s');
			}			
			
			$new->ver1 = $ver1;
			$new->ver1_type = $request->input('ver1_type');
			$new->ver2 = $ver2;
			$new->ver2_type = $request->input('ver2_type');
			
			$new->save();
			
			return redirect('/admin/arenus')->with('success', 'Арендатор обновлен');
			
		}
		
		/* */
		$return = [
		
			'page_title' => 'Редактировать арендатора',
			'rec' => $rec,
			'id' => $id,
			'regions' => Region::orderBy('name', 'asc')->get(),
			'cities' => City::orderBy('name', 'asc')->get(),
			
		];
		
		return view('arenus_form', $return);
		
	}

}