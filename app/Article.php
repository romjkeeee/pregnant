<?php

namespace App;

use App\Interfaces\ModelMultiLangInterface;
use App\Traits\MultiLangTrait;
use App\Translate\ArticleTranslate;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class Article extends BaseModel implements ModelMultiLangInterface
{
    use MultiLangTrait;

    protected $guarded = ['id'];

    /**
     * Article constructor.
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        $this->multiLangInit();
        parent::__construct($attributes);
    }

    /**
     * @return string
     */
    public function getTranslatedClass(): string
    {
        return ArticleTranslate::class;
    }

    /**
     * @return string
     */
    public function getTranslatedForeignKey(): string
    {
        return 'article_id';
    }

    /**
     * @return HasOne
     */
    public function category(): HasOne
    {
        return $this->hasOne(ArticleCategory::class, 'id', 'category_id');
    }

    /**
     * @param UploadedFile|null $image
     */
    public function setImageAttribute(UploadedFile $image = null)
    {
        if ($image) {
            if (isset($this->attributes['image']) && Storage::disk('publicUpload')->exists($this->attributes['image'])) {
                Storage::disk('publicUpload')->delete($this->attributes['image']);
            }
            $this->attributes['image'] = Storage::disk('publicUpload')->put('images/articles/images', $image);
        }
    }

    /**
     * @param UploadedFile|null $image
     */
    public function setPreviewAttribute(UploadedFile $image = null)
    {
        if ($image) {
            if (isset($this->attributes['preview']) && Storage::disk('publicUpload')->exists($this->attributes['preview'])) {
                Storage::disk('publicUpload')->delete($this->attributes['preview']);
            }
            $this->attributes['preview'] = Storage::disk('publicUpload')->put('images/articles/previews', $image);
        }
    }
}
