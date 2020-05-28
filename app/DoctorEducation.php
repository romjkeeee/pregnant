<?php

namespace App;

use App\Traits\MultiLangTrait;
use App\Translate\DoctorEducationTranslate;
use Illuminate\Database\Eloquent\Relations\HasOne;

class DoctorEducation extends BaseModel
{
    use MultiLangTrait;

    protected $translatedClass = DoctorEducationTranslate::class;
    protected $translatedForeignKey = 'education_id';
    protected $fillable = ['doctor_id'];

    /**
     * @return HasOne
     */
    public function doctor(): HasOne
    {
        return $this->hasOne(Doctor::class, 'id', 'doctor_id');
    }
}
