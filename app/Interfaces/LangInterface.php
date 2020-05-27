<?php

namespace App\Interfaces;

use Illuminate\Support\Collection;

interface LangInterface
{
    const DEFAULT = 1;

    /**
     * @return int
     */
    public static function current(): int;

    /**
     * @return Collection
     */
    public static function all(): Collection;
}
