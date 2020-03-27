<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

use App\User;
use App\City;
use App\Clinic;
use App\Content;
use App\Doctor;
use App\Duration;
use App\Patient;
use App\Region;
use App\Review;
use App\Spec;

class AdminController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

	/* Удаление */
	public function delete($table, $id) {

		if ($table == 'med') {
			$rec = Doctor::find($id);
		}
		if ($table == 'spec') {
			$rec = Spec::find($id);
		}
		if ($table == 'clinic') {
			$rec = Clinic::find($id);
		}
		if ($table == 'patient') {
			$rec = Patient::find($id);
		}
		if ($table == 'reviews') {
			$rec = Review::find($id);
		}
		if ($table == 'duration') {
			$rec = Duration::find($id);
		}
		if ($table == 'regions') {
			$rec = Region::find($id);
		}
		if ($table == 'cities') {
			$rec = City::find($id);
		}
		if ($table == 'content') {
			$rec = Content::find($id);
		}
		
		$rec->delete();

		return redirect()->back()->with('success', 'Запись удалена!');

	}
	
	/* Дашборд */
	public function dashboard(Request $request) {
		
		$list = [];
		
		/* */
		$return = [
		
			'page_title' => 'Дашборд',
			'list' => $list,
		
		];
		
		return view('dashboard', $return);
		
	}
	
	/* Страница настроек */
	public function settings(Request $request) {
		
		/* */
		$return = [
		
			'page_title' => 'Настройки',
			
		];
		
		return view('settings', $return);
		
	}

}
