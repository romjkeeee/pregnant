<?php

namespace App;

use App\Translate\ClinicTranslate;
use App\Translate\SpecializationTranslate;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Doctor extends BaseModel
{
    protected $fillable = ['user_id', 'rate', 'experience', 'like', 'dislike'];

    /**
     * @return HasOne
     */
    public function user(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    /**
     * @return BelongsToMany
     */
    public function clinics(): BelongsToMany
    {
        return $this->belongsToMany(Clinic::class, 'doctor_clinics', 'doctor_id', 'clinic_id');
    }

    public function patients(): HasMany
    {
        return $this->hasMany(Patient::class);
    }

    /**
     * @return BelongsToMany
     */
    public function specialisations(): BelongsToMany
    {
        return $this->belongsToMany(Specialization::class, 'doctor_specializations', 'doctor_id', 'specialization_id');
    }

    public function specialisationsTranslate(): hasMany
    {
        return $this->hasMany(SpecializationTranslate::class, 'specialization_id', 'doctor_specializations', 'id');
    }

    public function translates(): hasMany
    {
        return $this->hasMany(ClinicTranslate::class, 'clinic_id');
    }

    /**
     * @return HasMany
     */
    public function reviews(): HasMany
    {
        return $this->hasMany(DoctorReview::class, 'doctor_id', 'id');
    }

    /**
     * @return array|null
     */
    public function getSelectedClinicsAttribute(): ?array
    {
        $clinics = [];
        $this->clinics()->get()->each(function (Clinic $clinic) use (&$clinics) {
            $clinics[$clinic->id] = $clinic->translate->name;
        })->toArray();

        return $clinics;
    }

    /**
     * @return array|null
     */
    public function getSelectedSpecialisationsAttribute(): ?array
    {
        $specialisations = [];
        $this->specialisations()->get()->each(function (Specialization $specialization) use (&$specialisations) {
            $specialisations[$specialization->id] = $specialization->translate->name;
        })->toArray();

        return $specialisations;
    }

    /**
     * @return HasMany
     */
    public function educations(): HasMany
    {
        return $this->hasMany(DoctorEducation::class, 'doctor_id', 'id');
    }

    /**
     * @return HasMany
     */

    public function schedules() : HasMany
    {
        return $this->hasMany(DoctorsSchedule::class, 'doctor_id', 'id');
    }

    /**
     * @return array
     */
    public function getFullSchedulesAttribute(): array
    {
        return collect(trans('date.days'))->map(function ($name, $day) {
            return [
                'day'    => $name,
                'period' => ($this->schedules->where('day', $day)->first()->start ?? '~') . ' - ' . ($this->schedules->where('day', $day)->first()->end ?? '~')
            ];
        })->toArray();
    }

}
