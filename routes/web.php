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


Route::redirect('/', '/events');

require __DIR__.'/auth.php';


Route::get('/dashboard','\App\Http\Controllers\EventController@dashboard')->middleware(['auth'])->name('dashboard');
Route::resource('/events',\App\Http\Controllers\EventController::class)->only(['index', 'show', 'create']);
Route::post('/events/{event}/observe','\App\Http\Controllers\EventController@observe')->middleware(['auth'])->name('events.observe');
Route::get('/events/{event}/unobserve','\App\Http\Controllers\EventController@unobserve')->middleware(['auth'])->name('events.unobserve');
Route::get('/events/{event}/buy','\App\Http\Controllers\EventController@buy')->middleware(['auth'])->name('events.buy');
Route::get('/events/create/','\App\Http\Controllers\EventController@create')->middleware(['auth'])->name('events.create');
Route::post('/events','\App\Http\Controllers\EventController@store')->middleware(['auth'])->name('events.store');
Route::get('/events/{event}/edit','\App\Http\Controllers\EventController@edit')->middleware(['auth','event.owner'])->name('events.edit');
Route::put('/events/{event}','\App\Http\Controllers\EventController@update')->middleware(['auth','event.owner'])->name('events.update');
Route::delete('/events/{event}','\App\Http\Controllers\EventController@destroy')->middleware(['auth','event.owner'])->name('events.destroy');
Route::get('/events/{event}/ticket','\App\Http\Controllers\EventController@ticket')->middleware(['auth'])->name('events.ticket');

Route::name('debug.')->prefix('debug')->group(function() {
    Route::get('/', function () {
        return view('debug.index');
    })->name('index');

    Route::get('/test-eventTab-calendarTileBig', function () {
        return view('debug.test-eventTab-calendarTileBig');
    })->name('test-eventTab-calendarTileBig');

    Route::get('/test-eventTab-calendarTileSmall', function () {
        return view('debug.test-eventTab-calendarTileSmall');
    })->name('test-eventTab-calendarTileSmall');

    Route::get('/test-eventTab-eventTile', function () {
        return view('debug.test-eventTab-eventTile');
    })->name('test-eventTab-eventTile');

    Route::get('/test-navbar', function () {
        return view('debug.test-navbar');
    })->name('test-navbar');

    Route::get('/test-gallery', function () {
        return view('debug.test-gallery');
    })->name('test-gallery');

    Route::get('/ticket', function () {
    $pdf= PDF::loadView('ticket/ticketPDF', array(
            'name' => 'Top Gear Live',
            'datestart' => '12-11-1879 13:30',
            'duration' => '2h',
            'place' => 'AGH UST Cracow',
            'price' => '1600$',
            'email' => 'foo@bar'
        ));
        return $pdf->setPaper('a5', 'landscape')->download('ticket.pdf');
    })->name('ticket');

    Route::get('/map', function () {
        return view('debug.test-map');
    })->name('test-map');

    // ...Add more...
});
