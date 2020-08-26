<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

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
        'image',
        'notification',
        'push_key'
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
     * @return string
     */
    public function getFullNameAttribute(): string
    {
        return "{$this->last_name} {$this->name} {$this->second_name}";
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

    /**
     * @return HasMany
     */

    public function city_translate(): hasMany
    {
        return $this->hasMany(Translate\CityTranslate::class, 'city_id', 'city_id');
    }

    /**
     * @return HasOne
     */
    public function lang(): HasOne
    {
        return $this->hasOne(Lang::class, 'id', 'lang_id');
    }

    /**
     * @return int|null
     */
    public function currentLang(): ?int
    {
        return $this->lang_id ?? Lang::query()->where('code', 'ru')->first()->id ?? null;
    }

    /**
     * @return HasMany
     */
    public function senderChats(): HasMany
    {
        return $this->hasMany(Chat::class, 'sender_id', 'id');
    }

    /**
     * @return HasMany
     */
    public function messages(): HasMany
    {
        return $this->hasMany(ChatMessage::class, 'sender_id', 'id');
    }

    /**
     * @return HasOne
     */

    public function bellie() : HasOne
    {
        return $this->hasOne(PatientBelly::class, 'id', 'patient_id');
    }

    /**
     * @return HasOne
     */

    public function weight() : HasOne
    {
        return $this->hasOne(PatientWeight::class, 'id', 'patient_id');
    }

    /**
     * @return HasOne
     */

    public function pnumber() : HasOne
    {
        return $this->hasOne(PregnancyNumber::class, 'user_id', 'id');
    }

    /**
     * @return HasMany
     */

    public function patology() : HasMany
    {
        return $this->hasMany(PregnancyPatologye::class, 'user_id', 'id');
    }
}
