<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\MapController;
use App\Http\Controllers\API\BengkelController;
use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\Auth\RegisterController;
use App\Http\Controllers\Api\Auth\ResetPasswordController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('bengkel')->middleware('auth:sanctum')->group(function () {
    Route::get('/', [BengkelController::class, 'index']);
    Route::get('/{bengkel}', [BengkelController::class, 'show']);
    Route::post('/', [BengkelController::class, 'store']);
    Route::post('/{bengkel}/update', [BengkelController::class, 'update']);
    Route::delete('/{bengkel}', [BengkelController::class, 'destroy']);
});

Route::prefix('map')->middleware('auth:sanctum')->group(function () {
    Route::get('/', [MapController::class, 'index']);
    Route::get('/{map}', [MapController::class, 'show']);
    Route::post('/', [MapController::class, 'store']);
    Route::post('/{map}/update', [MapController::class, 'update']);
    Route::delete('/{map}', [MapController::class, 'destroy']);
});


Route::post('auth/register', RegisterController::class);
Route::post('auth/login', LoginController::class)->name('api.login');

Route::post('password/email', [ResetPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::post('password/reset', [ResetPasswordController::class, 'resetPassword'])->name('password.reset');
