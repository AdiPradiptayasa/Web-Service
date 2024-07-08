<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MapsController;
use App\Http\Controllers\BengkelController;
use App\Http\Controllers\WebLoginController;
use App\Http\Controllers\Auth\ResetController;
use App\Http\Controllers\Auth\SignInController;
use App\Http\Controllers\Auth\SignUpController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');


Route::prefix('signIn')->group(function (){
    Route::get('/', [SignInController::class, 'index'])->name('signIn');
    Route::post('/login', [SignInController::class, 'login'])->name('web.login');
});

Route::prefix('signUp')->group(function (){
    Route::get('/', [SignUpController::class, 'index'])->name('signUp');
    Route::post('/register', [SignUpController::class, 'register'])->name('web.register');
});

Route::get('forgot-password', function () {
    return view('auth.forgotPassword');
})->name('forgot-password');

Route::post('forgot-password', [ResetController::class, 'sendResetLinkEmail'])->name('password.email');

Route::get('reset-password', function () {
    return view('auth.resetPassword');
})->name('reset-password');

Route::post('reset-password', [ResetController::class, 'resetPassword'])->name('password.reset');

Route::resource('backpages', BengkelController::class);
Route::resource('maps_backpage', MapsController::class);