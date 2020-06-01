<?php

namespace App\Translate;

use App\BaseModel;

class CheckListTranslate extends BaseModel
{
    public $timestamps = false;

    protected $fillable = ['lang_id', 'list_id', 'name'];
}
