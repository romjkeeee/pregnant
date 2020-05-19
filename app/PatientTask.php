<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PatientTask extends Model
{
    protected $fillable = ['task_id', 'patient_id'];
}
