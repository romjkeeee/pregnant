<?php

namespace App\Http\Controllers\Admin;

use App\EmergencyContact;
use App\Http\Requests\Admin\PatientEmergencyContactRequest;
use App\Patient;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\View\View;

class PatientEmergencyContactController extends Controller
{
    /**
     * @param Request $request
     * @return array|Factory|Application|View|mixed
     */
    public function index(Request $request)
    {
        $patient = Patient::query()->find($request->get('patient_id'));

        return view('admin.patients.emergency-contacts.index', [
            'page_title' => 'Екстренные контакты ' . ($patient ? ("пациента " . $patient->user->name ?? 'имя не указано') : null),
            'patient'    => $patient,
            'search'     => $request->get('search'),
            'items'      => EmergencyContact::query()->with(['patient.user'])->filter($request->only(['patient_id']))
                ->where(function (Builder $builder) use ($request) {
                    if ($request->get('search')) {
                        $builder->whereHas('patient.user', function (HasOne $one) use ($request) {
                            $one->where('name', 'LIKE', "%{$request->get('search')}%");
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
        return view('admin.patients.emergency-contacts.create', ['page_title' => 'Добавление екстеренного контакта']);
    }

    /**
     * @param PatientEmergencyContactRequest $request
     * @return RedirectResponse
     */
    public function store(PatientEmergencyContactRequest $request): RedirectResponse
    {
        EmergencyContact::query()->create($request->validated());

        return redirect()->route('admin.patients.emergency-contacts.index', $request->only('patient_id'))->with('success', 'Екстренный контакт успешно добавлен!');
    }

    /**
     * @param $id
     * @return array|Factory|Application|View|mixed
     */
    public function edit($id)
    {
        return view('admin.patients.emergency-contacts.edit', [
            'page_title' => 'Редактирование контатка',
            'instance'   => EmergencyContact::query()->with(['patient.user'])->findOrFail($id),
        ]);
    }

    /**
     * @param PatientEmergencyContactRequest $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(PatientEmergencyContactRequest $request, $id): RedirectResponse
    {
        EmergencyContact::query()->findOrFail($id)->update($request->validated());

        return back()->with('success', 'Сохранено!');
    }
}
