<?php

namespace App\Interfaces;

use Illuminate\Database\Eloquent\Model;

interface ModelMultiLangInterface
{
    /**
     * необходимо указать клас модели переводов
     *
     * @return string|Model
     */
    public function getTranslatedClass(): string;

    /**
     * необходимо указать ключ связи с моделей переводов
     *
     * @return string
     */
    public function getTranslatedForeignKey(): string;
}
