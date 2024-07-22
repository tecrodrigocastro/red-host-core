<?php

use App\Http\Controllers\API\Client\AuthController;
use App\Http\Controllers\HostingAccountController;
use App\Http\Controllers\Invoices\InvoiceController;
use App\Http\Controllers\Plans\PlanController;
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


Route::prefix('plans')->group(function () {
    Route::get('/', [PlanController::class, 'index']);
    Route::post('/', [PlanController::class, 'store']);
    Route::get('/{id}', [PlanController::class, 'show']);
    Route::put('/{id}', [PlanController::class, 'update']);
    Route::delete('/{id}', [PlanController::class, 'destroy']);
});

Route::prefix('invoices')->group(function () {
    Route::get('/{client_id}', [InvoiceController::class, 'index']);
    Route::post('/', [InvoiceController::class, 'store']);
    Route::get('/{id}', [InvoiceController::class, 'show']);
    Route::put('/{id}', [InvoiceController::class, 'update']);
    Route::delete('/{id}', [InvoiceController::class, 'destroy']);
});
