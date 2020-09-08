<?php

namespace App;

use App\Traits\MultiLangTrait;
use App\Traits\StoreImageTrait;
use App\Translate\DoctorEducationTranslate;
use Illuminate\Database\Eloquent\Relations\HasOne;

class DoctorEducation extends BaseModel
{
    use MultiLangTrait, StoreImageTrait;

    protected $translatedClass = DoctorEducationTranslate::class;
    protected $translatedForeignKey = 'education_id';
    protected $fillable = ['doctor_id', 'image'];
    protected $image = ['image'];

    /**
     * @return HasOne
     */
    public function doctor(): HasOne
    {
        return $this->hasOne(Doctor::class, 'id', 'doctor_id');
    }
}
