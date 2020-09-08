<?php

namespace App\Http\Controllers\Admin;

use App\Clinic;
use App\Doctor;
use App\Http\Requests\Admin\ClinicScheduleRequest;
use App\Http\Requests\DoctorScheduleRequest;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\View\View;

class DoctorScheduleController extends Controller
{
    /**
     * @param Request $request
     * @return array|Factory|Application|View|mixed
     */
    public function index(Request $request)
    {
        $doctor = Doctor::query()->find($request->get('doctor_id'));

        return view('admin.doctors.schedules.index', [
            'page_title' => 'График работы ' . ($doctor ? "доктора {$doctor->name}" : null),
            'doctor'     => $doctor,
            'search'     => $request->get('search'),
            'items'      => Doctor::query()->with(['schedules', 'user'])->whereHas('schedules')
                ->where(function (Builder $builder) use ($request) {
                    if ($request->get('search')) {
                        $builder->where(function (Builder $builder) use ($request) {
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
        return view('admin.doctors.schedules.create', ['page_title' => 'Добавление графика']);
    }

    /**
     * @param DoctorScheduleRequest $request
     * @return RedirectResponse
     */
    public function store(DoctorScheduleRequest $request): RedirectResponse
    {
        Doctor::query()->findOrFail($request->get('doctor_id'))->schedules()->createMany($request->validated());

        return redirect()->route('admin.doctors.schedules.index')->with('success', 'График успешно добавлен!');
    }

    /**
     * @param $id
     * @return array|Factory|Application|View|mixed
     */
    public function edit($id)
    {
        return view('admin.doctors.schedules.edit', [
            'page_title' => 'Редактирование графика',
            'instance'   => Doctor::query()->with('schedules')->findOrFail($id),
        ]);
    }

    /**
     * @param ClinicScheduleRequest $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(ClinicScheduleRequest $request, $id): RedirectResponse
    {
        Doctor::query()->findOrFail($id)->schedules()->delete();
        Doctor::query()->findOrFail($id)->schedules()->createMany($request->validated());

        return back()->with('success', 'Сохранено!');
    }
}
