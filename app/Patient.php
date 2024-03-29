<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Patient extends BaseModel
{
    protected $dates = ['date_of_birth'];
    protected $guarded = [/*'id'*/];
    /**
     * @return HasOne
     */
    public function user(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    /**
     * @return HasOne
     */
    public function clinic(): HasOne
    {
        return $this->hasOne(Clinic::class, 'id', 'clinic_id');
    }

    /**
     * @return HasOne
     */
    public function doctor(): HasOne
    {
        return $this->hasOne(Doctor::class, 'id', 'doctor_id');
    }

    /**
     * @return HasMany
     */
    public function bellies(): HasMany
    {
        return $this->hasMany(PatientBelly::class, 'patient_id', 'id');
    }

    /**
     * @return HasMany
     */
    public function contractions(): HasMany
    {
        return $this->hasMany(PatientContraction::class, 'patient_id', 'id');
    }

    /**
     * @return HasOne
     */
    public function menstruation(): HasOne
    {
        return $this->hasOne(PatientMenstruation::class, 'patient_id', 'id');
    }

    /**
     * @return HasMany
     */
    public function emergencyContacts(): HasMany
    {
        return $this->hasMany(EmergencyContact::class, 'patient_id', 'id');
    }

    /**
     * @return HasMany
     */
    public function weight(): HasMany
    {
        return $this->hasMany(PatientWeight::class, 'patient_id', 'id');
    }

    /**
     * @return BelongsToMany
     */
    public function tasks(): BelongsToMany
    {
        return $this->belongsToMany(CheckListTask::class, 'patient_tasks', 'patient_id', 'task_id');
    }

    /**
     * @return BelongsToMany
     */

    public function remember(): BelongsToMany
    {
        return $this->belongsToMany(CheckListTask::class, 'patient_task_remembers', 'patient_id', 'task_id');
    }

    /**
     * @return HasOne
     */

    public function lastMenstruation() : HasOne
    {
        return $this->hasOne(PatientLastMenstruation::class, 'patient_id', 'id')->orderByDesc('id');
    }

}
