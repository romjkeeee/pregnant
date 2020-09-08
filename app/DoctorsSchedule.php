<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class DoctorsSchedule extends Model
{
    protected $fillable = ['day', 'start', 'end', 'clinic_id'];
    protected $appends = ['dayName'];
    public $timestamps = false;

    /**
     * @return string|null
     */
    public function getDayNameAttribute(): ?string
    {
        return trans('date.days')[$this->day] ?? null;
    }

    /**
     * @return string|null
     */
    public function getStartAttribute(): ?string
    {
        return $this->attributes['start'] ? Carbon::parse($this->attributes['start'])->format('H:i') : null;
    }

    /**
     * @return string|null
     */
    public function getEndAttribute(): ?string
    {
        return $this->attributes['end'] ? Carbon::parse($this->attributes['end'])->format('H:i') : null;
    }

    /**
     * @return HasOne
     */
    public function doctor(): HasOne
    {
        return $this->hasOne(Doctor::class, 'id', 'doctor_id');
    }
}
