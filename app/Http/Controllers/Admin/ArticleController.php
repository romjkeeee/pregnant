<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PatientRequest;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ArticleController extends Controller
{
    /**
     * @param Request $request
     * @return array|Factory|Application|View|mixed
     */
    public function index(Request $request)
    {
        return view('admin.articles.index', [
            'page_title' => 'Статьи',
            'search'     => $request->get('search'),
            'items'      => Article::query()->where(function (Builder $article) use ($request) {
                if ($request->get('search')) {
                    $article->where(function (Builder $builder) use ($request) {
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
        return view('admin.articles.create', ['page_title' => 'Добавление статьи']);
    }

    /**
     * @param PatientRequest $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        Article::query()->create($request->validated());

        return redirect()->route('admin.articles.index')->with('success', 'Статья успешно добавлена!');
    }

    /**
     * @param $id
     * @return array|Factory|Application|View|mixed
     */
    public function edit($id)
    {
        return view('admin.articles.edit', [
            'page_title' => 'Редактирование статьи',
            'instance'   => Article::query()->findOrFail($id),
        ]);
    }

    /**
     * @param PatientRequest $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id): RedirectResponse
    {
        Article::query()->findOrFail($id)->update($request->validated());

        return back()->with('success', 'Сохранено!');
    }


}
