<?php

use App\Http\Controllers\eventAPIController;
use App\Http\Controllers\areaAPIController;
use App\Http\Controllers\event_areaAPIController;
use App\Http\Controllers\standAPIController;
use App\Http\Controllers\histori_pengunjung_eventAPIController;
use App\Http\Controllers\ticketAPIController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/eo/events', [eventAPIController::class, 'index']);
Route::get('/eo/events/user/{email}', [eventAPIController::class, 'showByEmail']);
Route::get('/eo/events/upcoming', [eventAPIController::class, 'upcoming']);
Route::get('/eo/events/{id_event}', [eventAPIController::class, 'show']);
Route::post('/eo/events', [eventAPIController::class, 'store']);
Route::put('/eo/events/{id_event}', [eventAPIController::class, 'update']);
Route::delete('/eo/events/{id_event}', [eventAPIController::class, 'destroy']);
Route::get('/eo/checkAvailability/{waktu_start}/{waktu_end}', [eventAPIController::class, 'checkAvailability']);
Route::get('/eo/all_events', [eventAPIController::class, 'all']);

Route::get('/eo/areas', [areaAPIController::class, 'index']);
Route::get('/eo/areas/{id_area}', [areaAPIController::class, 'show']);
Route::post('/eo/areas', [areaAPIController::class, 'store']);
Route::put('/eo/areas/{id_area}', [areaAPIController::class, 'update']);
Route::delete('/eo/areas/{id_area}', [areaAPIController::class, 'destroy']);
Route::get('/eo/showAvailableAreas/{inputDate}', [areaAPIController::class, 'showAvailableAreas']);

Route::get('/eo/event_area', [event_areaAPIController::class, 'index']);
Route::get('/eo/event_area/{id_event}', [event_areaAPIController::class, 'show']);
Route::post('/eo/event_area', [event_areaAPIController::class, 'store']);
Route::put('/eo/event_area/update/{id_event}', [event_areaAPIController::class, 'update']);
Route::put('/eo/event_area/update/{id_event}/{id_area}', [event_areaAPIController::class, 'update']);
Route::delete('/eo/event_area/{id_event}/{id_area}', [event_areaAPIController::class, 'destroy']);

Route::get('/eo/stands', [standAPIController::class, 'index']);
Route::get('/eo/stands/user/{email}', [standAPIController::class, 'showByEmail']);
Route::get('/eo/stands/{id_stand}', [standAPIController::class, 'show']);
Route::post('/eo/stands', [standAPIController::class, 'store']);
Route::put('/eo/stands/{id_stand}', [standAPIController::class, 'update']);
Route::delete('/eo/stands/{id_stand}', [standAPIController::class, 'destroy']);

Route::get('/eo/histori', [histori_pengunjung_eventAPIController::class, 'index']);
Route::get('/eo/histori/{tiket_pengunjung}', [histori_pengunjung_eventAPIController::class, 'show']);
Route::post('/eo/histori', [histori_pengunjung_eventAPIController::class, 'store']);
Route::put('/eo/histori/{tiket_pengunjung}', [histori_pengunjung_eventAPIController::class, 'update']);
Route::delete('/eo/histori/{tiket_pengunjung}', [histori_pengunjung_eventAPIController::class, 'destroy']);

Route::get('/eo/ticket', [ticketAPIController::class, 'index']);
Route::get('/eo/ticket/user/{email}', [ticketAPIController::class, 'showByEmail']);
Route::get('/eo/ticket/{id}', [ticketAPIController::class, 'show']);
Route::post('/eo/ticket', [ticketAPIController::class, 'store']);
Route::put('/eo/ticket/{id}', [ticketAPIController::class, 'update']);
Route::delete('/eo/ticket/{id}', [ticketAPIController::class, 'destroy']);