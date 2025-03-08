<?php

namespace App\Filters\Employee;

use App\Filters\QueryFilter;
use Illuminate\Contracts\Database\Query\Builder;

readonly final class phone extends QueryFilter
{
    protected function getFilterKey(): string
    {
        return 'phone';
    }

    protected function apply(Builder $builder): Builder
    {
        $filterKey = $this->getFilterKey();

        return $builder->where($filterKey, $this->request->query($filterKey));
    }
}
