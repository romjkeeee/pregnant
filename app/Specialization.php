<?php

namespace App;

use App\Traits\MultiLangTrait;
use App\Translate\SpecializationTranslate;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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
}
