<?php

namespace App\Http\Requests\Company;

final class Store extends CompanyFormRequest
{
    /**
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'nip' => 'required|numeric|digits:10',
            'address' => 'required|array',
            'address.city' => 'required|string|max:255',
            'address.street' => 'required|string|max:255',
            'address.country' => 'required|string|max:255',
            'address.zip' => 'required|string|regex:/^\d{2}-\d{3}$/',
        ];
    }
}
