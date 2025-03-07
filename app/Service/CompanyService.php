<?php

namespace App\Service;

use App\DataTransferObjects\CompanyDto;
use App\Models\Company;
use Illuminate\Contracts\Pagination\Paginator;

final readonly class CompanyService
{
    /**
     * @return Paginator<Company>
     */
    public function getPaginated(int $perPage): Paginator
    {
        return Company::with('address')->simplePaginate($perPage);
    }

    public function store(CompanyDto $data): Company
    {
        $company = Company::create($data->toArray());
        $company->address()->updateOrCreate(
            $data->getAddress()->toArray(),
        );

        return $company->load('address');
    }

    public function update(Company $company, CompanyDto $data): Company
    {
        $company->update($data->toArray());
        $company->address()->update($data->getAddress()->toArray());

        return $company->load('address');
    }

    public function delete(Company $company): bool
    {
        return !!$company->delete();
    }
}
