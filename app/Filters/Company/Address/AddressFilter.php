<?php

namespace App\Filters\Company\Address;

use App\Filters\QueryFilter;
use Illuminate\Contracts\Database\Query\Builder;

readonly abstract class AddressFilter extends QueryFilter
{

    protected function apply(Builder $builder): Builder
    {
        $filterKey = $this->getFilterKey();

        return $builder->whereHas('address', function ($builder) use ($filterKey) {
            $builder->where($filterKey, $this->request->query($filterKey));
        });
    }
}
