<?php

namespace App\Filters\Employee;

use App\Filters\TextFilter;

readonly final class Email extends TextFilter
{
    protected function getFilterKey(): string
    {
        return 'email';
    }
}
