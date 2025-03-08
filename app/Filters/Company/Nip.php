<?php

namespace App\Filters\Company;

use App\Filters\QueryFilter;
use Illuminate\Contracts\Database\Query\Builder;

readonly final class Nip extends QueryFilter
{

    protected function getFilterKey(): string
    {
        return 'nip';
    }

    protected function apply(Builder $builder): Builder
    {
        $filterKey = $this->getFilterKey();

        return $builder->where($filterKey, $this->request->query($filterKey));
    }
}
