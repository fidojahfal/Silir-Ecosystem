<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainController;
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
Route::get('/', [MainController::class, 'index'])->middleware('auth.api')->name('main');

Route::get('/event', [MainController::class, 'index'])->middleware('auth.api')->name('main.event');

Route::get('/pariwisata', [MainController::class, 'index'])->middleware('auth.api')->name('main.pariwisata');

Route::get('/hotel', [MainController::class, 'index'])->middleware('auth.api')->name('main.hotel');

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'performLogin'])->name('login.perform');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'performRegister'])->name('register.perform');
