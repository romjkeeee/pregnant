<?php

namespace App;

use App\Traits\MultiLangTrait;
use App\Traits\StoreImageTrait;
use App\Translate\ArticleTranslate;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Article extends BaseModel
{
    use MultiLangTrait, StoreImageTrait;

    protected $translatedClass = ArticleTranslate::class;
    protected $translatedForeignKey = 'article_id';
    protected $image = ['image', 'preview'];

    protected $guarded = [];

    /**
     * @return HasOne
     */
    public function category(): HasOne
    {
        return $this->hasOne(ArticleCategory::class, 'id', 'category_id');
    }
}
