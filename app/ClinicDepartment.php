<?php

namespace App;

use App\Traits\MultiLangTrait;
use App\Translate\ClinicDepartmentTranslate;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ClinicDepartment extends BaseModel
{
    use MultiLangTrait;

    protected $translatedClass = ClinicDepartmentTranslate::class;
    protected $translatedForeignKey = 'department_id';

    protected $fillable = ['clinic_id'];

    /**
     * @return HasOne
     */
    public function clinic(): HasOne
    {
        return $this->hasOne(Clinic::class, 'id', 'clinic_id');
    }
}
