<?php

namespace App;

use App\Traits\MultiLangTrait;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{

    /* Ошибочка вышла */

    protected $table = 'districs';

    use MultiLangTrait;

    protected $translatedClass = DistrictTranslate::class;
    protected $translatedForeignKey = 'district_id';

    public $timestamps = false;
    protected $guarded = [];

    protected $with = ['city.translate'];

    public function city()
    {
        return $this->hasOne(City::class, 'id', 'city_id');
    }
}
