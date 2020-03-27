<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Doctor extends Authenticatable {
	
	protected $table = 'doctors';
	protected $fillable = ['token', 'code', 'last_name', 'name', 'phone', 'password', 'confirmed'];
	
}
