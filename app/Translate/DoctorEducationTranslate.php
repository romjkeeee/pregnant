<?php

namespace App\Translate;

use App\BaseModel;

class DoctorEducationTranslate extends BaseModel
{
    public $timestamps = false;

    protected $fillable = ['lang_id', 'education_id', 'title', 'description'];
}
