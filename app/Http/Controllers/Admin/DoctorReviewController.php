<?php

namespace App\Http\Controllers\Admin;

use App\Doctor;
use App\DoctorReview;
use App\Http\Requests\Admin\DoctorReviewRequest;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\View\View;

class DoctorReviewController extends Controller
{
    /**
     * @param Request $request
     * @return array|Factory|Application|View|mixed
     */
    public function index(Request $request)
    {
        $doctor = Doctor::query()->find($request->get('doctor_id'));

        return view('admin.doctors.reviews.index', [
            'page_title' => 'Отзывы ' . ($doctor ? "про доктора {$doctor->name}" : null),
            'doctor'     => $doctor,
            'search'     => $request->get('search'),
            'items'      => DoctorReview::query()->with(['doctor', 'user'])->filter($request->only(['doctor_id']))
                ->where(function (Builder $builder) use ($request) {
                    if ($request->get('search')) {
                        $builder->where('name', 'LIKE', "%{$request->get('search')}%");
                    }
                })->orderBy('id', 'desc')->paginate(20)
        ]);
    }

    /**
     * @return array|Factory|Application|View|mixed
     */
    public function create()
    {
        return view('admin.doctors.reviews.create', ['page_title' => 'Добавление отзыва']);
    }

    /**
     * @param DoctorReviewRequest $request
     * @return RedirectResponse
     */
    public function store(DoctorReviewRequest $request): RedirectResponse
    {
        DoctorReview::query()->create($request->validated());

        return redirect()->route('admin.doctors.reviews.index', ['doctor_id' => $request->get('clinic_id')])->with('success', 'Отзыв успешно добавлен!');
    }

    /**
     * @param $id
     * @return array|Factory|Application|View|mixed
     */
    public function edit($id)
    {
        return view('admin.doctors.reviews.edit', [
            'page_title' => 'Редактирование отзыва',
            'instance'   => DoctorReview::query()->with(['doctor', 'user'])->findOrFail($id),
        ]);
    }

    /**
     * @param DoctorReviewRequest $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(DoctorReviewRequest $request, $id): RedirectResponse
    {
        DoctorReview::query()->findOrFail($id)->update($request->validated());

        return back()->with('success', 'Сохранено!');
    }
}
