<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\HasOne;

class CheckListTask extends BaseModel
{
    protected $fillable = ['list_id', 'name'];

    /**
     * @return HasOne
     */
    public function list(): HasOne
    {
        return $this->hasOne(CheckList::class, 'id', 'list_id');
    }
}
