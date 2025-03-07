<?php

namespace App\Http\Requests\Employee;

final class Store extends EmployeeFormRequest
{
    /**
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'string|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
        ];
    }
}
