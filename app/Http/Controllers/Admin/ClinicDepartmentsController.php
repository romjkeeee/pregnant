<?php

namespace App\Http\Controllers\Admin;

use App\Clinic;
use App\ClinicDepartment;
use App\Http\Controllers\Controller;
use App\Http\Requests\admin\ClinicDepartmentsRequest;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ClinicDepartmentsController extends Controller
{
    /**
     * @param Request $request
     * @return array|Factory|Application|View|mixed
     */
    public function index(Request $request)
    {
        $clinic = Clinic::query()->find($request->get('clinic_id'));

        return view('admin.clinics.departments.index', [
            'page_title' => 'Отделения',
            'clinic'     => $clinic,
            'search'     => $request->get('search'),
            'items'      => ClinicDepartment::query()->with(['clinic'])->filter($request->only('clinic_id'))
                ->where(function (Builder $clinicDepartments) use ($request) {
                    if ($request->get('search')) {
                        $clinicDepartments->where(function (Builder $builder) use ($request) {
                            $builder->orWhere('name', 'LIKE', "%{$request->get('search')}%");
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
        return view('admin.clinics.departments.create', ['page_title' => 'Добавление отделения']);
    }

    /**
     * @param ClinicDepartmentsRequest $request
     * @return RedirectResponse
     */
    public function store(ClinicDepartmentsRequest $request): RedirectResponse
    {
        ClinicDepartment::query()->create($request->validated());

        return redirect()->route('admin.clinics.departments.index', $request->only(['clinic_id']))->with('success', 'Отделение успешно добавлен!');
    }

    /**
     * @param $id
     * @return array|Factory|Application|View|mixed
     */
    public function edit($id)
    {
        return view('admin.clinics.departments.edit', [
            'page_title' => 'Редактирование отделения',
            'instance'   => ClinicDepartment::query()->findOrFail($id),
        ]);
    }

    /**
     * @param ClinicDepartmentsRequest $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(ClinicDepartmentsRequest $request, $id): RedirectResponse
    {
        ClinicDepartment::query()->findOrFail($id)->update($request->validated());

        return back()->with('success', 'Сохранено!');
    }


}
