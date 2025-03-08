<?php

namespace App\Filters\Company\Address;

readonly final class Country extends AddressFilter
{

    protected function getFilterKey(): string
    {
        return 'country';
    }
}
