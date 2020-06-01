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
        return view('admin.check-lists.tasks.index', [
            'page_title' => 'Таски чек листов',
            'search'     => $request->get('search'),
            'list'       => CheckList::query()->find($request->get('list_id')),
            'items'      => CheckListTask::query()->with(['list'])->filter($request->only('list_id'))
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
        return view('admin.check-lists.tasks.create', ['page_title' => 'Добавление таска чек листа']);
    }

    /**
     * @param CheckListTaskRequest $request
     * @return RedirectResponse
     */
    public function store(CheckListTaskRequest $request): RedirectResponse
    {
        /** @var CheckListTask $task */
        $task = CheckListTask::query()->create($request->validated());
        $task->syncTranslates($request->get('translate'));

        return redirect()->route('admin.check-lists.tasks.index', $request->only(['list_id']))->with('success', 'Таск успешно добавлен!');
    }

    /**
     * @param $id
     * @return array|Factory|Application|View|mixed
     */
    public function edit($id)
    {
        return view('admin.check-lists.tasks.edit', [
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
        /** @var CheckListTask $task */
        $task = CheckListTask::query()->findOrFail($id);
        $task->update($request->validated());
        $task->syncTranslates($request->get('translate'));

        return back()->with('success', 'Сохранено!');
    }


}
