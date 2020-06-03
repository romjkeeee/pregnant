<?php

namespace App;

use App\Traits\MultiLangTrait;
use App\Translate\ClinicPriceTranslate;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ClinicPrice extends BaseModel
{
    use MultiLangTrait;

    protected $translatedClass = ClinicPriceTranslate::class;
    protected $translatedForeignKey = 'price_id';

    protected $fillable = ['clinic_id', 'price'];



    /**
     * @return HasOne
     */
    public function clinic(): HasOne
    {
        return $this->hasOne(Clinic::class, 'id', 'clinic_id');
    }
}
