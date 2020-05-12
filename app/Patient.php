<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Patient extends Authenticatable
{

    protected $table = 'patients';
    protected $fillable = [
        'user_id',
        'region_id',
        'city_id',
        'address',
        'clinic_id',
        'doctor_id',
        'duration_id',
        'date_of_birth',
        'pregnant',
    ];

    protected $dates = ['date_of_birth'];

    /**
     * @return HasOne
     */
    public function user(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

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
     * @return HasOne
     */
    public function clinic(): HasOne
    {
        return $this->hasOne(Clinic::class, 'id', 'clinic_id');
    }

    /**
     * @return HasOne
     */
    public function doctor(): HasOne
    {
        return $this->hasOne(Doctor::class, 'id', 'doctor_id');
    }

    /**
     * @return HasOne
     */
    public function duration(): HasOne
    {
        return $this->hasOne(Duration::class, 'id', 'duration_id');
    }

    /**
     * @return HasMany
     */
    public function bellies(): HasMany
    {
        return $this->hasMany(PatientBelly::class, 'patient_id', 'id');
    }

    /**
     * @return HasMany
     */
    public function contractions(): HasMany
    {
        return $this->hasMany(PatientContraction::class, 'patient_id', 'id');
    }
}
