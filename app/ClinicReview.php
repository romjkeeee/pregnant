<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\HasOne;

class ClinicReview extends BaseModel
{
    protected $fillable = ['user_id', 'clinic_id', 'rate', 'text', 'check'];

    protected static function boot()
    {
        parent::boot();
        static::created(function (self $review) {
            $review->clinic()->update(['rate' => self::query()->filter($review->only(['clinic_id']))->avg('rate')]);
        });
        static::updated(function (self $review) {
            $review->clinic()->update(['rate' => self::query()->filter($review->only(['clinic_id']))->avg('rate')]);
        });
        static::deleting(function (self $review) {
            $review->clinic()->update(['rate' => self::query()->filter($review->only(['clinic_id']))->avg('rate')]);
        });
    }

    /**
     * @return HasOne
     */
    public function clinic(): HasOne
    {
        return $this->hasOne(Clinic::class, 'id', 'clinic_id');
    }

    /**
     * @return HasOne
     */
    public function user(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
