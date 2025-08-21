<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\PasswordResetController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();

Route::post('/login', [AuthController::class, 'login']);

Route::post('forgot-password', [PasswordResetController::class, 'sendResertLink']);
Route::post('reset-password', [PasswordResetController::class, 'reset']);

Route::middleware(['auth:sanctum', 'role:admin'])->group(function () {
    Route::get('/admin-dashboard', function() {
        return 'Panel de Administrador';
    });
});

Route::middleware(['auth:sanctum', 'role:user'])->group(function () {
    Route::get('/profile', function () {
        return 'Tu perfil de usuario';
    });
});




});
