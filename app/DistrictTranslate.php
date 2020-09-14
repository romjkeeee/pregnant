<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DistrictTranslate extends Model
{
    public $timestamps = false;

    protected $fillable = ['lang_id', 'district_id', 'name'];
}
