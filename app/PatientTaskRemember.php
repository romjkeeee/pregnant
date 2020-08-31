<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PatientTaskRemember extends Model
{
    protected $guarded = ['id'];

    public function patient()
    {
        return $this->hasOne(Patient::class, 'id', 'patient_id');
    }
}
