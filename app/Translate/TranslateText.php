<?php

namespace App\Translate;

use App\BaseModel;

class TranslateText extends BaseModel
{
    public $timestamps = false;

    protected $fillable = ['lang_id', 'translate_id', 'text'];
}
