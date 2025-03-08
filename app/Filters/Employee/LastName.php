<?php

namespace App\Filters\Employee;

use App\Filters\TextFilter;

readonly final class LastName extends TextFilter
{
    protected function getFilterKey(): string
    {
        return 'last_name';
    }
}
