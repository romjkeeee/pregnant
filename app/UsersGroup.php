<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsersGroup extends Model
{
    const COUNCIL = 1;
    const FORUM = 2;

    protected $guarded = [];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */

    public function user(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function chat()
    {
        return $this->hasOne(Chat::class, 'id', 'chat_id');
    }
}
