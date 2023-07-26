<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

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

Route::group(['middleware' => 'auth.api'], function () {

    Route::get('/', [MainController::class, 'index'])->name('main');
    Route::get('/event', [MainController::class, 'event'])->name('main.event');
    Route::get('/pariwisata', [MainController::class, 'pariwisata'])->name('main.pariwisata');
    Route::get('/hotel', [MainController::class, 'hotel'])->name('main.hotel');

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::group(['middleware' => 'auth.admin', 'prefix' => 'admin'], function () {

        Route::get('/', [AdminController::class, 'index'])->name('admin');
        Route::get('/event', [AdminController::class, 'event'])->name('admin.event');
        Route::get('/pariwisata', [AdminController::class, 'pariwisata'])->name('admin.pariwisata');
        Route::get('/hotel', [AdminController::class, 'hotel'])->name('admin.hotel');
        Route::get('/parkir', [AdminController::class, 'parkir'])->name('admin.parkir');
    });
});

Route::group(['middleware' => 'auth.guest'], function () {

    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'performLogin'])->name('login.perform');
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'performRegister'])->name('register.perform');

});
