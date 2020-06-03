<?php

namespace App\Translate;

use App\BaseModel;

class ClinicDepartmentTranslate extends BaseModel
{
    public $timestamps = false;
    protected $fillable = ['lang_id', 'name', 'street', 'building'];
}
