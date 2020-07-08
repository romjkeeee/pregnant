<?php

namespace App\Http\Controllers\API;

use App\ArticleCategory;
use App\Http\Controllers\Controller;
use App\Http\Resources\Collections\ArticleCategoryCollection;

/**
 * @group Articles
 *
 * APIs for
 */
class ArticleCategoryController extends Controller
{
    /**
     * List category
     * Список категорий статей
     *
     * @response 200
     */
    public function index(): ArticleCategoryCollection
    {
        return ArticleCategoryCollection::make(ArticleCategory::all());
    }
}
