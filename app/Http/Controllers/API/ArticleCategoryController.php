<?php

namespace App\Http\Controllers\API;

use App\ArticleCategory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ArticleCategoryController extends Controller
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $data = ArticleCategory::with('articles')->get();
        return response()->json([
            'data' => $data,
            'status' => 'success'
        ], 200);
    }
}
