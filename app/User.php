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
        'lang_id',
        'region_id',
        'city_id',
        'street',
        'building',
        'apartment',
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
}
