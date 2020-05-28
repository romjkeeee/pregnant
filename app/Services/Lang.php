<?php

namespace App\Services;

use App\Interfaces\LangInterface;
use Illuminate\Support\Collection;

class Lang implements LangInterface
{
    /**
     * @return int
     */
    public static function current(): int
    {
        return ($user = auth()->user()) && $user->lang_id ? $user->lang_id : self::DEFAULT;
    }

    /**
     * @return Collection
     */
    public static function all(): Collection
    {
        return \App\Lang::all(['id', 'code', 'name']);
    }
}
