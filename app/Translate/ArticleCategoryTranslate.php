<?php

namespace App\Translate;

use App\BaseModel;

class ArticleCategoryTranslate extends BaseModel
{
    public $timestamps = false;

    protected $fillable = ['category_id', 'lang_id', 'title'];
}
