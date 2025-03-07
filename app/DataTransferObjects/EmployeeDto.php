<?php

namespace App\DataTransferObjects;

final readonly class EmployeeDto extends Dto
{
    public function __construct(
        protected string $first_name,
        protected string $last_name,
        protected string $email,
        protected string $phone,
    ) {
    }
}
