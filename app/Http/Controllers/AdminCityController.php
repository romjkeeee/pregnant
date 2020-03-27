<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

use App\Region;
use App\City;

class AdminCityController extends Controller {
	
    public function __construct() {
        $this->middleware('auth');
    }

    public function index(Request $request) {
				
		$list = City::orderBy('name', 'asc');
		$region_id = $request->input('region_id');
		
		if ($region_id) {
		    $list = $list->where(['region_id' => $region_id])->orderBy('name', 'asc');
		}
		
		$list = $list->get();
		if ($list->count()) {
	        foreach ($list as $rec) {
	            
	            $rec->region = 'не указан';
	            $this_region = Region::find($rec->region_id);
	            if ($this_region) {
	                $rec->region = $this_region->name;
	            }
	            
	        }
		}
		
		/* */
		$return = [
		
			'page_title' => 'Список городов',
			'list' => $list,
			'regions' => Region::orderBy('name', 'asc')->get(),
			'region_id' => $region_id,
		
		];
		
        return view('cities', $return);
		
    }
	
	public function add(Request $request) {
		
		$rec = [		
		
		    'region_id' => null,
			'name' => '',
			
		];
		
		/* Сохранение данных */
		if ($request->isMethod('post')) {
						
			/* Правила валидации */
			$rules = [			
				'name' => ['required'],				
			];
			
			$validator_msg = [ 			
			
				'region_id.required' => 'Поле "Регион" обязательно для заполнения!',						
				'name.required' => 'Поле "Город" обязательно для заполнения!',	
				
			];
			
			$valid = Validator::make($request->all(), $rules, $validator_msg)->validate();
			
			/* */
			$new = new City;		
			
			$new->region_id = $request->input('region_id');
			$new->name = $request->input('name');
			
			$new->save();
			
			return redirect('/admin/cities')->with('success', 'Город добавлен');
			
		}
		
		/* */
		$return = [
		
			'page_title' => 'Добавить город',
			'rec' => (object)$rec,
	    	'regions' => Region::orderBy('name', 'asc')->get(),
			
		]; 
		
		return view('city_form', $return);
		
	}
	
	public function edit($id, Request $request) {
				
		$rec = City::find($id);
		if (!$rec) {
			return redirect('/admin/cities')->with('error', 'Город не найден!');
		}
		
		/* Сохранение данных */
		if ($request->isMethod('post')) {
						
			/* Правила валидации */
			$rules = [	
			
				'region_id' => ['required'],				
				'name' => ['required'],				
				
			];
			
			$validator_msg = [ 		
			
				'region_id.required' => 'Поле "Регион" обязательно для заполнения!',						
				'name.required' => 'Поле "Город" обязательно для заполнения!',	
				
			];
			
			$valid = Validator::make($request->all(), $rules, $validator_msg)->validate();
			
			/* */
			$new = $rec;		
			$new->region_id = $request->input('region_id');
			$new->name = $request->input('name');
			$new->save();
			
			return redirect('/admin/cities')->with('success', 'Город добавлен');
			
		}
		
		/* */
		$return = [
		
			'page_title' => 'Редактировать город',
			'rec' => $rec,
			'id' => $id,
	    	'regions' => Region::orderBy('name', 'asc')->get(),			
			
		]; 
		
		return view('city_form', $return);
		
	}
	
}
