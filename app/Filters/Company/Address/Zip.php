<?php

namespace App\Filters\Company\Address;

readonly final class Zip extends AddressFilter
{

    protected function getFilterKey(): string
    {
        return 'zip';
    }
}
