<?php

namespace App;

use App\Traits\MultiLangTrait;
use App\Translate\RegionTranslate;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Region extends BaseModel
{
    use MultiLangTrait;

    protected $translatedClass = RegionTranslate::class;
    protected $translatedForeignKey = 'region_id';

    public $timestamps = false;
    protected $fillable = ['name'];

    /**
     * @return HasMany
     */

    public function translates(): HasMany
    {
        return $this->hasMany($this->translatedClass, $this->translatedForeignKey);
    }
}
