<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\PatientBellyRequest;
use App\Http\Requests\Admin\SpecialisationRequest;
use App\Specialization;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\View\View;

class SpecialisationController extends Controller
{
    /**
     * @param Request $request
     * @return array|Factory|Application|View|mixed
     */
    public function index(Request $request)
    {
        return view('admin.specialisations.index', [
            'page_title' => 'Специализация',
            'search'     => $request->get('search'),
            'items'      => Specialization::query()
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
        return view('admin.specialisations.create', ['page_title' => 'Добавление специализации']);
    }

    /**
     * @param SpecialisationRequest $request
     * @return RedirectResponse
     */
    public function store(SpecialisationRequest $request): RedirectResponse
    {
        Specialization::query()->create($request->validated());

        return redirect()->route('admin.specialisations.index')->with('success', 'Специализация успешно добавлена!');
    }

    /**
     * @param $id
     * @return array|Factory|Application|View|mixed
     */
    public function edit($id)
    {
        return view('admin.specialisations.edit', [
            'page_title' => 'Редактирование специализации',
            'instance'   => Specialization::query()->findOrFail($id),
        ]);
    }

    /**
     * @param SpecialisationRequest $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(SpecialisationRequest $request, $id): RedirectResponse
    {
        Specialization::query()->findOrFail($id)->update($request->validated());

        return back()->with('success', 'Сохранено!');
    }
}
