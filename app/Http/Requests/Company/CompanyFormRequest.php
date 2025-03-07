<?php

namespace App\Http\Requests\Company;

use App\DataTransferObjects\CompanyAddressDto;
use App\DataTransferObjects\CompanyDto;
use Illuminate\Foundation\Http\FormRequest;

abstract class CompanyFormRequest extends FormRequest
{
    public function toDto(): CompanyDto
    {
        return new CompanyDto(
            name: $this->string('name'),
            nip: $this->integer('nip'),
            address: new CompanyAddressDto(
                city: $this->string('address.city'),
                street: $this->string('address.street'),
                country: $this->string('address.country'),
                zip: $this->string('address.zip'),
            ),
        );
    }

    public function authorize(): bool
    {
        return true;
    }
}
