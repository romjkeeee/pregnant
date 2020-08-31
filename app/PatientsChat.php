<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class PatientsChat extends Model
{
    /**
     * @var array
     */

    protected $guarded = [];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */

    public function patient() : HasOne
    {
        return $this->hasOne(User::class, 'id', 'patient_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */

    public function doctor() :  HasOne
    {
        return $this->hasOne(User::class, 'id', 'doctor_id');
    }
}
