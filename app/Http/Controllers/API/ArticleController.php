<?php

namespace App\Http\Controllers\API;

use App\Article;
use App\ArticleCategory;
use App\Http\Controllers\Controller;
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
     */
    public function index(Request $request)
    {
        return response(Article::with('article_category')->filter($request->only('region_id'))->paginate(15));
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
        return response(Article::where('id',$id)->get());
    }
}
