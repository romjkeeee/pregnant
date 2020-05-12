<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

use App\Doctor;
use App\Specialization;
use App\Clinic;
use App\Region;
use App\Patient;
use App\City;

class AdminClinicController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index(Request $request) {

		$list = Clinic::orderBy('id', 'desc')->get();
		$search = $request->input('query');

		if ($search) {

			$list = Clinic::where('name', 'LIKE', '%'.$search.'%')->
					orWhere('address', 'LIKE', '%'.$search.'%')->get();

		}

		if ($list->count()) {
			foreach ($list as $rec) {

				/* Регион, Город */
				$rec->region = '&mdash;';
				$this_region = Region::find($rec->region_id);
				if ($this_region) {
					$rec->region = $this_region->name;
				}

				$rec->city = '&mdash;';
				$this_city = City::find($rec->city_id);
				if ($this_city) {
					$rec->city = $this_city->name;
				}

			}
		}

		/* */
		$return = [

			'page_title' => 'Список клиник',
			'list' => $list,
			'search' => $search,

		];

        return view('clinics', $return);

    }

	public function add(Request $request) {

		$rec = [

			'region_id' => '',
			'city_id' => '',
			'name' => '',
			'text' => '',
			'address' => '',
			'lng' => null,
			'lat' => null,

		];

		/* Сохранение данных */
		if ($request->isMethod('post')) {

			/* Правила валидации */
			$rules = [

				'region_id' => ['required'],
				'city_id' => ['required'],
				'name' => ['required'],
				'text' => ['required'],
				'address' => ['required'],

			];

			$validator_msg = [

				'region_id.required' => 'Поле "Регион" обязательно для заполнения!',
				'city_id.required' => 'Поле "Город" обязательно для заполнения!',
				'name.required' => 'Поле "Название" обязательно для заполнения!',
				'text.required' => 'Поле "Описание" обязательно для заполнения!',
				'address.required' => 'Поле "Адрес" обязательно для заполнения!',

			];

			$valid = Validator::make($request->all(), $rules, $validator_msg)->validate();

			/* */
			$new = new Clinic;

			$new->region_id = $request->input('region_id');
			$new->city_id = $request->input('city_id');
			$new->name = $request->input('name');
			$new->text = $request->input('text');
			$new->address = $request->input('address');

			$new->save();

			return redirect('/admin/clinic')->with('success', 'Клиника добавлена');

		}

		/* */
		$return = [

			'page_title' => 'Добавить клинику',
			'rec' => (object)$rec,
			'regions' => Region::orderBy('name', 'asc')->get(),
			'cities' => City::orderBy('name', 'asc')->get(),

		];

		return view('clinic_form', $return);

	}

	public function edit($id, Request $request) {

		$rec = Clinic::find($id);
		if (!$rec) {
			return redirect('/admin/clinic')->with('error', 'Клиника не найдена!');
		}

		/* Сохранение данных */
		if ($request->isMethod('post')) {

			/* Правила валидации */
			$rules = [

				'region_id' => ['required'],
				'city_id' => ['required'],
				'name' => ['required'],
				'text' => ['required'],
				'address' => ['required'],

			];

			$validator_msg = [

				'region_id.required' => 'Поле "Регион" обязательно для заполнения!',
				'city_id.required' => 'Поле "Город" обязательно для заполнения!',
				'name.required' => 'Поле "Название" обязательно для заполнения!',
				'text.required' => 'Поле "Описание" обязательно для заполнения!',
				'address.required' => 'Поле "Адрес" обязательно для заполнения!',

			];

			$valid = Validator::make($request->all(), $rules, $validator_msg)->validate();

			/* */
			$new = $rec;

			$new->region_id = $request->input('region_id');
			$new->city_id = $request->input('city_id');
			$new->name = $request->input('name');
			$new->text = $request->input('text');
			$new->address = $request->input('address');

			$new->save();

			return redirect('/admin/clinic')->with('success', 'Клиника обновлена');

		}

		/* */
		$return = [

			'page_title' => 'Редактировать клинику',
			'rec' => $rec,
			'id' => $id,
			'regions' => Region::orderBy('name', 'asc')->get(),
			'cities' => City::orderBy('name', 'asc')->get(),

		];

		return view('clinic_form', $return);

	}

	public function info($id, Request $request) {

		$single = Clinic::find($id);
		if (!$single) {
			return redirect('/admin/clinic')->with('error', 'Клиника не найдена!');
		}


		/* Врачи */
		$doct = Doctor::get();
		$doct_id = [];
		if ($doct->count()) {
			foreach ($doct as $doc) {

				$this_cl = json_decode($doc->clinics, true);
				if (!in_array($id, $this_cl)) {
					continue;
				}

				$doct_id[] = $doc->id;

			}
		}

		$list = Doctor::whereIn('id', $doct_id)->orderBy('id', 'desc')->get();
		if ($list->count()) {
			foreach ($list as $rec) {

				/* Специализации */
				$rec->spec = '&mdash;';
				$this_spec = json_decode($rec->specialization, true);
				if (is_array($this_spec)) {
					foreach ($this_spec as $spec) {

						$this_ = Specialization::find($spec);
						if (!$this_) {
							continue;
						}

						$rec->spec .= '<span class="badge badge-info">'.$this_->name.'</span>';

					}

					$rec->spec = trim(str_replace('&mdash;', '', $rec->spec));

				}

			}
		}

		$list1 = Patient::where(['clinic_id' => $id])->orderBy('id', 'desc')->get();
		if ($list1->count()) {
			foreach ($list1 as $rec) {

				/* Регион, Город */
				$rec->region = '&mdash;';
				$this_region = Region::find($rec->region_id);
				if ($this_region) {
					$rec->region = $this_region->name;
				}

				$rec->city = '&mdash;';
				$this_city = City::find($rec->city_id);
				if ($this_city) {
					$rec->city = $this_city->name;
				}

				/* Клиника */
				$rec->clinic = '&mdash;';
				$this_clinic = Clinic::find($rec->clinic_id);
				if ($this_clinic) {
					$rec->clinic = '<a href="'.route('admin_clinic_info', $rec->clinic_id).'">'.$this_clinic->name.'</a>';
				}

				/* Врач */
				$rec->doctor = '&mdash;';
				$this_doctor = Doctor::find($rec->doctor_id);
				if ($this_doctor) {
					$rec->doctor = '<a href="'.route('admin_med_info', $rec->doctor_id).'">'.$this_doctor->last_name.' '.$this_doctor->name.' '.$this_doctor->second_name.'</a>';
				}

				/* Беременность */
				if ($rec->pregnant) {

					/* Срок */
					$this_duration = Duration::find($rec->duration_id);
					if ($this_duration) {
						$rec->pregnant = '<span class="badge badge-info">Беременность '.$this_duration->name.'</span>';
					}
					else {
						$rec->pregnant = '<span class="badge badge-info">Беременность. Срок не установлен</span>';
					}

				}
				else {
					$rec->pregnant = '<span class="badge badge-warning">Нет</span>';
				}

			}
		}

				/* Регион, Город */
				$single->region = '&mdash;';
				$this_region = Region::find($single->region_id);
				if ($this_region) {
					$single->region = $this_region->name;
				}

				$single->city = '&mdash;';
				$this_city = City::find($single->city_id);
				if ($this_city) {
					$single->city = $this_city->name;
				}

		/* */
		$return = [

			'page_title' => 'Клиника '.$single->name,
			'rec' => $single,
			'list' => $list,
			'list1' => $list1,

		];

		return view('clinic_info', $return);

	}

}
