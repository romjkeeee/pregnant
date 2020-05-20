<?php

namespace App\Http\Controllers\Admin;

use App\Clinic;
use App\ClinicPrice;
use App\ClinicSchedule;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CityRequest;
use App\Http\Requests\Admin\ClinicPriceRequest;
use App\Http\Requests\Admin\ClinicScheduleRequest;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ClinicScheduleController extends Controller
{
    /**
     * @param Request $request
     * @return array|Factory|Application|View|mixed
     */
    public function index(Request $request)
    {
        $clinic = Clinic::query()->find($request->get('clinic_id'));

        return view('admin.clinics.schedules.index', [
            'page_title' => 'График работы ' . ($clinic ? "клиники {$clinic->name}" : null),
            'clinic'     => $clinic,
            'search'     => $request->get('search'),
            'items'      => Clinic::query()->with(['schedules'])->whereHas('schedules')
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
        return view('admin.clinics.schedules.create', ['page_title' => 'Добавление графика']);
    }

    /**
     * @param ClinicScheduleRequest $request
     * @return RedirectResponse
     */
    public function store(ClinicScheduleRequest $request): RedirectResponse
    {
        Clinic::query()->findOrFail($request->get('clinic_id'))->schedules()->createMany($request->validated());

        return redirect()->route('admin.schedules.index')->with('success', 'График успешно добавлен!');
    }

    /**
     * @param $id
     * @return array|Factory|Application|View|mixed
     */
    public function edit($id)
    {
        return view('admin.clinics.schedules.edit', [
            'page_title' => 'Редактирование графика',
            'instance'   => Clinic::query()->with('schedules')->findOrFail($id),
        ]);
    }

    /**
     * @param ClinicScheduleRequest $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(ClinicScheduleRequest $request, $id): RedirectResponse
    {
        Clinic::query()->findOrFail($id)->schedules()->delete();
        Clinic::query()->findOrFail($id)->schedules()->createMany($request->validated());

        return back()->with('success', 'Сохранено!');
    }
}
