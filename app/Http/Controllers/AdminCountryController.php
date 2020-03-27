<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

use App\Country;

class AdminCountryController extends Controller {
	
    public function __construct() {
        $this->middleware('auth');
    }

    public function index(Request $request) {
		
		$list = Country::orderBy('id', 'desc')->get();
		
		/* */
		$return = [
		
			'page_title' => 'Список стран',
			'list' => $list,
		
		];
		
        return view('countries', $return);
		
    }
	
	public function add(Request $request) {
		
		$rec = [		
		    'code' => '',
			'name' => '',			
		];
		
		/* Сохранение данных */
		if ($request->isMethod('post')) {
						
			/* Правила валидации */
			$rules = [			
				'name' => ['required'],				
			];
			
			$validator_msg = [ 			
				'name.required' => 'Поле "Город" обязательно для заполнения!',						
			];
			
			$valid = Validator::make($request->all(), $rules, $validator_msg)->validate();
			
			/* */
			$new = new Country;			
			$new->code = $request->input('code');
			$new->name = $request->input('name');
			$new->save();
			
			return redirect('/admin/countries')->with('success', 'Страна добавлена');
			
		}
		
		/* */
		$return = [
		
			'page_title' => 'Добавить страну',
			'rec' => (object)$rec,
			
		]; 
		
		return view('country_form', $return);
		
	}
	
	public function edit($id, Request $request) {
				
		$rec = Country::find($id);
		if (!$rec) {
			return redirect('/admin/countries')->with('error', 'Страна не найдена!');
		}
		
		/* Сохранение данных */
		if ($request->isMethod('post')) {
						
			/* Правила валидации */
			$rules = [			
				'name' => ['required'],				
			];
			
			$validator_msg = [ 			
				'name.required' => 'Поле "Город" обязательно для заполнения!',				
			];
			
			$valid = Validator::make($request->all(), $rules, $validator_msg)->validate();
			
			/* */
			$new = $rec;
			$new->code = $request->input('code');
			$new->name = $request->input('name');
			$new->save();
			
			return redirect('/admin/countries')->with('success', 'Страна обновлена');
			
		}
		
		/* */
		$return = [
		
			'page_title' => 'Редактировать страну',
			'rec' => $rec,
			'id' => $id,
			
		]; 
		
		return view('country_form', $return);
		
	}
	
}
