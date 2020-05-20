<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\PatientBellyRequest;
use App\Patient;
use App\PatientBelly;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\View\View;

class PatientBellyController extends Controller
{
    /**
     * @param Request $request
     * @return array|Factory|Application|View|mixed
     */
    public function index(Request $request)
    {
        $patient = Patient::query()->find($request->get('patient_id'));

        return view('admin.patients.bellies.index', [
            'page_title' => 'Замеры живота ' . ($patient ? ("пациента " . $patient->user->name ?? 'имя не указано') : null),
            'patient'    => $patient,
            'search'     => $request->get('search'),
            'items'      => PatientBelly::query()->with(['patient.user'])->filter($request->only(['patient_id']))
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
        return view('admin.patients.bellies.create', ['page_title' => 'Добавление замера живота']);
    }

    /**
     * @param PatientBellyRequest $request
     * @return RedirectResponse
     */
    public function store(PatientBellyRequest $request): RedirectResponse
    {
        PatientBelly::query()->create($request->validated());

        return redirect()->route('admin.patients.bellies.index', $request->only('patient_id'))->with('success', 'Замер живота успешно добавлен!');
    }

    /**
     * @param $id
     * @return array|Factory|Application|View|mixed
     */
    public function edit($id)
    {
        return view('admin.patients.bellies.edit', [
            'page_title' => 'Редактирование замера живота',
            'instance'   => PatientBelly::query()->with(['patient.user'])->findOrFail($id),
        ]);
    }

    /**
     * @param PatientBellyRequest $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(PatientBellyRequest $request, $id): RedirectResponse
    {
        PatientBelly::query()->findOrFail($id)->update($request->validated());

        return back()->with('success', 'Сохранено!');
    }
}
