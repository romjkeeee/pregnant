<?php

namespace App\Translate;

use App\BaseModel;

class ClinicTranslate extends BaseModel
{
    public $timestamps = false;
    protected $fillable = ['name', 'text', 'address', 'lang_id', 'clinic_id'];
}
