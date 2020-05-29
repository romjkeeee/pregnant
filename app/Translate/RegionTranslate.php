<?php

namespace App\Translate;

use App\BaseModel;

class RegionTranslate extends BaseModel
{
    public $timestamps = false;

    protected $fillable = ['lang_id', 'region_id', 'name'];
}
