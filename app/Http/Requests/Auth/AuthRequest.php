<?php

namespace App\Http\Requests\Auth;

use App\DataTransferObjects\UserDto;
use Illuminate\Foundation\Http\FormRequest;

abstract class AuthRequest extends FormRequest
{
    public function toDto(): UserDto
    {
        return new UserDto(
            name: $this->string('name'),
            email: $this->string('email'),
            password: $this->string('password'),
        );
    }
}
