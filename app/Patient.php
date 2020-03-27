<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Patient extends Authenticatable {
	
	protected $table = 'patients';
	protected $fillable = ['token', 'code', 'date_of_birth', 'last_name', 'name', 'phone', 'password', 'confirmed'];
	
}
