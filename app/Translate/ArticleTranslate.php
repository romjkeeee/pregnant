<?php

namespace App\Translate;

use Illuminate\Database\Eloquent\Model;

class ArticleTranslate extends Model
{
    public $timestamps = false;

    protected $fillable = ['lang_id', 'article_id', 'title', 'text'];
}
