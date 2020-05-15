<?php

namespace App\Http\Controllers\Admin;

use App\Clinic;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ClinicRequest;
use App\Http\Requests\Admin\PatientRequest;
use App\Patient;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ClinicController extends Controller
{
    /**
     * @param Request $request
     * @return array|Factory|Application|View|mixed
     */
    public function index(Request $request)
    {
        return view('admin.clinics.index', [
            'page_title' => 'Клиники',
            'search'     => $request->get('search'),
            'items'      => Clinic::query()->with(['region', 'city', 'departments', 'schedules', 'reviews', 'prices'])
                ->where(function (Builder $clinic) use ($request) {
                    if ($request->get('search')) {
                        $clinic->where(function (Builder $builder) use ($request) {
                            $builder->orWhere('name', 'LIKE', "%{$request->get('search')}%")
                                ->orWhere('phone', 'LIKE', "%{$request->get('search')}%");
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
        return view('admin.clinics.create', ['page_title' => 'Добавление клиники']);
    }

    /**
     * @param ClinicRequest $request
     * @return RedirectResponse
     */
    public function store(ClinicRequest $request): RedirectResponse
    {
        Clinic::query()->create($request->validated());

        return redirect()->route('admin.clinics.index')->with('success', 'Клиника успешно добавлена!');
    }

    /**
     * @param $id
     * @return array|Factory|Application|View|mixed
     */
    public function edit($id)
    {
        return view('admin.clinics.edit', [
            'page_title' => 'Редактирование клиники',
            'instance'   => Clinic::query()->findOrFail($id),
        ]);
    }

    /**
     * @param ClinicRequest $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(ClinicRequest $request, $id): RedirectResponse
    {
        Clinic::query()->findOrFail($id)->update($request->validated());

        return back()->with('success', 'Сохранено!');
    }


}
