<?php

namespace App\Translate;

use App\BaseModel;

class CityTranslate extends BaseModel
{
    public $timestamps = false;

    protected $fillable = ['lang_id', 'city_id', 'name'];
}
