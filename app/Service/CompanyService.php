<?php

namespace App\Service;

use App\DataTransferObjects\CompanyDto;
use App\Filters\Company\Address\City;
use App\Filters\Company\Address\Country;
use App\Filters\Company\Address\Street;
use App\Filters\Company\Address\Zip;
use App\Filters\Company\Name;
use App\Filters\Company\Nip;
use App\Filters\TextFilter;
use App\Models\Company;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Pipeline\Pipeline;

final readonly class CompanyService
{
    /**
     * @return Paginator<Company>
     */
    public function getPaginated(int $perPage): Paginator
    {
        return app(Pipeline::class)
            ->send(Company::query())
            ->through([
                Name::class,
                Nip::class,
                City::class,
                Street::class,
                Zip::class,
                Country::class,
            ])
            ->thenReturn()
            ->simplePaginate($perPage);
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
