<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;

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
})->name('home');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::get('/log', function(){
    return view('auth.choose');
})->name('log');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/user/login', function () {
    return view('auth.userlogin');
})->name('user.login');


Route::middleware('checkRole:admin')->controller(AdminController::class)->group(function () {
    Route::get('/admin/dashboard', 'stats')->name('admin.dashboard');

    //user
    Route::get('/admin/dashboard/user', 'users')->name('admin.user');
    // Route::get('/admin/dashboard/user/edit/{id}', 'editUser')->name('admin.user.edit');
    // Route::post('/admin/dashboard/user/edit/{id}/action','updateUser')->name('admin.user.update');
    Route::post('/admin/dashboard/user/delete/{id}/action', 'deleteUser')->name('admin.user.delete');

    //order
    Route::get('/admin/dashboard/order', 'orders')->name('admin.order');
    Route::get('/admin/dashboard/order/add', 'viewOrder')->name('admin.order.add');
    Route::post('/admin/dashboard/order/add/action', 'saveOrder')->name('admin.order.save');

    Route::get('/admin/dashboard/order/edit/{id}', 'editOrder')->name('admin.order.edit');
    Route::post('/admin/dashboard/order/edit/{id}/action','updateOrder')->name('admin.order.update');

    Route::post('/admin/dashboard/order/delete/{id}/action', 'deleteOrder')->name('admin.order.delete');
});

Route::middleware('checkRole:user')->controller(AdminController::class)->group(function () {
    Route::get('/user/order/add', 'userViewOrder')->name('user.order.add');
    Route::post('/user/order/add/action', 'userSaveOrder')->name('user.order.save');
});


Route::controller(AuthController::class)->group(function(){
    Route::post('/register/action','registerAction')->name('register.action');

    Route::post('/login/action','loginAction')->name('login.action');

    Route::post('/login/user/action','userloginAction')->name('user.login.action');

    Route::get('/logout','logout')->name('logout');
});
