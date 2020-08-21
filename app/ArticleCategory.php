<?php

namespace App;

use App\Traits\MultiLangTrait;
use App\Translate\ArticleCategoryTranslate;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ArticleCategory extends BaseModel
{
    use MultiLangTrait;

    protected $translatedClass = ArticleCategoryTranslate::class;
    protected $translatedForeignKey = 'category_id';

    /**
     * @return HasMany
     */
    public function articles()
    {
        return $this->hasOne('App\Translate\ArticleCategoryTranslate', 'category_id');
    }
}
