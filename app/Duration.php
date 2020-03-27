<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Duration extends Authenticatable {
	
	protected $table = 'durations';
	public $timestamps = false;
	
}
