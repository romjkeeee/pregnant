<?php

namespace App;

use Carbon\Carbon;
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

}
