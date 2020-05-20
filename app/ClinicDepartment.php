<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\HasOne;

class ClinicDepartment extends BaseModel
{
    protected $fillable = ['clinic_id', 'name', 'street', 'building'];

    /**
     * @return HasOne
     */
    public function clinic(): HasOne
    {
        return $this->hasOne(Clinic::class, 'id', 'clinic_id');
    }
}
