<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends BaseModel
{
    protected $guarded = ['id'];

    public function article_category()
    {
        return $this->hasOne(ArticleCategory::class,'id','category_id');
    }
}
