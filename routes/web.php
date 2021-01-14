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

require __DIR__.'/auth.php';


Route::get('/dashboard','\App\Http\Controllers\EventController@dashboard')->middleware(['auth'])->name('dashboard');
Route::post('/events/{event}/observe','\App\Http\Controllers\EventController@observe')->middleware(['auth'])->name('events.observe');
Route::get('/events/{event}/unobserve','\App\Http\Controllers\EventController@unobserve')->middleware(['auth'])->name('events.unobserve');
Route::get('/events/{event}/buy','\App\Http\Controllers\EventController@buy')->middleware(['auth'])->name('events.buy');
Route::resource('/events',\App\Http\Controllers\EventController::class);
Route::get('/events/create/','\App\Http\Controllers\EventController@create')->middleware(['auth'])->name('events.create');
Route::post('/events','\App\Http\Controllers\EventController@store')->middleware(['auth'])->name('events.store');
Route::get('/events/{event}/edit','\App\Http\Controllers\EventController@edit')->middleware(['auth','event.owner'])->name('events.edit');
Route::put('/events/{event}','\App\Http\Controllers\EventController@update')->middleware(['auth','event.owner'])->name('events.update');
Route::delete('/events/{event}','\App\Http\Controllers\EventController@destroy')->middleware(['auth','event.owner'])->name('events.destroy');

Route::name('debug.')->prefix('debug')->group(function() {
    Route::get('/', function () {
        return view('debug.index');
    })->name('index');

    Route::get('/test-shortTabBig', function () {
        return view('debug.test-shortTabBig');
    })->name('test-shortTabBig');

    Route::get('/test-shortTabSmall', function () {
        return view('debug.test-shortTabSmall');
    })->name('test-shortTabSmall');

    Route::get('/test-sideTab', function () {
        return view('debug.test-sideTab');
    })->name('test-sideTab');

    // ...Add more...
});
