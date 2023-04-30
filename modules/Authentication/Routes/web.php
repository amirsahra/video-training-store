<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Modules\Authentication\Http\Controllers\AuthenticationController;

Route::prefix('auth')->middleware('guest')->group(function () {
    Route::get('/', [AuthenticationController::class, 'index'])
        ->name('auth');
    Route::get('/reset-password/{token}', [AuthenticationController::class, 'resetPassword'])
        ->name('password.reset');
});

Route::middleware('auth:web')->group(function () {
    Route::get('logout', [AuthenticationController::class, 'logout'])
        ->name('logout');
});

Route::get('tt',function (){
    dd(Config::get('authentication'));
});
