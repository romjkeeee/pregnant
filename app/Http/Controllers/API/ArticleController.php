<?php

namespace App\Http\Controllers\API;

use App\Article;
use App\Http\Controllers\Controller;

use App\Http\Resources\Collections\ArticleCollection;
use Illuminate\Http\Request;

/**
 * @group Articles
 *
 * APIs for
 */
class ArticleController extends Controller
{
    /**
     * List
     * Список статей по категориям
     *
     * @authenticated required
     * @response 200
     * @param Request $request
     * @return ArticleCollection
     */
    public function index(Request $request)
    {
        return ArticleCollection::make(Article::query()
            ->filter($request->only('category_id'))
            ->paginate($request->get('perPage') ?? 10));
    }

    /**
     * Show
     * Показать конкретную статью
     *
     * @authenticated required
     * @response 200
     */
    public function show($id)
    {
        return response(Article::query()->where('id', $id)->get());
    }
}
