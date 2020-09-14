<?php

namespace App\Http\Controllers\Admin;

use App\District;
use App\Http\Requests\Admin\RegionRequest;
use App\Http\Requests\DistrictRequest;
use App\Region;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\View\View;

class DistrictController extends Controller
{
    /**
     * @param Request $request
     * @return array|Factory|Application|View|mixed
     */
    public function index(Request $request)
    {
        return view('admin.locations.districs.index', [
            'page_title' => 'Районы',
            'search'     => $request->get('search'),
            'items'      => District::query()->where(function (Builder $builder) use ($request) {
                if ($request->get('search')) {
                    $builder->whereHas('translates', function ($query) use ($request) {
                        $query->where('name', 'LIKE', "%{$request->get('search')}%");
                    });
                }
            })->orderBy('id')->paginate(20)
        ]);
    }

    /**
     * @return array|Factory|Application|View|mixed
     */
    public function create()
    {
        return view('admin.locations.districs.create', ['page_title' => 'Добавление района']);
    }

    /**
     * @param DistrictRequest $request
     * @return RedirectResponse
     */
    public function store(DistrictRequest $request): RedirectResponse
    {
        /** @var Region $region */
        $region = District::query()->create($request->validated());
        $region->syncTranslates($request->get('translate'));

        return redirect()->route('admin.districs.index')->with('success', 'Район успешно добавлен!');
    }

    /**
     * @param $id
     * @return array|Factory|Application|View|mixed
     */
    public function edit($id)
    {
        return view('admin.locations.districs.edit', [
            'page_title' => 'Редактирование района',
            'instance'   => District::query()->findOrFail($id),
        ]);
    }

    /**
     * @param DistrictRequest $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(DistrictRequest $request, $id): RedirectResponse
    {
        /** @var Region $region */
        $region = District::query()->findOrFail($id);
        $region->update($request->validated());
        $region->syncTranslates($request->get('translate'));

        return back()->with('success', 'Сохранено!');
    }
}
