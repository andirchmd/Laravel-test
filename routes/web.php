<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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
});

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/user/login', function () {
    return view('auth.userlogin');
})->name('user.login');

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');

Route::controller(AuthController::class)->group(function(){
    Route::post('/register/action','registerAction')->name('register.action');

    Route::post('/login/action','loginAction')->name('login.action');

    Route::post('/login/user/action','userloginAction')->name('user.login.action');

    Route::get('/logout','logout')->name('logout');
});
