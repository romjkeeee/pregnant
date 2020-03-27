<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Region extends Authenticatable {
	
	protected $table = 'regions';
	public $timestamps = false;
	
}
