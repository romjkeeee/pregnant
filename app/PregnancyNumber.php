<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class PregnancyNumber extends Model
{
    /**
     * @var array
     */

    protected $guarded = [];

    /**
     * @return HasOne
     */

    public function user() : hasOne
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
