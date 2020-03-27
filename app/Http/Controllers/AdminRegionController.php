<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

use App\Region;

class AdminRegionController extends Controller {
	
    public function __construct() {
        $this->middleware('auth');
    }

    public function index(Request $request) {
		
		$list = Region::orderBy('id', 'desc')->get();
		
		/* */
		$return = [
		
			'page_title' => 'Список регионов',
			'list' => $list,
		
		];
		
        return view('regions', $return);
		
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
				'name.required' => 'Поле "Регион" обязательно для заполнения!',						
			];
			
			$valid = Validator::make($request->all(), $rules, $validator_msg)->validate();
			
			/* */
			$new = new Region;			
			$new->name = $request->input('name');
			$new->save();
			
			return redirect('/admin/regions')->with('success', 'Регион добавлен');
			
		}
		
		/* */
		$return = [
		
			'page_title' => 'Добавить регион',
			'rec' => (object)$rec,
			
		]; 
		
		return view('region_form', $return);
		
	}
	
	public function edit($id, Request $request) {
				
		$rec = Region::find($id);
		if (!$rec) {
			return redirect('/admin/regions')->with('error', 'Регион не найден!');
		}
		
		/* Сохранение данных */
		if ($request->isMethod('post')) {
						
			/* Правила валидации */
			$rules = [			
				'name' => ['required'],
			];
			
			$validator_msg = [ 			
				'name.required' => 'Поле "Регион" обязательно для заполнения!',						
			];
			
			$valid = Validator::make($request->all(), $rules, $validator_msg)->validate();
			
			/* */
			$new = $rec;	
			$new->name = $request->input('name');
			$new->save();
			
			return redirect('/admin/regions')->with('success', 'Регион обновлен');
			
		}
		
		/* */
		$return = [
		
			'page_title' => 'Изменить регион',
			'rec' => $rec,
			'id' => $id,
			
		]; 
		
		return view('region_form', $return);
		
	}
	
}
