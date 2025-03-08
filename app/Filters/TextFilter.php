<?php

namespace App\Filters;

use Illuminate\Contracts\Database\Query\Builder;

readonly abstract class TextFilter extends QueryFilter
{
    protected function apply(Builder $builder): Builder
    {
        $filterKey = $this->getFilterKey();

        return $builder->where($filterKey, 'LIKE', '%' . $this->request->query($filterKey) . '%');
    }
}
