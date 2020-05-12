<?php

namespace App;


use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Specialization extends BaseModel
{

    public $timestamps = false;

    /**
     * @return BelongsToMany
     */
    public function doctors(): BelongsToMany
    {
        return $this->belongsToMany(Doctor::class, 'doctor_specializations', 'specialization_id', 'doctor_id');
    }
}
