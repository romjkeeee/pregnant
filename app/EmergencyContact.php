<?php

namespace App;


use Illuminate\Database\Eloquent\Relations\HasOne;

class EmergencyContact extends BaseModel
{
    protected $fillable = ['patient_id', 'name', 'phone'];
    protected $guarded = ['id'];

    /**
     * @return HasOne
     */
    public function patient(): HasOne
    {
        return $this->hasOne(Patient::class, 'id', 'patient_id');
    }

}
