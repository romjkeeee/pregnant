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
            'items'      => Specialization::query()->when($request->get('search'), function (Builder $query) use ($request) {
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
        return view('admin.specialisations.create', ['page_title' => 'Добавление специализации']);
    }

    /**
     * @param SpecialisationRequest $request
     * @return RedirectResponse
     */
    public function store(SpecialisationRequest $request): RedirectResponse
    {
        /** @var Specialization $specialization */
        $specialization = Specialization::query()->create();
        $specialization->syncTranslates($request->get('translate'));
        if ($request->file('photo')) {
            $specialization->photo = 'storage/'.$request->file('photo')->store('spec');
            $specialization->update();
        }
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
        /** @var Specialization $specialization */
        $specialization = Specialization::query()->findOrFail($id);
        $specialization->syncTranslates($request->get('translate'));
        if ($request->file('photo')) {
            $specialization->photo = 'storage/'.$request->file('photo')->store('spec');
            $specialization->update();
        }
        return back()->with('success', 'Сохранено!');
    }
}
