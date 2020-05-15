<?php

namespace App\Http\Controllers\Admin;

use App\ArticleCategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ArticleCategoryRequest;
use App\Http\Requests\Admin\PatientRequest;
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
            'items'      => ArticleCategory::query()->where(function (Builder $article) use ($request) {
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
        return view('admin.article-category.create', ['page_title' => 'Добавление категории']);
    }

    /**
     * @param PatientRequest $request
     * @return RedirectResponse
     */
    public function store(ArticleCategoryRequest $request): RedirectResponse
    {
        ArticleCategory::query()->create($request->validated());

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
     * @param PatientRequest $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(ArticleCategoryRequest $request, $id): RedirectResponse
    {
        ArticleCategory::query()->findOrFail($id)->update($request->validated());

        return back()->with('success', 'Сохранено!');
    }


}
