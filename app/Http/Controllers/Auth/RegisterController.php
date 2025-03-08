<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\Auth\Register;
use App\Service\UserService;
use Illuminate\Http\JsonResponse;

final readonly class RegisterController
{
    public function __construct(
        private UserService $userService
    ) {
    }

    public function __invoke(Register $request): JsonResponse
    {
        $user = $this->userService->register($request->toDto());

        return response()->json([
            'user' => $user,
        ]);
    }

}
