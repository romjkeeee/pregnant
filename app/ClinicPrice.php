<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\HasOne;

class ClinicPrice extends BaseModel
{
    protected $fillable = ['clinic_id', 'name', 'price'];

    /**
     * @return HasOne
     */
    public function clinic(): HasOne
    {
        return $this->hasOne(Clinic::class, 'id', 'clinic_id');
    }
}
