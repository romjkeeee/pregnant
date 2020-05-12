<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Doctor extends BaseModel
{
    protected $fillable = ['user_id'];

    /**
     * @return BelongsToMany
     */
    public function clinics(): BelongsToMany
    {
        return $this->belongsToMany(Clinic::class, 'doctor_clinics', 'doctor_id', 'clinic_id');
    }


    /**
     * @return BelongsToMany
     */
    public function specialisations(): BelongsToMany
    {
        return $this->belongsToMany(Spec::class, 'doctor_specializations', 'doctor_id', 'specialization_id');
    }
}
