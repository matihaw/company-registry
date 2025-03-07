<?php

namespace App\Http\Requests\Employee;

final class Update extends EmployeeFormRequest
{
    /**
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'first_name' => 'string',
            'last_name' => 'string',
            'email' => 'email',
            'phone' => 'string|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
        ];
    }
}
