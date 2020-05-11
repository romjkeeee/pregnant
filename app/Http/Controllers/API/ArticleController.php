<?php

namespace App\Http\Controllers\API;

use App\Article;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $data = Article::all();
        return response()->json([
            'data' => $data,
            'status' => 'success'
        ], 200);
    }

    public function show($id)
    {
        $data = Article::where('id','=',$id)->get();
        return response()->json([
            'data' => $data,
            'status' => 'success'
        ], 200);
    }
}
