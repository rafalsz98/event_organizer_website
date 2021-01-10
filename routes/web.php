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

Route::get('/', function () {
    return view('events');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::resource('events',\App\Http\Controllers\EventController::class);
Route::get('/events/create/','\App\Http\Controllers\EventController@create')->middleware(['auth'])->name('events.create');
Route::post('/events','\App\Http\Controllers\EventController@store')->middleware(['auth'])->name('events.store');
Route::get('/events/{event}/edit','\App\Http\Controllers\EventController@edit')->middleware(['auth','event.owner'])->name('events.edit');
Route::put('/events/{event}','\App\Http\Controllers\EventController@update')->middleware(['auth','event.owner'])->name('events.update');
Route::delete('/events/{event}','\App\Http\Controllers\EventController@destroy')->middleware(['auth','event.owner'])->name('events.destroy');

Route::get('debug', [\App\Http\Controllers\DebugController::class, 'index']);
