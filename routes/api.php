<?php

use App\Http\Controllers\API\Client\AuthController;
use App\Http\Controllers\HostingAccountController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/* Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum'); */

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

Route::prefix('hosting-accounts')->group(function () {
    Route::get('/', [HostingAccountController::class, 'index']);
    Route::post('/', [HostingAccountController::class, 'store']);
    Route::get('/{id}', [HostingAccountController::class, 'show']);
    Route::put('/{id}', [HostingAccountController::class, 'update']);
    Route::delete('/{id}', [HostingAccountController::class, 'destroy']);
    Route::get('/client/{clientId}', [HostingAccountController::class, 'showByClient']);
});
