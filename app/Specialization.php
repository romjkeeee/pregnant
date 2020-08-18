<?php

namespace App;

use App\Traits\MultiLangTrait;
use App\Translate\SpecializationTranslate;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Specialization extends BaseModel
{
    use MultiLangTrait;

    protected $translatedClass = SpecializationTranslate::class;
    protected $translatedForeignKey = 'specialization_id';

    public $timestamps = false;

    /**
     * @return BelongsToMany
     */
    public function doctors(): BelongsToMany
    {
        return $this->belongsToMany(Doctor::class, 'doctor_specializations', 'specialization_id', 'doctor_id');
    }

    public function translate(): HasMany
    {
        return $this->hasMany(self::$translatedClass, self::$translatedForeignKey);
    }
}
