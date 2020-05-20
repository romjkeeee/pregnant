<?php

namespace App\Http\Controllers\Admin;

use App\Clinic;
use App\ClinicPrice;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ClinicPriceRequest;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ClinicPriceController extends Controller
{
    /**
     * @param Request $request
     * @return array|Factory|Application|View|mixed
     */
    public function index(Request $request)
    {
        $clinic = Clinic::query()->find($request->get('clinic_id'));

        return view('admin.clinics.prices.index', [
            'page_title' => 'Цены ' . ($clinic ? "клиники {$clinic->name}" : null),
            'clinic'     => $clinic,
            'search'     => $request->get('search'),
            'items'      => ClinicPrice::query()->with('clinic')->filter($request->only(['clinic_id']))->where(function (Builder $builder) use ($request) {
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
        return view('admin.clinics.prices.create', ['page_title' => 'Добавление цены']);
    }

    /**
     * @param ClinicPriceRequest $request
     * @return RedirectResponse
     */
    public function store(ClinicPriceRequest $request): RedirectResponse
    {
        ClinicPrice::query()->create($request->validated());

        return redirect()->route('admin.clinics.prices.index', ['clinic_id' => $request->get('clinic_id')])->with('success', 'Цена успешно добавлена!');
    }

    /**
     * @param $id
     * @return array|Factory|Application|View|mixed
     */
    public function edit($id)
    {
        return view('admin.clinics.prices.edit', [
            'page_title' => 'Редактирование цены',
            'instance'   => ClinicPrice::query()->findOrFail($id),
        ]);
    }

    /**
     * @param ClinicPriceRequest $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(ClinicPriceRequest $request, $id): RedirectResponse
    {
        ClinicPrice::query()->findOrFail($id)->update($request->validated());

        return back()->with('success', 'Сохранено!');
    }
}
