<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\PatientContractionRequest;
use App\Patient;
use App\PatientContraction;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\View\View;

class PatientContractionController extends Controller
{
    /**
     * @param Request $request
     * @return array|Factory|Application|View|mixed
     */
    public function index(Request $request)
    {
        $patient = Patient::query()->find($request->get('patient_id'));

        return view('admin.patients.contractions.index', [
            'page_title' => 'Счетчик схваток ' . ($patient ? ("пациента " . $patient->user->fullName ?? 'имя не указано') : null),
            'patient'    => $patient,
            'search'     => $request->get('search'),
            'items'      => PatientContraction::query()->with(['patient.user'])->filter($request->only(['patient_id']))
                ->where(function (Builder $builder) use ($request) {
                    if ($request->get('search')) {
                        $builder->whereHas('patient.user', function (HasOne $one) use ($request) {
                            $one->where('name', 'LIKE', "%{$request->get('search')}%");
                        });
                    }
                })->orderBy('start', 'desc')->paginate(20)
        ]);
    }

    /**
     * @return array|Factory|Application|View|mixed
     */
    public function create()
    {
        return view('admin.patients.contractions.create', ['page_title' => 'Добавление счетчика схваток']);
    }

    /**
     * @param PatientContractionRequest $request
     * @return RedirectResponse
     */
    public function store(PatientContractionRequest $request): RedirectResponse
    {
        PatientContraction::query()->create($request->validated());

        return redirect()->route('admin.patients.contractions.index', $request->only('patient_id'))->with('success', 'Счетчик схваток успешно добавлен!');
    }

    /**
     * @param $id
     * @return array|Factory|Application|View|mixed
     */
    public function edit($id)
    {
        return view('admin.patients.contractions.edit', [
            'page_title' => 'Редактирование счетчика схваток',
            'instance'   => PatientContraction::query()->with(['patient.user'])->findOrFail($id),
        ]);
    }

    /**
     * @param PatientContractionRequest $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(PatientContractionRequest $request, $id): RedirectResponse
    {
        PatientContraction::query()->findOrFail($id)->update($request->validated());

        return back()->with('success', 'Сохранено!');
    }
}
