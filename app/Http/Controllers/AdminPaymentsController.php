<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

use App\Category;
use App\User;
use App\Ads;

class AdminPaymentsController extends Controller {
	
    public function __construct() {
        $this->middleware('auth');
    }
	
	/* Генерация ID */
	public function random_unique($length) {
		
		$symbols = '1234567890';
		$return = '';
		
		for ($a = 0; $a < $length; $a++) {
			$return .= substr($symbols, rand(0, strlen($symbols) - 1), 1);
		}
		
		return $return;
		
	}	
	
	/* Список рубрик */
    public function index(Request $request) {
		
		$list = Category::orderBy('name', 'asc')->get();
		$search = '';
		
		if ($request->input('nr')) {
			
			$sq = $request->input('nr');
			$sq = urldecode($sq);
			
			$list = Category::where('name', 'LIKE', '%'.$sq.'%');
			$list = $list->get();

			$search = $sq;
			
		}
		
		if ($list->count()) {
			foreach ($list as $rec) {
				
				$rec->count = 0;
				/* Кол-во объявлений */
				$ads = Ads::where(['category_id' => $rec->id])->get();
				if ($ads->count()) {
					$rec->count = $ads->count();
				}
			
			}
		}
						
		/* */
		$return = [
		
			'page_title' => 'Список платежей',
			
			'list' => $list,
			'search' => $search,
		
		];
		
        return view('payments', $return);
		
    }
	
	/* Информация о рубрике */
	public function info($id) {
		
		/* Ищем категорию */
		$rec = Category::find($id);
		if (!$rec) {
			return redirect('/admin/cats')->with('error', 'Рубрика не найдена');
		}
		
		/* Объявления из рубрики */
		$list = Ads::where(['category_id' => $id])->orderBy('id', 'desc')->get();
		
		/* */
		$return = [
		
			'page_title' => 'Рубрика '.$rec->name,
			
			'rec' => $rec,
			'coupon' => $coupon,
			'names' => $names,
			'list' => $list,
			'opts' => $opts,
			'group' => $group,
			'coupon_list' => null,
			'coupon_first' => null,
			'list1' => null,
			'list2' => null,
		
		];
		
		return view('user_info', $return);
		
	}
	
	/* Добавить рубрику */
	public function add(Request $request) {
		
		$rec = [

			'name' => '',
			'logo' => '',
			'active' => 1,
			
		];
		
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
			
			/* Иконка */
			$thumb = '';
			
			if ($request->file('thumb')) {
				
				$thumb = $request->file('logo')->store(
					'thumb/'.rand(100000, 999999), 'thumb'
				);

			}			
			
			/* */
			$new = new Category;
			
			$new->unique_id = $this->random_unique(6);
			$new->name = $request->input('name');
			$new->thumb = $thumb;
			$new->active = $request->input('active');
			
			$new->save();
			
			return redirect('/admin/cats')->with('success', 'Рубрика добавлена');
			
		}
		
		/* */
		$return = [
		
			'page_title' => 'Добавить рубрику',
			'rec' => (object)$rec,
			
		];
		
		return view('cat_form', $return);
		
	}
	
	/* Редактировать рубрику */
	public function edit($id, Request $request) {
				
		$rec = Category::find($id);
		if (!$rec) {
			return redirect('/admin/cats')->with('error', 'Рубрика не найдена');
		}
		
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
			
			/* Иконка */
			$thumb = $rec->thumb;
			
			if ($request->file('thumb')) {
				
				$thumb = $request->file('logo')->store(
					'thumb/'.rand(100000, 999999), 'thumb'
				);

			}			
			
			/* */
			$new = $rec;
			
			$new->unique_id = $this->random_unique(6);
			$new->name = $request->input('name');
			$new->thumb = $thumb;
			$new->active = $request->input('active');
			
			$new->save();
			
			return redirect('/admin/cats')->with('success', 'Рубрика добавлена');
			
		}
		
		/* */
		$return = [
		
			'page_title' => 'Редактировать рубрику',
			'rec' => (object)$rec,
			'id' => $id,
			
		];
		
		return view('cat_form', $return);
		
	}

}