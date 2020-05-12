<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Doctor extends BaseModel
{
    protected $fillable = ['user_id', 'rate'];

    /**
     * @return HasOne
     */
    public function user(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

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
        return $this->belongsToMany(Specialization::class, 'doctor_specializations', 'doctor_id', 'specialization_id');
    }

    /**
     * @return HasMany
     */
    public function reviews(): HasMany
    {
        return $this->hasMany(DoctorReview::class, 'doctor_id', 'id');
    }

}
