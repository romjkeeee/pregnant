<?php

namespace App\Http\Controllers\API;

use App\DurationArticles;
use Illuminate\Routing\Controller;

/**
 * @group Duration
 *
 * APIs for
 */
class DurationArticlesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['']]);
    }

    /**
     * List Duration Articles
     * Список статей по категориям по 20шт
     *
     */
    public function index()
    {
        return \response(DurationArticles::query()->paginate(20));
    }

    /**
     * Show Duration Article
     * просмотр статьи
     *
     */
    public function show($id)
    {
        return \response(DurationArticles::query()->with(['duration'])->findOrFail($id));
    }
}
