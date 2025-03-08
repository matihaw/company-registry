<?php

namespace App\Filters\Employee;

use App\Filters\TextFilter;
use Illuminate\Contracts\Database\Query\Builder;

readonly final class FirstName extends TextFilter
{
    protected function getFilterKey(): string
    {
        return 'first_name';
    }
}
