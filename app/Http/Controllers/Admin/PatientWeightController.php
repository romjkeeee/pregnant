<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\PatientWeightRequest;
use App\Patient;
use App\PatientWeight;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\View\View;

class PatientWeightController extends Controller
{
    /**
     * @param Request $request
     * @return array|Factory|Application|View|mixed
     */
    public function index(Request $request)
    {
        $patient = Patient::query()->find($request->get('patient_id'));

        return view('admin.patients.weights.index', [
            'page_title' => 'Замеры веса ' . ($patient ? ("пациента " . $patient->user->name ?? 'имя не указано') : null),
            'patient'    => $patient,
            'search'     => $request->get('search'),
            'items'      => PatientWeight::query()->with(['patient.user'])->filter($request->only(['patient_id']))
                ->where(function (Builder $builder) use ($request) {
                    if ($request->get('search')) {
                        $builder->whereHas('patient.user', function (HasOne $one) use ($request) {
                            $one->where('name', 'LIKE', "%{$request->get('search')}%");
                        });
                    }
                })->orderBy('date', 'desc')->paginate(20)
        ]);
    }

    /**
     * @return array|Factory|Application|View|mixed
     */
    public function create()
    {
        return view('admin.patients.weights.create', ['page_title' => 'Добавление замера веса']);
    }

    /**
     * @param PatientWeightRequest $request
     * @return RedirectResponse
     */
    public function store(PatientWeightRequest $request): RedirectResponse
    {
        PatientWeight::query()->create($request->validated());

        return redirect()->route('admin.patients.weights.index', $request->only('patient_id'))->with('success', 'Замер живота успешно добавлен!');
    }

    /**
     * @param $id
     * @return array|Factory|Application|View|mixed
     */
    public function edit($id)
    {
        return view('admin.patients.weights.edit', [
            'page_title' => 'Редактирование замера веса',
            'instance'   => PatientWeight::query()->with(['patient.user'])->findOrFail($id),
        ]);
    }

    /**
     * @param PatientWeightRequest $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(PatientWeightRequest $request, $id): RedirectResponse
    {
        PatientWeight::query()->findOrFail($id)->update($request->validated());

        return back()->with('success', 'Сохранено!');
    }
}
