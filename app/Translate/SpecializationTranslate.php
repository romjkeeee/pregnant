<?php

namespace App\Translate;

use App\BaseModel;

class SpecializationTranslate extends BaseModel
{
    public $timestamps = false;

    protected $fillable = ['lang_id', 'specialization_id', 'name', 'photo','image','description'];
}
