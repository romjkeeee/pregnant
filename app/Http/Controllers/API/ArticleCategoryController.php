<?php

namespace App\Http\Controllers\API;

use App\ArticleCategory;
use App\Http\Controllers\Controller;
use App\Http\Resources\Collections\ArticleCategoryCollection;

class ArticleCategoryController extends Controller
{
    /**
     * @return ArticleCategoryCollection
     */
    public function index(): ArticleCategoryCollection
    {
        return ArticleCategoryCollection::make(ArticleCategory::all());
    }
}
