<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ArticleRequest;
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
            'items'      => Article::query()->when($request->get('search'), function (Builder $article) use ($request) {
                $article->where(function (Builder $builder) use ($request) {
                    $builder->orWhere('name', 'LIKE', "%{$request->get('search')}%");
                });
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
     * @param ArticleRequest $request
     * @return RedirectResponse
     */
    public function store(ArticleRequest $request): RedirectResponse
    {
        /** @var $article Article */
        $article = Article::query()->create($request->validated());
        $article->syncTranslates($request->get('translate'));

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
            'instance'   => Article::query()->with(['translates', 'category'])->findOrFail($id),
        ]);
    }

    /**
     * @param ArticleRequest $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(ArticleRequest $request, $id): RedirectResponse
    {
        /** @var Article $article */
        $article = Article::query()->findOrFail($id);
        $article->update($request->validated());
        $article->syncTranslates($request->get('translate'));

        return back()->with('success', 'Сохранено!');
    }


}
