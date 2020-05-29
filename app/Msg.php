<?php

namespace App;

class Msg extends BaseModel
{

    protected $table = 'messages';

    protected $fillable = ['chat_id', 'sender_id', 'rec_id', 'text'];
}
