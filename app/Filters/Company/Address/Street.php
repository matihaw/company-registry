<?php

namespace App\Filters\Company\Address;

readonly final class Street extends AddressFilter
{

    protected function getFilterKey(): string
    {
        return 'street';
    }
}
