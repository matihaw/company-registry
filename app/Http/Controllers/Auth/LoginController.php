<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\Auth\Login;
use App\Service\UserService;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

final readonly class LoginController
{
    public function __construct(
        private UserService $userService
    ) {
    }

    public function __invoke(Login $request): JsonResponse
    {
        $user = $this->userService->login($request->toDto());

        if (!$user) {
            throw new NotFoundHttpException('You have entered an invalid username or password');
        }

        return response()->json([
            'user' => $user,
            'token' => $user->createToken($request->validated('email'))->plainTextToken,
        ]);
    }

}
