<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

use App\Role;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    // Rest omitted for brevity

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


  public function isAdmin()
  {
  	return $this->unique_id === str_repeat('0', config('limits.user_personal_code_length'));
  }

	public function has_right($right) {

		$role_id = (int)Auth()->user()->role_id;
		if ($role_id == 0 or $role_id == null) {
			return false;
		}

		if ($role_id > 0) {

			$role = Role::find($role_id);
			if (!$role) {
				return false;
			}

			$rights = json_decode($role->rights, true);
			if (in_array($right, $rights)) {
				return true;
			}

			return false;

		}

		return false;

	}

}
