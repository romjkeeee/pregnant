<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

use App\Lang;

class AdminLangController extends Controller {
	
    public function __construct() {
        $this->middleware('auth');
    }

    public function index(Request $request) {
				
		$list = Lang::orderBy('id', 'desc')->get();
		
		/* */
		$return = [
		
			'page_title' => 'Список языков',
			'list' => $list,
		
		];
		
        return view('langs', $return);
		
    }
	
	public function add(Request $request) {
		
		$rec = [		
		
			'code' => '',
			'name' => '',
			'file' => null,
			
		];
		
		/* Сохранение данных */
		if ($request->isMethod('post')) {
						
			/* Правила валидации */
			$rules = [			
			
				'code' => ['required'],				
				'name' => ['required'],		
				
			];
			
			$validator_msg = [ 			
			
				'code.required' => 'Поле "Код" обязательно для заполнения!',						
				'name.required' => 'Поле "Язык" обязательно для заполнения!',	
				
			];
			
			$valid = Validator::make($request->all(), $rules, $validator_msg)->validate();

			/* Заливка файла */
			$file = null;
			if ($request->file('file')) {
				$file = $request->file('file')->store('langs/'.$request->input('token'), 'langs');
			}
			
			/* */
			$new = new Lang;		
			
			$new->code = $request->input('code');
			$new->name = $request->input('name');
			$new->file = $file;
			
			$new->save();
			
			return redirect('/admin/langs')->with('success', 'Язык добавлен');
			
		}
		
		/* */
		$return = [
		
			'page_title' => 'Добавить язык',
			'rec' => (object)$rec,

		]; 
		
		return view('lang_form', $return);
		
	}
	
	public function edit($id, Request $request) {
				
		$rec = Lang::find($id);
		if (!$rec) {
			return redirect('/admin/langs')->with('error', 'Язык не найден!');
		}
		
		/* Сохранение данных */
		if ($request->isMethod('post')) {
						
			/* Правила валидации */
			$rules = [			
			
				'code' => ['required'],				
				'name' => ['required'],		
				
			];
			
			$validator_msg = [ 			
			
				'code.required' => 'Поле "Код" обязательно для заполнения!',						
				'name.required' => 'Поле "Язык" обязательно для заполнения!',	
				
			];
			
			$valid = Validator::make($request->all(), $rules, $validator_msg)->validate();

			/* Заливка файла */
			$file = $rec->file;
			if ($request->file('file')) {
				$file = $request->file('file')->store('langs/'.$request->input('token'), 'langs');
			}
			
			/* */
			$new = $rec;		
			
			$new->code = $request->input('code');
			$new->name = $request->input('name');
			$new->file = $file;
			
			$new->save();
			
			return redirect('/admin/langs')->with('success', 'Язык обновлен');
			
		}
		
		/* */
		$return = [
		
			'page_title' => 'Редактировать язык',
			'rec' => $rec,
			'id' => $id,

		]; 
		
		return view('lang_form', $return);
		
	}
	
}
