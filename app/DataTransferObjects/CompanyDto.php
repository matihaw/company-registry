<?php

namespace App\DataTransferObjects;

final readonly class CompanyDto extends Dto
{
    public function __construct(
        protected string $name,
        protected int $nip,
        protected CompanyAddressDto $address,
    ) {
    }

    public function getAddress(): CompanyAddressDto
    {
        return $this->address;
    }
}
