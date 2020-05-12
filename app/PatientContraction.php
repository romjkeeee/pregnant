<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\HasOne;

class PatientContraction extends BaseModel
{
    protected $fillable = ['start', 'duration', 'interval'];

    /**
     * @return HasOne
     */
    public function patient(): HasOne
    {
        return $this->hasOne(Patient::class, 'id', 'patient_id');
    }
}
