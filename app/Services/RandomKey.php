<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;

class RandomKey
{
    /**
     * @param string|Model|null $uniqueModel
     * @param string|null $field
     * @return string
     */
    public static function generate(string $uniqueModel = null, string $field = null): string
    {
        $limit = 0;
        $start = 11111;
        $end = 99999;
        do {
            $limit++;
            $key = self::__gen($start = self::__append($start), $end = self::__append($end));
        } while ($limit <= 10 && $uniqueModel && !self::__unique($uniqueModel, $field, $key));

        return $key;
    }

    /**
     * @param int $num
     * @return int
     */
    private static function __append(int $num): int
    {
        return (int)("{$num}1");
    }

    /**
     * @param int $start
     * @param int $end
     * @return string
     */
    private static function __gen(int $start, int $end): string
    {
        return $randomNumber = rand($start, $end);
    }

    /**
     * @param string|Model $uniqueModel
     * @param string $field
     * @param string $key
     * @return bool
     */
    private static function __unique(string $uniqueModel, string $field, string $key): bool
    {
        return !$uniqueModel::query()->where($field, $key)->count();
    }
}
