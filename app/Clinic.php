<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Clinic extends BaseModel
{
    const STATE = 'state';
    const PRIVATE = 'private';

    protected $table = 'clinics';
    public $timestamps = false;

    protected $fillable = ['rate'];

    /**
     * @return HasOne
     */
    public function region(): HasOne
    {
        return $this->hasOne(Region::class, 'id', 'region_id');
    }

    /**
     * @return HasOne
     */
    public function city(): HasOne
    {
        return $this->hasOne(City::class, 'id', 'city_id');
    }

    /**
     * @return HasMany
     */
    public function departments(): HasMany
    {
        return $this->hasMany(ClinicDepartment::class, 'clinic_id', 'id');
    }

    /**
     * @return HasMany
     */
    public function schedules(): HasMany
    {
        return $this->hasMany(ClinicSchedule::class, 'clinic_id', 'id');
    }

    /**
     * @return HasMany
     */
    public function prices(): HasMany
    {
        return $this->hasMany(ClinicPrice::class, 'clinic_id', 'id');
    }

    /**
     * @return HasMany
     */
    public function reviews(): HasMany
    {
        return $this->hasMany(ClinicReview::class, 'clinic_id', 'id');
    }
}
