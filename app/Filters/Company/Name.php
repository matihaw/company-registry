<?php

namespace App\Filters\Company;

use App\Filters\TextFilter;

readonly final class Name extends TextFilter
{
    protected function getFilterKey(): string
    {
        return 'name';
    }
}
