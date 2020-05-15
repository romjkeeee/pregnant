<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ClinicRequest;
use App\Http\Requests\LangAdminRequest;
use App\Lang;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class LangController extends Controller
{
    /**
     * @param Request $request
     * @return array|Factory|Application|View|mixed
     */
    public function index(Request $request)
    {
        return view('admin.langs.index', [
            'page_title' => 'Языки',
            'search'     => $request->get('search'),
            'items'      => Lang::query()->where(function (Builder $lang) use ($request) {
                    if ($request->get('search')) {
                        $lang->where(function (Builder $builder) use ($request) {
                            $builder->orWhere('name', 'LIKE', "%{$request->get('search')}%");
                        });
                    }
                })->orderBy('id', 'desc')->paginate(20)
        ]);
    }

    /**
     * @return array|Factory|Application|View|mixed
     */
    public function create()
    {
        return view('admin.langs.create', ['page_title' => 'Добавление языка']);
    }

    /**
     * @param ClinicRequest $request
     * @return RedirectResponse
     */
    public function store(LangAdminRequest $request): RedirectResponse
    {
        Lang::query()->create($request->validated());
        return redirect()->route('admin.langs.index')->with('success', 'Язые успешно добавлен!');
    }

    /**
     * @param $id
     * @return array|Factory|Application|View|mixed
     */
    public function edit($id)
    {
        return view('admin.langs.edit', [
            'page_title' => 'Редактирование языка',
            'instance'   => Lang::query()->findOrFail($id),
        ]);
    }

    /**
     * @param ClinicRequest $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(LangAdminRequest $request, $id): RedirectResponse
    {
        Lang::query()->findOrFail($id)->update($request->validated());

        return back()->with('success', 'Сохранено!');
    }
}
