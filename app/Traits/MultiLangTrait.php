<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

trait MultiLangTrait
{
    /**
     * @var $translatedClass Model
     */
    public $translatedClass;
    /**
     * @var $translatedForeignKey string
     */
    public $translatedForeignKey;

    /**
     * MultiLangTrait constructor.
     */
    public function multiLangInit()
    {
        $this->translatedClass = $this->getTranslatedClass();
        $this->translatedForeignKey = $this->getTranslatedForeignKey();
    }

    /**
     * @return HasOne
     */
    public function translate(): HasOne
    {
        return $this->hasOne($this->translatedClass, $this->translatedForeignKey, 'id')->where('lang_id', app()->currentLang);
    }

    /**
     * @return hasMany
     */
    public function translates(): hasMany
    {
        return $this->hasMany($this->translatedClass, $this->translatedForeignKey, 'id');
    }

    /**
     * @param array $data
     * @return Collection
     */
    public function syncTranslates(array $data): Collection
    {
        $this->translates()->delete();

        return $this->translates()->createMany($data);
    }
}
