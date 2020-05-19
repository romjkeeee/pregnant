<?php

namespace App\Http\Controllers;

use App\DurationArticles;
use Illuminate\Http\Request;

class DurationArticlesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['']]);
    }

    public function index()
    {
        return \response(DurationArticles::query()->paginate(20));
    }

   public function show($id)
   {
       return \response(DurationArticles::query()->with(['duration'])->findOrFail($id));
   }
}
