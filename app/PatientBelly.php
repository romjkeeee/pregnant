<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\HasOne;

class PatientBelly extends BaseModel
{
    protected $fillable = ['patient_id', 'date', 'uterine_fundus_height', 'girth_abdomen'];
    protected $dates = ['date'];

    /**
     * @return HasOne
     */
    public function patient(): HasOne
    {
        return $this->hasOne(Patient::class, 'id', 'patient_id');
    }
}
