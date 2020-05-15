<?php

namespace App\Http\Controllers\Admin;

use App\CheckList;
use App\Http\Requests\Admin\CheckListRequest;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CheckListController extends Controller
{
    /**
     * @param Request $request
     * @return array|Factory|Application|View|mixed
     */
    public function index(Request $request)
    {
        return view('admin.check-lists.index', [
            'page_title' => 'Чек листы',
            'search'     => $request->get('search'),
            'items'      => CheckList::query()->with(['tasks'])->where(function (Builder $builder) use ($request) {
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
        return view('admin.check-lists.create', ['page_title' => 'Добавление группы']);
    }

    /**
     * @param CheckListRequest $request
     * @return RedirectResponse
     */
    public function store(CheckListRequest $request): RedirectResponse
    {
        CheckList::query()->create($request->validated());

        return redirect()->route('admin.check-lists.index')->with('success', 'Группа успешно добавлена!');
    }

    /**
     * @param $id
     * @return array|Factory|Application|View|mixed
     */
    public function edit($id)
    {
        return view('admin.check-lists.edit', [
            'page_title' => 'Редактирование группы',
            'instance'   => CheckList::query()->findOrFail($id),
        ]);
    }

    /**
     * @param CheckListRequest $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(CheckListRequest $request, $id): RedirectResponse
    {
        CheckList::query()->findOrFail($id)->update($request->validated());

        return back()->with('success', 'Сохранено!');
    }


}
