<?php

namespace App\Http\Controllers\API;

use App\ArticleCategory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * @group Articles Category
 *
 * APIs for
 */
class ArticleCategoryController extends Controller
{
    /**
     * List
     * Список категорий
     *
     * @authenticated required
     * @response 200 {"data":{},"status":"success"}
     */
    public function index()
    {
        $data = ArticleCategory::all();
        return response()->json([
            'data' => $data,
            'status' => 'success'
        ], 200);
    }
}
