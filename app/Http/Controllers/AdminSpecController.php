<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

use App\Specialization;
use App\Doctor;

class AdminSpecController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index(Request $request) {

		$list = Specialization::orderBy('id', 'desc')->get();
		$doct = Doctor::get();

		if ($list->count()) {
			foreach ($list as $rec) {

				/* Кол-во врачей */
				$rec->count = 0;

				foreach ($doct as $doc) {

					$this_spec = json_decode($doc->specialization, true);
					if (in_array($rec->id, $this_spec)) {
						$rec->count++;
					}

				}

			}
		}

		/* */
		$return = [

			'page_title' => 'Список специализаций',
			'list' => $list,

		];

        return view('spec', $return);

    }

	public function add(Request $request) {

		$rec = [

			'name' => '',
			'photo' => null,

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

			/* Заливка фото */
			$photo = null;
			if ($request->file('photo')) {
				$photo = $request->file('photo')->store('spec/'.$request->input('token'), 'spec');
			}

			/* */
			$new = new Specialization;

			$new->name = $request->input('name');
			$new->photo = $photo;

			$new->save();

			return redirect('/admin/spec')->with('success', 'Специализация добавлена');

		}

		/* */
		$return = [

			'page_title' => 'Добавить специализацию',
			'rec' => (object)$rec,

		];

		return view('spec_form', $return);

	}

	public function edit($id, Request $request) {

		$rec = Specialization::find($id);
		if (!$rec) {
			return redirect('/admin/spec')->with('error', 'Специализация не найдена!');
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

			/* Заливка фото */
			$photo = null;
			if ($request->file('photo')) {
				$photo = $request->file('photo')->store('spec/'.$request->input('token'), 'spec');
			}

			/* */
			$new = $rec;

			$new->name = $request->input('name');
			$new->photo = $photo;

			$new->save();

			return redirect('/admin/spec')->with('success', 'Специализация обновлена');

		}

		/* */
		$return = [

			'page_title' => 'Редактировать специализацию',
			'rec' => $rec,
			'id' => $id,

		];

		return view('spec_form', $return);

	}

}
