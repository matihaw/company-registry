<?php

use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Response;

Route::fallback(function () {
    return response(status: Response::HTTP_NOT_FOUND);
});
