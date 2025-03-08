<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;

Route::apiResource('companies', CompanyController::class)
    ->middleware('auth:sanctum');

Route::apiResource('companies.employees', EmployeeController::class)
    ->middleware('auth:sanctum')
    ->shallow();

Route::post('/register', RegisterController::class);
Route::post('/login', LoginController::class);
Route::post('/logout', LogoutController::class)
    ->middleware('auth:sanctum');
