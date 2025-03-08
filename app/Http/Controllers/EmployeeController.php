<?php

namespace App\Http\Controllers;

use App\Http\Requests\Employee\Store;
use App\Http\Requests\Employee\Update;
use App\Models\Company;
use App\Models\Employee;
use App\Service\EmployeeService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\Response as SymfonyResponse;

final readonly class EmployeeController
{
    public function __construct(private EmployeeService $employeeService)
    {
    }

    public function index(Company $company): JsonResponse
    {
        return response()->json(
            $this->employeeService->getCompanyEmployees($company)
        );
    }

    public function store(Company $company, Store $request): Response
    {
        $this->employeeService->store($company, $request->toDto());

        return response(status: SymfonyResponse::HTTP_CREATED);
    }

    public function show(Employee $employee): JsonResponse
    {
        $employee->load('company');

        return response()->json($employee);
    }

    public function update(Update $request, Employee $employee): JsonResponse
    {
        return response()->json(
            $this->employeeService->update($employee, $request->toDto())
        );
    }

    public function destroy(Employee $employee): Response
    {
        return $this->employeeService->delete($employee)
            ? response(status: SymfonyResponse::HTTP_OK)
            : response(status: SymfonyResponse::HTTP_INTERNAL_SERVER_ERROR);
    }
}
