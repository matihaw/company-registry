<?php

namespace App\Filters\Company\Address;

use App\Filters\QueryFilter;
use Illuminate\Contracts\Database\Query\Builder;

readonly final class City extends AddressFilter
{

    protected function getFilterKey(): string
    {
        return 'city';
    }
}
