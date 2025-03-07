<?php

namespace App\Http\Controllers;

use App\Http\Requests\Company\Store;
use App\Http\Requests\Company\Update;
use App\Models\Company;
use App\Service\CompanyService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\Response as SymfonyResponse;

final readonly class CompanyController
{
    public function __construct(private CompanyService $companyService)
    {
    }

    public function index(): JsonResponse
    {
        return response()->json(
            $this->companyService->getPaginated(15)
        );
    }

    public function show(Company $company): JsonResponse
    {
        return response()->json(
            $company
        );
    }

    public function store(Store $request): JsonResponse
    {
        return response()->json(
            $this->companyService->store($request->toDto())
        );
    }

    public function update(Update $request, Company $company): JsonResponse
    {
        return response()->json(
            $this->companyService->update($company, $request->toDto())
        );
    }

    public function destroy(Company $company): Response
    {
        return $this->companyService->delete($company)
            ? response(status: SymfonyResponse::HTTP_OK)
            : response(status: SymfonyResponse::HTTP_INTERNAL_SERVER_ERROR);
    }
}
