<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

use App\Role;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    /** users role - doctor, patient */
    const DOCTOR = 'doctor';
    const PATIENT = 'patient';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'role',
        'verified',
        'email',
        'password',
        'name',
        'last_name',
        'second_name',
        'phone',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

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
     * @return HasOne
     */
    public function doctor(): HasOne
    {
        return $this->hasOne(Doctor::class, 'user_id', 'id');
    }

    /**
     * @return HasOne
     */
    public function patient(): HasOne
    {
        return $this->hasOne(Patient::class, 'user_id', 'id');
    }

    /**
     * @return HasMany
     */
    public function smsCodes(): HasMany
    {
        return $this->hasMany(UserSmsCode::class, 'user_id', 'id');
    }

    /**
     * @param string|null $password
     */
    public function setPasswordAttribute(string $password = null): void
    {
        if ($password) {
            $this->attributes['password'] = bcrypt($password);
        }
    }

    /**
     * @param array $doctor
     * @param array $clinic
     * @param array $specialisations
     * @return Model|Doctor
     */
    public function createDoctor(array $doctor, array $clinic, array $specialisations)
    {
        /** @var $doc Doctor */
        $doc = $this->doctor()->create($doctor);
        $doc->clinics()->sync($clinic);
        $doc->specialisations()->sync($specialisations);

        return $doc;
    }

    public function isAdmin()
    {
        return $this->unique_id === str_repeat('0', config('limits.user_personal_code_length'));
    }

    public function has_right($right)
    {

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

    /**
     * @return HasMany
     */
    public function clinicReviews(): HasMany
    {
        return $this->hasMany(ClinicReview::class, 'user_id', 'id');
    }

    /**
     * @return HasMany
     */
    public function doctorReviews(): HasMany
    {
        return $this->hasMany(DoctorReview::class, 'user_id', 'id');
    }
}
