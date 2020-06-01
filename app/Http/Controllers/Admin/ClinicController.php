<?php

namespace App\Http\Controllers\Admin;

use App\Clinic;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ClinicRequest;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ClinicController extends Controller
{
    /**
     * @param Request $request
     * @return array|Factory|Application|View|mixed
     */
    public function index(Request $request)
    {
        return view('admin.clinics.index', [
            'page_title' => 'Клиники',
            'search'     => $request->get('search'),
            'items'      => Clinic::query()->with(['region', 'city', 'departments', 'schedules', 'reviews', 'prices'])
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
        return view('admin.clinics.create', ['page_title' => 'Добавление клиники']);
    }

    /**
     * @param ClinicRequest $request
     * @return RedirectResponse
     */
    public function store(ClinicRequest $request): RedirectResponse
    {
        /** @var Clinic $clinic */
        $clinic = Clinic::query()->create($request->validated());
        $clinic->syncTranslates($request->get('translate'));

        return redirect()->route('admin.clinics.index')->with('success', 'Клиника успешно добавлена!');
    }

    /**
     * @param $id
     * @return array|Factory|Application|View|mixed
     */
    public function edit($id)
    {
        return view('admin.clinics.edit', [
            'page_title' => 'Редактирование клиники',
            'instance'   => Clinic::query()->findOrFail($id),
        ]);
    }

    /**
     * @param ClinicRequest $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(ClinicRequest $request, $id): RedirectResponse
    {
        /** @var Clinic $clinic */
        $clinic = Clinic::query()->findOrFail($id);
        $clinic->update($request->validated());
        $clinic->syncTranslates($request->get('translate'));

        return back()->with('success', 'Сохранено!');
    }


}
