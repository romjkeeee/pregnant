<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TranslateRequest;
use App\Translate;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TranslateController extends Controller
{
    /**
     * @param Request $request
     * @return array|Factory|Application|View|mixed
     */
    public function index(Request $request)
    {
        return view('admin.translates.index', [
            'page_title' => 'Переводы',
            'search'     => $request->get('search'),
            'items'      => Translate::query()->with(['translate'])->where(function (Builder $builder) use ($request) {
                if ($request->get('search')) {
                    $builder->whereHas('translates', function ($query) use ($request) {
                        $query->where('text', 'LIKE', "%{$request->get('search')}%");
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
        return view('admin.translates.create', ['page_title' => 'Добавление перевода']);
    }

    /**
     * @param TranslateRequest $request
     * @return RedirectResponse
     */
    public function store(TranslateRequest $request): RedirectResponse
    {
        /** @var Translate $translate */
        $translate = Translate::query()->create($request->validated());
        $translate->syncTranslates($request->get('translate'));

        return redirect()->route('admin.translates.index')->with('success', 'Перевод успешно добавлен!');
    }

    /**
     * @param $id
     * @return array|Factory|Application|View|mixed
     */
    public function edit($id)
    {
        return view('admin.translates.edit', [
            'page_title' => 'Редактирование перевода',
            'instance'   => Translate::query()->with(['translates'])->findOrFail($id),
        ]);
    }

    /**
     * @param TranslateRequest $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(TranslateRequest $request, $id): RedirectResponse
    {
        /** @var Translate $translate */
        $translate = Translate::query()->findOrFail($id);
        $translate->update($request->validated());
        $translate->syncTranslates($request->get('translate'));

        return back()->with('success', 'Сохранено!');
    }
}
