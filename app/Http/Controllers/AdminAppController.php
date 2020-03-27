<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

use App\User;
use App\Country;
use App\Region;
use App\City;
use App\App;
use App\Opp;
use App\Order;

class AdminAppController extends Controller {
	
    public function __construct() {
        $this->middleware('auth');
    }

    public function index(Request $request) {  
		
		$list = App::orderBy('id', 'desc')->get();
		$search = '';
		
		if ($request->input('query')) {
			
			$sq = $request->input('query');
			$sq = urldecode($sq);
			
			$list = App::where('title', 'LIKE', '%'.$sq.'%');
			$list = $list->get();

			$search = $sq;
			
		}
						
		/* */
		$return = [
		
			'page_title' => 'Недвижимость',
			
			'list' => $list,
			'search' => $search,
		
		];
		
        return view('app', $return);
		
    }
    
    public function orders($type) {
        
        $this_type = 'на аукцион';
        if ($type == 'default') {
            $this_type = 'на бронь';
        }
        
        $list = Order::where(['type' => $type])->orderBy('id', 'desc')->get();
        if ($list->count()) {
            foreach ($list as $order) {
                
		        /* Кто оставил */
		        $order->who = 'не указан';
		        $this_who = User::find($order->arenus_id);
		        if ($this_who) {
		            $order->who = '<a href="/admin/arenus/info/'.$order->arenus_id.'">'.$this_who->last_name.' '.$this_who->name.'</a>';
		        }                
                
            }
        }
        
		/* */
		$return = [
		
			'page_title' => 'Заявки '.$this_type,
			'list' => $list,

		];
		
		return view('app_orders', $return);
		
    }
    
	public function info($id) {
		
		/* Ищем */
		$rec = App::find($id);
		
		/* Арендодатель */
		$arus = 'не указан';
		$verified = false;
		$phone = '-';
		$this_arus = User::find($rec->arus_id);
		if ($this_arus) {
		    
		    $arus = '<a href="/admin/arus/info/'.$rec->arus_id.'" title="">'.$this_arus->last_name.' '.$this_arus->name.'</a>';
		    if ($this_arus->verified) {
		        $verified = true;
		    }
		    
		    $phone = $this_arus->phone;
		    
		}
		
		$rec->arus = $arus;
		$rec->arus_verified = $verified;
		$rec->arus_phone = $phone;
		
		/* Регион и Город */
		$region = $city = 'не указан';
		$this_region = Region::find($rec->region_id);
		if ($this_region) {
		    $region = $this_region->name;
		}
		$this_city = City::find($rec->city_id);
		if ($this_city) {
		    $city = $this_city->name;
		}
		
		$rec->region = $region;
		$rec->city = $city;
		
		$list = Order::where(['app_id' => $id])->orderBy('id', 'desc')->get();
		$rec->auction_bid = 0;
		$rec->default_bid = 0;
		
		if ($list->count()) {
		    foreach ($list as $rr) {
		        
		        if ($rr->type == 'auction') {
		            $rec->auction_bid++;
		        }
		        else {
		            $rec->default_bid++;
		        }
		        
		        /* Кто оставил */
		        $rr->who = 'не указан';
		        $this_who = User::find($rr->arenus_id);
		        if ($this_who) {
		            $rr->who = '<a href="/admin/arenus/info/'.$rr->arenus_id.'">'.$this_who->last_name.' '.$this_who->name.'</a>';
		        }
		        
		    }
		}

        /* Удобства */
        $opps = json_decode($rec->amenities, true);
        $amenities = [];
        foreach ($opps as $oid => $on) {
            
            $opp = Opp::find($oid);
            if (!$opp) {
                continue;
            }
            
            $amenities[] = $opp->name;
            
        }

		/* */
		$return = [
		
			'page_title' => 'Объект '.$rec->title,
			
			'rec' => $rec,
			'list' => $list,
			'gallery' => json_decode($rec->gallery, true),
			'amenities' => $amenities,
		
		];
		
		return view('app_info', $return);
		
	}

	public function add(Request $request) {
		
		$rec = [

			'arus_id' => '',
			'region_id' => '',
			'city_id' => '',
			'address' => '',
			'title' => '',
			'text' => '',
			'text1' => '',
			'amenities' => '',
			'max_guests' => 2,
			'childs' => 1,
			'price_24h' => '',
			'ext_price' => 0,
			'can_auction' => false,
			'min_bid' => '',
			'active' => true,
			
		];
		
		/* Сохранение данных */
		if ($request->isMethod('post')) {
	
			/* Правила валидации */
			$rules = [
			
				'arus_id' => ['required'],
				'region_id' => ['required'],
				'city_id' => ['required'],
				'title' => ['required'],
				'text' => ['required'],
				'main_photo' => ['required'],
				'address' => ['required'],
				'max_guests' => ['required'],
				'childs' => ['required'],
				'price_24h' => ['required'],
				'ext_price' => ['required'],

			];
			
			$validator_msg = [ 

				'arus_id.required' => 'Поле "Арендодатель" обязательно для заполнения!',
				'region_id.required' => 'Поле "Регион" обязательно для заполнения!',
				'city_id.required' => 'Поле "Город" обязательно для заполнения!',
				'title.required' => 'Поле "Название" обязательно для заполнения!',
				'text.required' => 'Поле "Описание" обязательно для заполнения!',
				'address.required' => 'Поле "Адрес" обязательно для заполнения!',
				'max_guests.required' => 'Поле "Макс. кол-во гостей *" обязательно для заполнения!',
				'childs.required' => 'Поле "Можно с детьми" обязательно для заполнения!',
				'price_24h.required' => 'Поле "Минимальная стоимость за 24 часа (RUB)" обязательно для заполнения!',
				'ext_price.required' => 'Поле "Доплата за доп. гостя (RUB)" обязательно для заполнения!',
			    'main_photo.required' => 'Нужно добавить минимум 1 фото',

			];
			
			$valid = Validator::make($request->all(), $rules, $validator_msg)->validate();
			
			/* Главное фото */
			$main_photo = null;
			if ($request->file('main_photo')) {
				$main_photo = $request->file('main_photo')->store('main_photo/'.$request->input('token'), 'main_photo');
			}			
			
			/* Заливка галереи */	
			$gallery = [];
			$files = $request->file('product_image_id');
			if ($request->hasFile('gallery')) {
			    foreach ($files as $gf) {
			        $tf = $gf->store('gallery/'.$request->input('token'), 'gallery');
			        $gallery[] = $tf;
			    }
			}

			/* */
			$new = new App;
			
			$new->arus_id = $request->input('arus_id');
			$new->region_id = $request->input('region_id');
			$new->city_id = $request->input('city_id');
			$new->address = $request->input('address');
			$new->title = $request->input('title');
			$new->text = $request->input('text');
			$new->text1 = $request->input('text1');
		    $new->amenities = json_encode($request->input('amenities'));
            $new->max_guests = $request->input('max_guests');
            $new->price_24h = $request->input('price_24h');
            $new->ext_price = $request->input('ext_price');
            $new->childs = $request->input('childs');
            $new->can_auction = $request->input('can_auction');
            $new->min_bid = $request->input('min_bid');
            $new->main_photo = $main_photo;
			$new->gallery = json_encode($gallery);
			$new->active = $request->input('active');
			
			$new->save();
			
			return redirect('/admin/app')->with('success', 'Недвижимость добавлена');
			
		}
		
		/* */
		$return = [
		
			'page_title' => 'Добавить недвижимость',
			'rec' => (object)$rec,
			'arus' => User::where(['type' => 'arus'])->orderBy('last_name', 'asc')->get(),
			'regions' => Region::orderBy('name', 'asc')->get(),
			'cities' => City::orderBy('name', 'asc')->get(),
			'amenities' => Opp::orderBy('name', 'asc')->get(),
			
		];
		
		return view('app_form', $return);
		
	}
	
	public function edit($id, Request $request) {
				
		$rec = App::find($id);
		if (!$rec) {
			return redirect('/admin/app')->with('error', 'Недвижимость не найдена!');
		}
		
		/* Сохранение данных */
		if ($request->isMethod('post')) {
	
			/* Правила валидации */
			$rules = [
			
				'arus_id' => ['required'],
				'region_id' => ['required'],
				'city_id' => ['required'],
				'title' => ['required'],
				'text' => ['required'],
				'address' => ['required'],
				'max_guests' => ['required'],
				'childs' => ['required'],
				'price_24h' => ['required'],
				'ext_price' => ['required'],

			];
			
			$validator_msg = [ 

				'arus_id.required' => 'Поле "Арендодатель" обязательно для заполнения!',
				'region_id.required' => 'Поле "Регион" обязательно для заполнения!',
				'city_id.required' => 'Поле "Город" обязательно для заполнения!',
				'title.required' => 'Поле "Название" обязательно для заполнения!',
				'text.required' => 'Поле "Описание" обязательно для заполнения!',
				'address.required' => 'Поле "Адрес" обязательно для заполнения!',
				'max_guests.required' => 'Поле "Макс. кол-во гостей *" обязательно для заполнения!',
				'childs.required' => 'Поле "Можно с детьми" обязательно для заполнения!',
				'price_24h.required' => 'Поле "Минимальная стоимость за 24 часа (RUB)" обязательно для заполнения!',
				'ext_price.required' => 'Поле "Доплата за доп. гостя (RUB)" обязательно для заполнения!',
			    'main_photo.required' => 'Нужно добавить минимум 1 фото',

			];
			
			$valid = Validator::make($request->all(), $rules, $validator_msg)->validate();
			
			/* Главное фото */
			$main_photo = $rec->main_photo;
			if ($request->file('main_photo')) {
				$main_photo = $request->file('main_photo')->store('main_photo/'.$request->input('token'), 'main_photo');
			}			
			
			/* Заливка галереи */	
			$gallery = json_decode($rec->gallery);
			$files = $request->file('gallery');
			if ($request->hasFile('gallery')) {
			    foreach ($files as $gf) {
			        $tf = $gf->store('gallery/'.$request->input('token'), 'gallery');
			        $gallery[] = $tf;
			    }
			}
			
			/* */
			$new = $rec;
			
			$new->arus_id = $request->input('arus_id');
			$new->region_id = $request->input('region_id');
			$new->city_id = $request->input('city_id');
			$new->address = $request->input('address');
			$new->title = $request->input('title');
			$new->text = $request->input('text');
			$new->text1 = $request->input('text1');
			$new->amenities = json_encode($request->input('amenities'));
            $new->max_guests = $request->input('max_guests');
            $new->price_24h = $request->input('price_24h');
            $new->ext_price = $request->input('ext_price');
            $new->childs = $request->input('childs');
            $new->can_auction = $request->input('can_auction');
            $new->min_bid = $request->input('min_bid');
            $new->main_photo = $main_photo;
			$new->gallery = json_encode($gallery);
			$new->active = $request->input('active');
			
			$new->save();
			
			return redirect('/admin/app')->with('success', 'Недвижимость обновлена');
			
		}
		
		$amen = json_decode($rec->amenities, true);
		if (!is_array($amen)) {
		    $amen = json_decode($rec->amenities, true);
		}
		
		/* */
		$return = [
		
			'page_title' => 'Редактировать недвижимость',
			'rec' => (object)$rec,
			'id' => $id,
			'arus' => User::where(['type' => 'arus'])->orderBy('last_name', 'asc')->get(),
			'regions' => Region::orderBy('name', 'asc')->get(),
			'cities' => City::orderBy('name', 'asc')->get(),
			'amenities' => Opp::orderBy('name', 'asc')->get(),
			'gallery' => json_decode($rec->gallery, true),
			'ameni' => $amen,
			
		];
		
		return view('app_form', $return);
		
	}

}