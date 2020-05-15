<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PatientRequest;
use App\Patient;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PatientController extends Controller
{
    /**
     * @param Request $request
     * @return array|Factory|Application|View|mixed
     */
    public function index(Request $request)
    {
        return view('admin.patients.index', [
            'page_title' => 'Пациенты',
            'search'     => $request->get('search'),
            'items'      => Patient::query()->with(['user', 'clinic', 'doctor'])->where(function (Builder $doctor) use ($request) {
                if ($request->get('search')) {
                    $doctor->whereHas('user', function (Builder $user) use ($request) {
                        $user->where(function (Builder $builder) use ($request) {
                            $builder->orWhere('name', 'LIKE', "%{$request->get('search')}%")
                                ->orWhere('phone', 'LIKE', "%{$request->get('search')}%");
                        });
                    });
                }
            })->orderBy('id', 'desc')->paginate(20)
        ]);
    }

    /**
     * @return array|Factory|Application|View|mixed
     */
    public function create()
    {
        return view('admin.patients.create', ['page_title' => 'Добавление пациента']);
    }

    /**
     * @param PatientRequest $request
     * @return RedirectResponse
     */
    public function store(PatientRequest $request): RedirectResponse
    {
        Patient::query()->create($request->validated());

        return redirect()->route('admin.patients.index')->with('success', 'Пациент успешно добавлен!');
    }

    /**
     * @param $id
     * @return array|Factory|Application|View|mixed
     */
    public function edit($id)
    {
        return view('admin.patients.edit', [
            'page_title' => 'Редактирование пациента',
            'instance'   => Patient::query()->findOrFail($id),
        ]);
    }

    /**
     * @param PatientRequest $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(PatientRequest $request, $id): RedirectResponse
    {
        Patient::query()->findOrFail($id)->update($request->validated());

        return back()->with('success', 'Сохранено!');
    }


}
