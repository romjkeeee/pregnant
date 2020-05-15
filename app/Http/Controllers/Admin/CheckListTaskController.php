<?php

namespace App\Http\Controllers\Admin;

use App\CheckList;
use App\CheckListTask;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CheckListTaskRequest;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CheckListTaskController extends Controller
{
    /**
     * @param Request $request
     * @return array|Factory|Application|View|mixed
     */
    public function index(Request $request)
    {
        return view('admin.check-list-tasks.index', [
            'page_title' => 'Таски чек листов',
            'search'     => $request->get('search'),
            'list'       => CheckList::query()->find($request->get('list_id')),
            'items'      => CheckListTask::query()->with(['list'])->filter($request->only('list_id'))
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
        return view('admin.check-list-tasks.create', ['page_title' => 'Добавление таска чек листа']);
    }

    /**
     * @param CheckListTaskRequest $request
     * @return RedirectResponse
     */
    public function store(CheckListTaskRequest $request): RedirectResponse
    {
        CheckListTask::query()->create($request->validated());

        return redirect()->route('admin.check-list-tasks.index')->with('success', 'Группа успешно добавлена!');
    }

    /**
     * @param $id
     * @return array|Factory|Application|View|mixed
     */
    public function edit($id)
    {
        return view('admin.check-list-tasks.edit', [
            'page_title' => 'Редактирование таска чек листа',
            'instance'   => CheckListTask::query()->findOrFail($id),
        ]);
    }

    /**
     * @param CheckListTaskRequest $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(CheckListTaskRequest $request, $id): RedirectResponse
    {
        CheckListTask::query()->findOrFail($id)->update($request->validated());

        return back()->with('success', 'Сохранено!');
    }


}
