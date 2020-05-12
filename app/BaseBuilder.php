<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;

class BaseBuilder extends Builder
{
    /**
     * @param array $filter
     * @return $this
     */
    public function filter(array $filter): BaseBuilder
    {
        collect($filter)->each(function ($value, $field) {
            if ($value) {
                $this->query->where($field, $value);
            }
        });

        return $this;
    }
}
