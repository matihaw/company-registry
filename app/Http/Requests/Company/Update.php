<?php

namespace App\Http\Requests\Company;

final class Update extends CompanyFormRequest
{
    /**
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'name' => 'string|max:255',
            'nip' => 'numeric|digits:10',
            'address.city' => 'string|max:255',
            'address.street' => 'string|max:255',
            'address.country' => 'string|max:255',
            'address.zip' => 'string|regex:/^\d{2}-\d{3}$/',
        ];
    }
}
