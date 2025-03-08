<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\Auth\Login;
use App\Service\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

final readonly class LogoutController
{
    public function __invoke(Request $request): JsonResponse
    {
        $request->user()->tokens()->delete();

        return response()->json([
            "success" => true,
        ]);
    }

}
