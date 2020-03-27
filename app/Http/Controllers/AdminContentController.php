<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

use Route;
use App\Content;

class AdminContentController extends Controller {
	
    public function __construct() {
        $this->middleware('auth');
    }

    public function index(Request $request) {
		
		$route = Route::current()->getName();
		if ($route == 'admin_news') {
			
			$list = Content::where(['post_type' => 'news'])->orderBy('pos', 'asc')->get();
			$route = route('admin_news');
			$route_add = route('admin_news_add');
			$route_edit = 'admin_news_edit';
			$type = 'Новости';
			$list_of = 'новостей';
			
		}
		elseif ($route == 'admin_arts') {
			
			$list = Content::where(['post_type' => 'article'])->orderBy('pos', 'asc')->get();
			$route = route('admin_arts');
			$route_add = route('admin_arts_add');
			$route_edit = 'admin_arts_edit';
			$type = 'Статьи';
			$list_of = 'статей';			
			
		}
		elseif ($route == 'admin_recs') {
			
			$list = Content::where(['post_type' => 'reco'])->orderBy('pos', 'asc')->get();
			$route = route('admin_recs');
			$route_add = route('admin_recs_add');
			$route_edit = 'admin_recs_edit';
			$type = 'Рекомендации';
			$list_of = 'рекомендаций';			
			
		}
		elseif ($route == 'admin_docs') {
			
			$list = Content::where(['post_type' => 'doc'])->orderBy('pos', 'asc')->get();
			$route = route('admin_docs');
			$route_add = route('admin_docs_add');
			$route_edit = 'admin_docs_edit';
			$type = 'Документы';
			$list_of = 'документов';			
			
		}
		
		/* */
		$return = [
		
			'page_title' => 'Список '.$list_of,
			'list' => $list,
			'route' => $route,
			'route_add' => $route_add,
			'route_edit' => $route_edit,
			'type' => $type,
			'list_of' => $list_of,
		
		];
		
        return view('content', $return);
		
    }
	
	public function add(Request $request) {
		
		$rec = [	
		
			'pos' => '',			
			'title' => '',			
			'date' => date('d.m.Y'),			
			'text' => '',			
			
		];
		
		$route = Route::current()->getName();
		if ($route == 'admin_news_add' or $route == 'admin_news_edit') {
			
			$list = Content::where(['post_type' => 'news'])->get();
			$route = route('admin_news');
			$route_add = route('admin_news_add');
			$route_edit = 'admin_news_edit';
			$type = 'Новости';
			$type_add = 'новость';
			$type_add_up = 'Новость';
			$redirect = '/admin/news';
			$post_type = 'news';
			
		}
		elseif ($route == 'admin_arts_add' or $route == 'admin_arts_edit') {
			
			$list = Content::where(['post_type' => 'article'])->get();
			$route = route('admin_arts');
			$route_add = route('admin_arts_add');
			$route_edit = 'admin_arts_edit';
			$type = 'Статьи';
			$type_add = 'статью';
			$type_add_up = 'Статью';
			$redirect = '/admin/articles';
			$post_type = 'article';			
			
		}
		elseif ($route == 'admin_recs_add' or $route == 'admin_recs_edit') {
			
			$list = Content::where(['post_type' => 'reco'])->get();
			$route = route('admin_recs');
			$route_add = route('admin_recs_add');
			$route_edit = 'admin_recs_edit';
			$type = 'Рекомендации';
			$type_add = 'рекомендацию';
			$type_add_up = 'Рекомендацию';
			$redirect = '/admin/recs';
			$post_type = 'reco';			
			
		}
		elseif ($route == 'admin_docs_add' or $route == 'admin_docs_edit') {
			
			$list = Content::where(['post_type' => 'doc'])->get();
			$route = route('admin_docs');
			$route_add = route('admin_docs_add');
			$route_edit = 'admin_docs_edit';
			$type = 'Документы';
			$type_add = 'документ';
			$type_add_up = 'Документ';
			$redirect = '/admin/docs';
			$post_type = 'doc';			
			
		}
		
		/* Сохранение данных */
		if ($request->isMethod('post')) {
						
			/* Правила валидации */
			$rules = [	
			
				'title' => ['required'],						
				'text' => ['required'],						
				
			];
			
			$validator_msg = [ 		

				'title.required' => 'Поле "Заголовок" обязательно для заполнения!',
				'text.required' => 'Поле "Содержимое" обязательно для заполнения!',

			];
			
			$valid = Validator::make($request->all(), $rules, $validator_msg)->validate();
			
			/* */
			$new = new Content;		

			$new->pos = $request->input('pos');
			$new->title = $request->input('title');
			$new->text = $request->input('text');
			$new->date = date('Y-m-d', strtotime($request->input('date')));
			$new->post_type = $request->input('post_type');

			$new->save();
			
			return redirect($redirect)->with('success', $type_add_up.' добавлена');
			
		}

		/* */
		$return = [
		
			'page_title' => 'Добавить '.$type_add,
			'rec' => (object)$rec,
			'route' => $route,
			'route_add' => $route_add,
			'route_edit' => $route_edit,
			'type' => $type,
			'type_add' => $type_add,
			'post_type' => $post_type,
			
		]; 
		
		return view('content_form', $return);
		
	}
	
	public function edit($id, Request $request) {
				
		$rec = Content::find($id);
		if (!$rec) {
			return redirect()->back()->with('error', 'Запись не найдена!');
		}
		
		$route = Route::current()->getName();
		if ($route == 'admin_news_add' or $route == 'admin_news_edit') {
			
			$list = Content::where(['post_type' => 'news'])->get();
			$route = route('admin_news');
			$route_add = route('admin_news_add');
			$route_edit = 'admin_news_edit';
			$type = 'Новости';
			$type_add = 'новость';
			$type_add_up = 'Новость';
			$redirect = '/admin/news';
			$post_type = 'news';
			
		}
		elseif ($route == 'admin_arts_add' or $route == 'admin_arts_edit') {
			
			$list = Content::where(['post_type' => 'article'])->get();
			$route = route('admin_arts');
			$route_add = route('admin_arts_add');
			$route_edit = 'admin_arts_edit';
			$type = 'Статьи';
			$type_add = 'статью';
			$type_add_up = 'Статью';
			$redirect = '/admin/articles';
			$post_type = 'article';			
			
		}
		elseif ($route == 'admin_recs_add' or $route == 'admin_recs_edit') {
			
			$list = Content::where(['post_type' => 'reco'])->get();
			$route = route('admin_recs');
			$route_add = route('admin_recs_add');
			$route_edit = 'admin_recs_edit';
			$type = 'Рекомендации';
			$type_add = 'рекомендацию';
			$type_add_up = 'Рекомендацию';
			$redirect = '/admin/recs';
			$post_type = 'reco';			
			
		}
		elseif ($route == 'admin_docs_add' or $route == 'admin_docs_edit') {
			
			$list = Content::where(['post_type' => 'doc'])->get();
			$route = route('admin_docs');
			$route_add = route('admin_docs_add');
			$route_edit = 'admin_docs_edit';
			$type = 'Документы';
			$type_add = 'документ';
			$type_add_up = 'Документ';
			$redirect = '/admin/docs';
			$post_type = 'doc';			
			
		}
		
		/* Сохранение данных */
		if ($request->isMethod('post')) {
						
			/* Правила валидации */
			$rules = [	
			
				'title' => ['required'],						
				'text' => ['required'],						
				
			];
			
			$validator_msg = [ 		

				'title.required' => 'Поле "Заголовок" обязательно для заполнения!',
				'text.required' => 'Поле "Содержимое" обязательно для заполнения!',

			];
			
			$valid = Validator::make($request->all(), $rules, $validator_msg)->validate();
			
			/* */
			$new = $rec;		

			$new->pos = $request->input('pos');
			$new->title = $request->input('title');
			$new->text = $request->input('text');
			$new->date = date('Y-m-d', strtotime($request->input('date')));
			$new->post_type = $request->input('post_type');

			$new->save();
			
			return redirect($redirect)->with('success', $type_add_up.' обновлена');
			
		}

		/* */
		$return = [
		
			'page_title' => 'Редактировать '.$type_add,
			'rec' => $rec,
			'id' => $id,
			'route' => $route,
			'route_add' => $route_add,
			'route_edit' => $route_edit,
			'type' => $type,
			'type_add' => $type_add,
			'post_type' => $post_type,
			
		]; 
		
		return view('content_form', $return);
		
	}
	
}
