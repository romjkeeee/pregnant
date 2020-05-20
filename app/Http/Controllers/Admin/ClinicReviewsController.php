<?php

namespace App\Http\Controllers\Admin;

use App\Clinic;
use App\ClinicReview;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ClinicReviewRequest;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ClinicReviewsController extends Controller
{
    /**
     * @param Request $request
     * @return array|Factory|Application|View|mixed
     */
    public function index(Request $request)
    {
        $clinic = Clinic::query()->find($request->get('clinic_id'));

        return view('admin.clinics.reviews.index', [
            'page_title' => 'Отзывы ' . ($clinic ? "про клинику {$clinic->name}" : null),
            'clinic'     => $clinic,
            'search'     => $request->get('search'),
            'items'      => ClinicReview::query()->with(['clinic', 'user'])->filter($request->only(['clinic_id']))
                ->where(function (Builder $builder) use ($request) {
                    if ($request->get('search')) {
                        $builder->orWhereHas('user', function (HasOne $one) use ($request) {
                            $one->where('name', 'LIKE', "%{$request->get('search')}%");
                        })->orWhereHas('clinic', function (HasOne $one) use ($request) {
                            $one->where('name', 'LIKE', "%{$request->get('search')}%");
                        })->orWhere('text', 'LIKE', "%{$request->get('search')}%");
                    }
                })->orderBy('id', 'desc')->paginate(20)
        ]);
    }

    /**
     * @return array|Factory|Application|View|mixed
     */
    public function create()
    {
        return view('admin.clinics.reviews.create', ['page_title' => 'Добавление отзыва']);
    }

    /**
     * @param ClinicReviewRequest $request
     * @return RedirectResponse
     */
    public function store(ClinicReviewRequest $request): RedirectResponse
    {
        ClinicReview::query()->create($request->validated());

        return redirect()->route('admin.clinics.reviews.index', ['clinic_id' => $request->get('clinic_id')])->with('success', 'Отзыв успешно добавлен!');
    }

    /**
     * @param $id
     * @return array|Factory|Application|View|mixed
     */
    public function edit($id)
    {
        return view('admin.clinics.reviews.edit', [
            'page_title' => 'Редактирование отзыва',
            'instance'   => ClinicReview::query()->findOrFail($id),
        ]);
    }

    /**
     * @param ClinicReviewRequest $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(ClinicReviewRequest $request, $id): RedirectResponse
    {
        ClinicReview::query()->findOrFail($id)->update($request->validated());

        return back()->with('success', 'Сохранено!');
    }
}
