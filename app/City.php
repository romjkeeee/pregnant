<?php

namespace App;

use App\Traits\MultiLangTrait;
use App\Translate\CityTranslate;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class City extends BaseModel
{
    use MultiLangTrait;

    protected $translatedClass = CityTranslate::class;
    protected $translatedForeignKey = 'city_id';

    protected $fillable = ['region_id'];
    public $timestamps = false;

    /**
     * @return HasOne
     */
    public function region(): HasOne
    {
        return $this->hasOne(Region::class, 'id', 'region_id');
    }

}
