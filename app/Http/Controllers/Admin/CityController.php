<?php

namespace App\Http\Controllers\Admin;

use App\City;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CityRequest;
use App\Region;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CityController extends Controller
{
    /**
     * @param Request $request
     * @return array|Factory|Application|View|mixed
     */
    public function index(Request $request)
    {
        $region = Region::query()->find(($request->get('region_id')));

        return view('admin.locations.cities.index', [
            'page_title' => 'Города ' . ($region ? "региона {$region->name}" : null),
            'region'     => $region,
            'search'     => $request->get('search'),
            'items'      => City::query()->with('region')->filter($request->only(['region_id']))->where(function (Builder $builder) use ($request) {
                if ($request->get('search')) {
                    $builder->where('name', 'LIKE', "%{$request->get('search')}%");
                }
            })->orderBy('name')->paginate(20)
        ]);
    }

    /**
     * @return array|Factory|Application|View|mixed
     */
    public function create()
    {
        return view('admin.locations.cities.create', ['page_title' => 'Добавление города']);
    }

    /**
     * @param CityRequest $request
     * @return RedirectResponse
     */
    public function store(CityRequest $request): RedirectResponse
    {
        City::query()->create($request->validated());

        return redirect()->route('admin.cities.index', ['region_id' => $request->get('region_id')])->with('success', 'Город успешно добавлен!');
    }

    /**
     * @param $id
     * @return array|Factory|Application|View|mixed
     */
    public function edit($id)
    {
        return view('admin.locations.cities.edit', [
            'page_title' => 'Редактирование города',
            'instance'   => City::query()->findOrFail($id),
        ]);
    }

    /**
     * @param CityRequest $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(CityRequest $request, $id): RedirectResponse
    {
        City::query()->findOrFail($id)->update($request->validated());

        return back()->with('success', 'Сохранено!');
    }
}
