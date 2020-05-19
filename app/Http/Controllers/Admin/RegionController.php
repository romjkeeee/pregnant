<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\RegionRequest;
use App\Lang;
use App\Region;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RegionController extends Controller
{
    /**
     * @param Request $request
     * @return array|Factory|Application|View|mixed
     */
    public function index(Request $request)
    {
        return view('admin.locations.regions.index', [
            'page_title' => 'Регионы',
            'search'     => $request->get('search'),
            'items'      => Region::query()->where(function (Builder $builder) use ($request) {
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
        return view('admin.locations.regions.create', ['page_title' => 'Добавление региона']);
    }

    /**
     * @param RegionRequest $request
     * @return RedirectResponse
     */
    public function store(RegionRequest $request): RedirectResponse
    {
        Region::query()->create($request->validated());

        return redirect()->route('admin.regions.index')->with('success', 'Регион успешно добавлен!');
    }

    /**
     * @param $id
     * @return array|Factory|Application|View|mixed
     */
    public function edit($id)
    {
        return view('admin.locations.regions.edit', [
            'page_title' => 'Редактирование региона',
            'instance'   => Region::query()->findOrFail($id),
        ]);
    }

    /**
     * @param RegionRequest $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(RegionRequest $request, $id): RedirectResponse
    {
        Region::query()->findOrFail($id)->update($request->validated());

        return back()->with('success', 'Сохранено!');
    }
}
