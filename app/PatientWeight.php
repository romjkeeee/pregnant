<?php

namespace App;


use Illuminate\Database\Eloquent\Relations\HasOne;

class PatientWeight extends BaseModel
{
    protected $guarded = ['id'];

    protected $fillable = ['patient_id', 'weights', 'date'];
    protected $dates = ['date'];

    /**
     * @return HasOne
     */
    public function patient(): HasOne
    {
        return $this->hasOne(Patient::class, 'id', 'patient_id');
    }
}
