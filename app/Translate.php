<?php

namespace App;

use App\Traits\MultiLangTrait;
use App\Translate\TranslateText;

class Translate extends BaseModel
{
    use MultiLangTrait;

    protected $translatedClass = TranslateText::class;
    protected $translatedForeignKey = 'translate_id';

    /*protected $fillable = ['key'];*/

    protected $guarded = [];

    public function lang_code()
    {
        return $this->hasOne($this->translatedClass, 'translate_id', 'id');
    }
}
