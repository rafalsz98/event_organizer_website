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

Route::name('events.')->prefix('events')->middleware('auth')->group(function(){

    Route::post('{event}/observe','\App\Http\Controllers\EventController@observe')->name('observe');
    Route::get('{event}/unobserve','\App\Http\Controllers\EventController@unobserve')->name('unobserve');
    Route::get('{event}/buy','\App\Http\Controllers\EventController@buy')->name('buy');
    Route::get('create/','\App\Http\Controllers\EventController@create')->name('create');
    Route::post('','\App\Http\Controllers\EventController@store')->name('store');
    Route::get('{event}/ticket','\App\Http\Controllers\EventController@ticket')->name('ticket');

    Route::middleware('event.owner')->group(function(){
        Route::get('/{event}/edit','\App\Http\Controllers\EventController@edit')->name('edit');
        Route::put('/{event}','\App\Http\Controllers\EventController@update')->name('update');
        Route::delete('/{event}','\App\Http\Controllers\EventController@destroy')->name('destroy');
    });
});

Route::resource('/events',\App\Http\Controllers\EventController::class)->only(['index', 'show']);


Route::name('debug.')->prefix('debug')->group(function() {
    Route::get('/', function () {
        return view('debug.index');
    })->name('index');

    Route::get('/test-eventTab-calendar', function () {
        return view('debug.test-eventTab-calendar');
    })->name('test-eventTab-calendar');

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
