<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\UserController as AuthUserController;
use App\Http\Controllers\UserController as UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('auth')->group(function () {
    Route::post('login', [LoginController::class, 'index']);
});

Route::controller(UserController::class)->prefix('user')->group(function () {
    Route::post('register', 'store');
});

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/auth/user', [AuthUserController::class, 'index']);
});
