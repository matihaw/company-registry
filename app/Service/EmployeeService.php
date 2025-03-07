<?php

namespace App\Service;

use App\DataTransferObjects\EmployeeDto;
use App\Models\Company;
use App\Models\Employee;
use Illuminate\Database\Eloquent\Collection;

final readonly class EmployeeService
{
    /**
     * @return Collection<int, Employee>
     */
    public function getCompanyEmployees(Company $company): Collection
    {
        return $company->employees()->get();
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
