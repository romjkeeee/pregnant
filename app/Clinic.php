<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\HasOne;

class Clinic extends BaseModel
{
    const STATE = 'state';
    const PRIVATE = 'private';

    protected $table = 'clinics';
    public $timestamps = false;

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
