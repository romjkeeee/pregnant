<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Clinic extends Authenticatable {
	
	protected $table = 'clinics';
	public $timestamps = false;
	
}
