<?php

namespace App\Service;

use App\DataTransferObjects\EmployeeDto;
use App\Filters\Employee\Email;
use App\Filters\Employee\FirstName;
use App\Filters\Employee\LastName;
use App\Filters\Employee\Phone;
use App\Models\Company;
use App\Models\Employee;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pipeline\Pipeline;

final readonly class EmployeeService
{
    /**
     * @return Collection<int, Employee>
     */
    public function getCompanyEmployees(Company $company): Collection
    {
        return app(Pipeline::class)
            ->send($company->employees())
            ->through([
                FirstName::class,
                LastName::class,
                Email::class,
                Phone::class,
            ])
            ->thenReturn()
            ->get();
    }

    public function store(Company $company, EmployeeDto $data): void
    {
        $company->employees()->create($data->toArray());
    }

    public function update(Employee $employee, EmployeeDto $data): Employee
    {
        $employee->update($data->toArray());

        return $employee;
    }

    public function delete(Employee $employee): bool
    {
        return !!$employee->delete();
    }
}
