<?php

namespace App\Http\Controllers\Admin;

use App\Doctor;
use App\DoctorEducation;
use App\DoctorReview;
use App\Http\Requests\Admin\DoctorEducationRequest;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\View\View;

class DoctorEducationController extends Controller
{
    /**
     * @param Request $request
     * @return array|Factory|Application|View|mixed
     */
    public function index(Request $request)
    {
        $doctor = Doctor::query()->find($request->get('doctor_id'));

        return view('admin.doctors.educations.index', [
            'page_title' => 'Образование ' . ($doctor ? " доктора {$doctor->name}" : null),
            'doctor'     => $doctor,
            'search'     => $request->get('search'),
            'items'      => DoctorEducation::query()->with(['doctor'])->filter($request->only(['doctor_id']))
                ->where(function (Builder $builder) use ($request) {
                    if ($request->get('search')) {
                        $builder->where('title', 'LIKE', "%{$request->get('search')}%");
                        $builder->where('description', 'LIKE', "%{$request->get('search')}%");
                    }
                })->orderBy('id', 'desc')->paginate(20)
        ]);
    }

    /**
     * @return array|Factory|Application|View|mixed
     */
    public function create()
    {
        return view('admin.doctors.educations.create', ['page_title' => 'Добавление образования']);
    }

    /**
     * @param DoctorEducationRequest $request
     * @return RedirectResponse
     */
    public function store(DoctorEducationRequest $request): RedirectResponse
    {
        /** @var DoctorEducation $education */
        $education = DoctorEducation::query()->create($request->validated());
        $education->syncTranslates($request->get('translate'));

        return redirect()->route('admin.doctors.educations.index', [
            'doctor_id' => $request->get('doctor_id')
        ])->with('success', 'Образование успешно добавлено!');
    }

    /**
     * @param $id
     * @return array|Factory|Application|View|mixed
     */
    public function edit($id)
    {
        return view('admin.doctors.educations.edit', [
            'page_title' => 'Редактирование образования',
            'instance'   => DoctorEducation::query()->with('translate')->findOrFail($id),
        ]);
    }

    /**
     * @param DoctorEducationRequest $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(DoctorEducationRequest $request, $id): RedirectResponse
    {
        /** @var DoctorEducation $education */
        $education = DoctorEducation::query()->findOrFail($id);
        $education->update($request->validated());
        $education->syncTranslates($request->get('translate'));

        return back()->with('success', 'Сохранено!');
    }
}
