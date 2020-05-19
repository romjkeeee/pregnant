<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class DurationArticles extends Model
{
    protected $guarded = ['id'];

    public function duration(): HasOne
    {
        return $this->hasOne(Duration::class, 'id', 'duration_id');
    }
}
