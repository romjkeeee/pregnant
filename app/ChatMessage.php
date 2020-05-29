<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ChatMessage extends Model
{
    public $timestamps = false;
    public $dates = ['send_at'];
    protected $fillable = ['sender_id', 'text', 'chat_id'];

    /**
     * @return HasOne
     */
    public function sender(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'sender_id');
    }

    /**
     * @return HasMany
     */
    public function attaches(): HasMany
    {
        return $this->hasMany(ChatMessageAttach::class, 'message_id', 'id');
    }
}
