<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClinicSchedule extends Model
{
    protected $appends = ['dayName'];

    /**
     * @return string|null
     */
    public function getDayNameAttribute(): ?string
    {
        return trans('date.days')[$this->day] ?? null;
    }
}
