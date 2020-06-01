<?php

namespace App\Translate;

use App\BaseModel;

class CheckListTaskTranslate extends BaseModel
{
    public $timestamps = false;

    protected $fillable = ['lang_id', 'task_id', 'name'];
}
