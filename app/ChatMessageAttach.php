<?php

namespace App;

use App\Traits\StoreImageTrait;

class ChatMessageAttach extends BaseModel
{
    use StoreImageTrait;

    protected $fillable = ['message_id', 'path'];
    public $timestamps = false;
    public $image = ['path'];
}
