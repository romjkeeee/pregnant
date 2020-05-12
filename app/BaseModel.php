<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;

class BaseModel extends Model
{
    /**
     * @param Builder $query
     * @return BaseModel|BaseBuilder
     */
    public function newEloquentBuilder($query)
    {
        return new BaseBuilder($query);
    }
}
