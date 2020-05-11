<?php

namespace App;

use App\Services\Sms;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class UserSmsCode extends Model
{
    protected $fillable = ['user_id', 'code'];

    protected static function boot()
    {
        parent::boot();

        static::created(function (self $code) {
            Sms::init()->send($code->user->phone, "Код подтверждения: {$code->code}");
        });
    }

    /**
     * @return HasOne
     */
    public function user(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

}
