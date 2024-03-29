<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\HasOne;

class DoctorReview extends BaseModel
{
    protected $fillable = ['user_id', 'doctor_id', 'rate', 'text', 'check'];

    protected static function boot()
    {
        parent::boot();
        static::created(function (self $review) {
            $review->doctor()->update(['rate' => self::query()->filter($review->only(['doctor_id']))->avg('rate')]);
        });
        static::updated(function (self $review) {
            $review->doctor()->update(['rate' => self::query()->filter($review->only(['doctor_id']))->avg('rate')]);
        });
        static::deleting(function (self $review) {
            $review->doctor()->update(['rate' => self::query()->filter($review->only(['doctor_id']))->avg('rate')]);
        });
    }

    /**
     * @return HasOne
     */
    public function doctor(): HasOne
    {
        return $this->hasOne(Doctor::class, 'id', 'doctor_id');
    }

    /**
     * @return HasOne
     */
    public function user(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
