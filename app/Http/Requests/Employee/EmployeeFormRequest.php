<?php

namespace App\Http\Requests\Employee;

use App\DataTransferObjects\EmployeeDto;
use Illuminate\Foundation\Http\FormRequest;

class EmployeeFormRequest extends FormRequest
{
    public function toDto(): EmployeeDto
    {
        return new EmployeeDto(
            first_name: $this->string('first_name'),
            last_name: $this->string('last_name'),
            email: $this->string('email'),
            phone: $this->string('phone'),
        );
    }
}
