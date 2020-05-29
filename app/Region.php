<?php

namespace App;

use App\Traits\MultiLangTrait;
use App\Translate\RegionTranslate;

class Region extends BaseModel
{
    use MultiLangTrait;

    protected $translatedClass = RegionTranslate::class;
    protected $translatedForeignKey = 'region_id';

    public $timestamps = false;
    protected $fillable = ['name'];
}
