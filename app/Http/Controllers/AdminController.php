<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

use App\Option;
use App\Lang;
use App\User;
use App\Ads;
use App\Category;

class AdminController extends Controller {
	
    public function __construct() {
        $this->middleware('auth');
    }
	
	/* Настройки */
	public function settings(Request $request) {
		
		/* По умолчанию */
		$rec = [
		
			'month' => 0,
			'month3' => 0,
			'year' => 0,
		
		];
		
		$rec = json_decode(json_encode($rec));
		
		/* Сохранение настроек */
		if ($request->isMethod('post')) {
			
			if (!is_array($request->input('settings'))) {
				return redirect('/admin/users')->with('error', 'Настройки не удалось получить!');
			}
			
			foreach ($request->input('settings') as $key => $value) {
				
				$option = Option::where(['oname' => $key])->first();
				if (!$option) {
					continue;
				}
				
				$option->ovalue = $value;
				$option->save();
				
			}
			
			return redirect('/admin/settings')->with('success', 'Настройки сохранены');
			
		}
		
		/* Получаем настройки */
		$data = [];
		$settings = Option::get();
		
		if ($settings->count()) {
			foreach ($settings as $set) {
				
				$data[$set->oname] = $set->ovalue;
				
			}
		}
		
		$rec = json_decode(json_encode($data));
		
		/* */
		$return = [
		
			'page_title' => 'Настройки',
			'rec' => $rec,
		
		];
		
		return view('settings', $return);
		
	}
	
	/* Языки */
	public function langs(Request $request) {
		
		$list = Lang::orderBy('id', 'desc')->get();	
		
		/* */
		$return = [
		
			'page_title' => 'Языки',
			'list' => $list,
		
		];
		
		return view('langs', $return);
		
	}
	
	/* Добавить язык */
	public function add(Request $request) {
		
		$rec = [
			'name' => '',
		];
		
		$rec = json_decode(json_encode($rec));
		
		/* Сохранение данных */
		if ($request->isMethod('post')) {
						
			/* Правила валидации */
			$rules = [
				'name' => ['required'],			
			];
			
			$validator_msg = [ 
				'name.required' => 'Поле "Название" обязательно для заполнения!',			
			];
			
			$valid = Validator::make($request->all(), $rules, $validator_msg)->validate();
			
			/* Файл */
			$file = '';
			
			if ($request->file('file')) {
				
				$file = $request->file('file')->store(
					'lang/'.strtolower($request->input('name')), 'lang'
				);

			}			
			
			/* */
			$new = new Lang;
			
			$new->name = $request->input('name');
			$new->file = $file;
			
			$new->save();
			
			return redirect('/admin/langs')->with('success', 'Язык добавлен');
			
		}		
		
		/* */
		$return = [
		
			'page_title' => 'Добавить язык',
			'rec' => $rec,
		
		];
		
		return view('lang_form', $return);
		
	}
	
	public function edit($id, Request $request) {
		
		$rec = Lang::find($id);
		if (!$rec) {
			return redirect('/admin/langs')->with('error', 'Языковой пакет не найден');
		}
		
		if (!file_exists($rec->file)) {
			return redirect('/admin/langs')->with('error', 'Файл языкового пакета не найден');
		}
		
		$content = file_get_contents($rec->file);
		$content = nl2br($content);
		
		/* Сохранение данных */
		if ($request->isMethod('post')) {
						
			/* Правила валидации */
			$rules = [
				'name' => ['required'],			
			];
			
			$validator_msg = [ 
				'name.required' => 'Поле "Название" обязательно для заполнения!',			
			];
			
			$valid = Validator::make($request->all(), $rules, $validator_msg)->validate();
			
			/* Файл сохраняем */
			$code = trim(str_replace('<br><br>', '<br>', $request->input('code')));
			file_put_contents($rec->file, $code);
			
			/* */
			$new = $rec;
			
			$new->name = $request->input('name');
			$new->file = $rec->file;
			
			$new->save();
			
			return redirect('/admin/langs')->with('success', 'Языковой пакет обновлен');
			
		}		
		
		/* */
		$return = [
		
			'page_title' => 'Редактировать язык',
			'rec' => $rec,
			'content' => $content,
			'id' => $id,
		
		];
		
		return view('lang_form', $return);
		
	}
	
	/* Удаление */
	public function delete($table, $id) {
		
		if ($table == 'users') {
			$rec = User::find($id);
		}
		if ($table == 'cats') {
			$rec = Category::find($id);
		}
		if ($table == 'ads') {
			$rec = Ads::find($id);
		}
		if ($table == 'langs') {
			$rec = Lang::find($id);
		}
		
		$rec->delete();
		
		return redirect()->back()->with('success', 'Запись удалена!');
		
	}
	
}
