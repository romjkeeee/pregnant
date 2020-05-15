<?php

namespace App\Http\Controllers\Admin;

use App\ClinicDepartment;
use App\Http\Controllers\Controller;
use App\Http\Requests\admin\ClinicDepartmentsRequest;
use App\Http\Requests\Admin\ClinicRequest;
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
        return view('admin.clinics-departments.index', [
            'page_title' => 'Департаменты',
            'search'     => $request->get('search'),
            'items'      => ClinicDepartment::query()->where(function (Builder $clinicDepartments) use ($request) {
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
        return view('admin.clinics-departments.create', ['page_title' => 'Добавление департамента']);
    }

    /**
     * @param ClinicRequest $request
     * @return RedirectResponse
     */
    public function store(ClinicDepartmentsRequest $request): RedirectResponse
    {
        ClinicDepartment::query()->create($request->validated());

        return redirect()->route('admin.clinics-departments.index')->with('success', 'Депортамент успешно добавлен!');
    }

    /**
     * @param $id
     * @return array|Factory|Application|View|mixed
     */
    public function edit($id)
    {
        return view('admin.clinics-departments.edit', [
            'page_title' => 'Редактирование департмаента',
            'instance'   => ClinicDepartment::query()->findOrFail($id),
        ]);
    }

    /**
     * @param ClinicRequest $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(ClinicDepartmentsRequest $request, $id): RedirectResponse
    {
        ClinicDepartment::query()->findOrFail($id)->update($request->validated());

        return back()->with('success', 'Сохранено!');
    }


}
