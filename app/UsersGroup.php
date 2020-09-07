<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class UsersGroup extends Model
{
    const COUNCIL = 1;
    const FORUM = 2;

    protected $guarded = [];

    /**
     * @return HasOne
     */

    public function user() : HasOne
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    /**
     * @return HasOne
     */

    public function chat()
    {
        return $this->hasMany(Chat::class, 'id', 'chat_id');
    }

    /**
     * @return HasOne
     */

    public function message() : HasOne
    {
        return $this->hasOne(ChatMessage::class, 'chat_id', 'chat_id');
    }
}
