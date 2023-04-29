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

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Modules\Authentication\Http\Controllers\AuthenticationController;

Route::prefix('auth')->middleware('guest')->group(function () {
    Route::get('/', [AuthenticationController::class, 'index']);
    Route::get('/reset-password/{token}', function (string $token) {
        return view('auth.reset-password', ['token' => $token]);
    })->middleware('guest')->name('password.reset');
});

Route::middleware('auth:web')->group(function () {
    Route::get('logout',[AuthenticationController::class,'logout']);
});


Route::get('tt',function (){
    $data = array('name'=>"amir sahra");

    Mail::send(['text'=>'test'], $data, function($message) {
        $message->to('amirhosein.sahra@gmail.com', 'Tutorials Point')->subject
        ('Laravel Basic Testing Mail');
        $message->from('xyz@gmail.com','Virat Gandhi');
    });
    echo "Basic Email Sent. Check your inbox.";
});
