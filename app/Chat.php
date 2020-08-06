<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\HasOne;

class Chat extends BaseModel
{
    public $timestamps = false;
    protected $fillable = ['sender_id', 'recipient_id'];

    /**
     * @return HasOne
     */
    public function recipient(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'recipient_id');
    }

    /**
     * @return HasOne
     */

    public function info_sender_patient(): HasOne
    {
        return $this->hasOne(Patient::class, 'user_id', 'sender_id');
    }

    public function info_sender_doctor(): HasOne
    {
        return $this->hasOne(Doctor::class, 'user_id', 'sender_id');
    }

    public function info_recipient_patient(): HasOne
    {
        return $this->hasOne(Patient::class, 'user_id', 'recipient_id');
    }

    public function info_recipient_doctor(): HasOne
    {
        return $this->hasOne(Doctor::class, 'user_id', 'recipient_id');
    }

    /**
     * @return HasOne
     */
    public function sender(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'sender_id');
    }

    /**
     * @return HasOne
     */
    public function lastMessage(): HasOne
    {
        return $this->hasOne(ChatMessage::class, 'chat_id', 'id')->orderByDesc('id');
    }
}
