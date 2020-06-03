<?php

namespace App\Http\Controllers\Admin;

use App\Clinic;
use App\ClinicDepartment;
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
            'items'      => ClinicPrice::query()->with('clinic')->filter($request->only(['clinic_id']))
                ->when($request->get('search'), function (Builder $query) use ($request) {
                    $query->whereHas('translates', function (Builder $builder) use ($request) {
                        $builder->where('name', 'LIKE', "%{$request->get('search')}%");
                    });
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
        /** @var ClinicPrice $clinic */
        $clinic = ClinicPrice::query()->create($request->validated());
        $clinic->syncTranslates($request->get('translate'));

        return redirect()->route('admin.clinics.prices.index', [
            'clinic_id' => $request->get('clinic_id')
        ])->with('success', 'Цена успешно добавлена!');
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
        /** @var ClinicPrice $clinic */
        $clinic = ClinicPrice::query()->findOrFail($id);
        $clinic->update($request->validated());
        $clinic->syncTranslates($request->get('translate'));

        return back()->with('success', 'Сохранено!');
    }
}
