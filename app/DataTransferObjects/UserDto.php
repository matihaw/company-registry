<?php

namespace App\DataTransferObjects;

readonly final class UserDto extends Dto
{
    public function __construct(
        protected string $name,
        protected string $email,
        protected string $password,
    ) {
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPassword(): string
    {
        return $this->password;
    }
}
