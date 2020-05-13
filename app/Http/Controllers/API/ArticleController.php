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
    public function index()
    {
        $data = ArticleCategory::with('articles')->paginate(15);
        return response()->json([
            'data' => $data,
            'status' => 'success'
        ], 200);
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
        $data = Article::where('id','=',$id)->get();
        return response()->json([
            'data' => $data,
            'status' => 'success'
        ], 200);
    }
}
