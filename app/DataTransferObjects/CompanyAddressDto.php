<?php

namespace App\DataTransferObjects;

final readonly class CompanyAddressDto extends Dto
{
    public function __construct(
        protected string $city,
        protected string $street,
        protected string $country,
        protected string $zip,
    ) {
    }
}
