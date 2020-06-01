<?php

namespace App\Http\Controllers\Admin;

use App\ArticleCategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ArticleCategoryRequest;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ArticleCategoryController extends Controller
{
    /**
     * @param Request $request
     * @return array|Factory|Application|View|mixed
     */
    public function index(Request $request)
    {
        return view('admin.article-category.index', [
            'page_title' => 'Статьи',
            'search'     => $request->get('search'),
            'items'      => ArticleCategory::query()->with('translate')->when($request->get('search'), function (Builder $query) use ($request) {
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
        return view('admin.article-category.create', ['page_title' => 'Добавление категории']);
    }

    /**
     * @param ArticleCategoryRequest $request
     * @return RedirectResponse
     */
    public function store(ArticleCategoryRequest $request): RedirectResponse
    {
        /** @var $category ArticleCategory */
        $category = ArticleCategory::query()->create($request->validated());
        $category->syncTranslates($request->get('translate'));

        return redirect()->route('admin.article-category.index')->with('success', 'Категория успешно добавлена!');
    }

    /**
     * @param $id
     * @return array|Factory|Application|View|mixed
     */
    public function edit($id)
    {
        return view('admin.article-category.edit', [
            'page_title' => 'Редактирование статьи',
            'instance'   => ArticleCategory::query()->findOrFail($id),
        ]);
    }

    /**
     * @param ArticleCategoryRequest $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(ArticleCategoryRequest $request, $id): RedirectResponse
    {
        /** @var $category ArticleCategory */
        $category = ArticleCategory::query()->findOrFail($id);
        $category->update($request->validated());
        $category->syncTranslates($request->get('translate'));

        return back()->with('success', 'Сохранено!');
    }


}
