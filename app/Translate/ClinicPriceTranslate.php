<?php

namespace App\Translate;

use App\BaseModel;

class ClinicPriceTranslate extends BaseModel
{
    public $timestamps = false;
    protected $fillable = ['lang_id', 'name'];
}
