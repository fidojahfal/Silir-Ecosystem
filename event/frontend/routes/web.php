<?php

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

// Route::get('/', function () {
//     return view('index');
// });

Route::get('/eo/events', 'App\Http\Controllers\EventController@index')->name('event.index');
Route::get('/eo/events/create', 'App\Http\Controllers\EventController@create')->name('event.create');
Route::post('/eo/events/store', 'App\Http\Controllers\EventController@store')->name('event.store');
Route::get('/eo/events/edit/{id}', 'App\Http\Controllers\EventController@edit')->name('event.edit');
Route::put('/eo/events/update/{id}', 'App\Http\Controllers\EventController@update')->name('event.update');
Route::get('/eo/events/delete/{id}', 'App\Http\Controllers\EventController@destroy')->name('event.destroy');

Route::get('/', 'App\Http\Controllers\IndexController@index')->name('index');
Route::get('/area', 'App\Http\Controllers\AreaController@index')->name('area');
Route::get('/stand', 'App\Http\Controllers\StandController@index')->name('stand');
Route::get('/make_event', 'App\Http\Controllers\EventController@selectTanggal')->name('pick_date_for_event');
Route::post('/make_event', 'App\Http\Controllers\EventController@availableAreas')->name('pick_date');
Route::get('/booking', 'App\Http\Controllers\EventController@booking')->name('booking')->middleware('auth.api');
Route::post('/booking/store', 'App\Http\Controllers\EventController@bookingStore')->name('booking.store');
Route::post('/booking/check', 'App\Http\Controllers\EventController@checkAvailability')->name('booking.check');
Route::get('/gallery', 'App\Http\Controllers\IndexController@gallery')->name('gallery');
Route::get('/contact', 'App\Http\Controllers\IndexController@contact')->name('contact');
Route::get("/gagal_booking", function(){
    return view('gagal_booking');
});
Route::get("/my_event", function(){
    return view('check_my_event');
 })->name('event.user')->middleware('auth.api');
Route::post('/my_event', 'App\Http\Controllers\EventController@myEvent')->name('myEvent');
Route::post('/myEvent_updateStatus/{id}', 'App\Http\Controllers\EventController@myEvent_updateStatus')->name('myEvent_updateStatus');
Route::get('/event/{id}', 'App\Http\Controllers\EventController@detailEvent')->name('event.detail');
Route::post('/event/update/{id}', 'App\Http\Controllers\EventController@updateEvent')->name('event.updated');
Route::get('/event/detail/{id}', 'App\Http\Controllers\EventController@detailEvent2')->name('event.detail2');

Route::get('/stand/register', 'App\Http\Controllers\StandController@create')->name('stand.register')->middleware('auth.api');
Route::post('/stand/store', 'App\Http\Controllers\StandController@store')->name('stand.store');
Route::get("/check_my_stand", function(){
    return view('stand.check_my_stand');
})->middleware('auth.api');
Route::post('/my_stand', 'App\Http\Controllers\StandController@myStand')->name('myStand');
Route::get("/my_stand", function(){
    return view('stand.my_stand');
})->name('stand.user');
Route::get('/stand/billing/{id}', 'App\Http\Controllers\StandController@billingStand')->name('stand.billing');
Route::post('/stand/updateStatus/{id}', 'App\Http\Controllers\StandController@myStand_updateStatus')->name('myStand_updateStatus');
Route::get('/stand/edit/{id}', 'App\Http\Controllers\StandController@editStand')->name('stand.edit');
Route::post('/stand/update/{id}', 'App\Http\Controllers\StandController@updateStand')->name('stand.update');

Route::get('/upcoming_event', 'App\Http\Controllers\EventController@upcomingEvent')->name('upcoming_event')->middleware('auth.api');
Route::get('/tiket/{id}', 'App\Http\Controllers\TiketController@beli')->name('tiket.beli')->middleware('auth.api');
Route::post('/tiket/checkout', 'App\Http\Controllers\TiketController@checkout')->name('tiket.checkout');
Route::get("/tiket_user", function(){
    return view('tiket_user');
})->name('tiket.user');
Route::get("/check_my_ticket", function(){
    return view('check_my_ticket');
})->middleware('auth.api');
Route::post('/tiket_user', 'App\Http\Controllers\TiketController@tiketUser')->name('tiketUser');

Route::get('/dashboard/events', 'App\Http\Controllers\DashboardController@event')->name('dashboard.event')->middleware(['auth.api', 'auth.admin']);
Route::get('/dashboard/areas', 'App\Http\Controllers\DashboardController@area')->name('dashboard.area')->middleware(['auth.api', 'auth.admin']);
Route::get('/dashboard/stands', 'App\Http\Controllers\DashboardController@stand')->name('dashboard.stand')->middleware(['auth.api', 'auth.admin']);
Route::get('/dashboard/histori', 'App\Http\Controllers\DashboardController@histori')->name('dashboard.histori')->middleware(['auth.api', 'auth.admin']);
Route::post('/dashboard/histori', 'App\Http\Controllers\DashboardController@historiStore')->name('histori.store');
Route::get('/dashboard/ticket', 'App\Http\Controllers\DashboardController@ticket')->name('dashboard.tiket');
Route::get('/dashboard/ticket/confirm/{id}', 'App\Http\Controllers\DashboardController@confirmTicket')->name('dashboard.tiket.confirm')->middleware(['auth.api', 'auth.admin']);
Route::get('/event/billing/{id}', 'App\Http\Controllers\EventController@billing_myEvent')->name('event.billing');