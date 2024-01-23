<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ParticipantController;


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
// Route::get('/', function () {
//     return view('participants.index');
// });
Route::get('/', function () {
    return view('events.index');
});
Route::resource('events',EventController::class);
Route::post('/events/storePart', [EventController::class, 'storeParticipant'])->name('events.storeParticipant');
Route::resource('participants',ParticipantController::class);
Route::delete('events/participants/{id}', [EventController::class, 'destroyParticipant'])->name('events.destroyParticipant');
Route::put('events/participants/{id}', [EventController::class, 'updateParticipant'])->name('events.updateParticipant');
