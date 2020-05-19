<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\HasOne;

class City extends BaseModel
{
    protected $fillable = ['name', 'region_id'];
    public $timestamps = false;

    /**
     * @return HasOne
     */
    public function region(): HasOne
    {
        return $this->hasOne(Region::class, 'id', 'region_id');
    }
}
