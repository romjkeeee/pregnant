<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

use App\Opp;

class AdminOppController extends Controller {
	
    public function __construct() {
        $this->middleware('auth');
    }

    public function index(Request $request) {
		
		$list = Opp::orderBy('id', 'desc')->get();
		
		/* */
		$return = [
		
			'page_title' => 'Список удобств',
			'list' => $list,
		
		];
		
        return view('opp', $return);
		
    }
	
	public function add(Request $request) {
		
		$rec = [		
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
			
			/* Заливка аватара */
			$icon = null;
			if ($request->file('icon')) {
				$icon = $request->file('icon')->store('opp/'.$request->input('token'), 'opp');
			}			
			
			/* */
			$new = new Opp;			
			$new->name = $request->input('name');
			$new->icon = $icon;
			$new->save();
			
			return redirect('/admin/opp')->with('success', 'Удобство добавлено');
			
		}
		
		/* */
		$return = [
		
			'page_title' => 'Добавить удобство',
			'rec' => (object)$rec,
			
		]; 
		
		return view('opp_form', $return);
		
	}
	
	public function edit($id, Request $request) {
				
		$rec = Opp::find($id);
		if (!$rec) {
			return redirect('/admin/opp')->with('error', 'Удобство не найдено!');
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
			
			/* Заливка аватара */
			$icon = $rec->icon;
			if ($request->file('icon')) {
				$icon = $request->file('icon')->store('opp/'.$request->input('token'), 'opp');
			}			
			
			/* */
			$new = $rec;			
			$new->name = $request->input('name');
			$new->icon = $icon;
			$new->save();
			
			return redirect('/admin/opp')->with('success', 'Удобство обновлено');
			
		}
		
		/* */
		$return = [
		
			'page_title' => 'Редактировать удобство',
			'rec' => $rec,
			'id' => $id,
			
		]; 
		
		return view('opp_form', $return);
		
	}
	
}
