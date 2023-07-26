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
Route::get('/','App\Http\Controllers\front\HomeController@index');
Route::get('/register','App\Http\Controllers\AuthController@register');
Route::get('/login','App\Http\Controllers\AuthController@index');
Route::post('/doreg','App\Http\Controllers\LoginController@doRegister');
Route::post('/dologin','App\Http\Controllers\AuthController@login');
Route::get('/dologout','App\Http\Controllers\AuthController@logout');

Route::middleware(['user-access'])->group(function () {
    Route::get('/dashboard','App\Http\Controllers\DashboardController@index');
    Route::get('/genre','App\Http\Controllers\back\GenreController@index');
    Route::get('/genre/load','App\Http\Controllers\back\GenreController@loadDataGenre');
    Route::get('/genre/{id}','App\Http\Controllers\back\GenreController@edit');
    Route::post('/genre/create','App\Http\Controllers\back\GenreController@create');
    Route::post('/genre/update/{id}','App\Http\Controllers\back\GenreController@update');
    Route::get('/genre/delete/{id}','App\Http\Controllers\back\GenreController@destroy');

    Route::get('/ticket','App\Http\Controllers\back\TicketController@index');
    Route::get('/ticket/load','App\Http\Controllers\back\TicketController@loadDataTicket');
    Route::post('/ticket/create','App\Http\Controllers\back\TicketController@createTicket');
    Route::get('/ticket/edit/{id}','App\Http\Controllers\back\TicketController@editTicket');
    Route::post('/ticket/update/{id}','App\Http\Controllers\back\TicketController@updateTicket');
    Route::get('/ticket/delete/{id}','App\Http\Controllers\back\TicketController@deleteTicket');
    Route::get('/generate/{id}','App\Http\Controllers\back\TicketController@generate');
    Route::get('/verify/{id}/{status}','App\Http\Controllers\back\TicketController@verify');
    Route::get('/scan','App\Http\Controllers\back\TicketController@scanner_page');
    Route::get('/scan/{id}','App\Http\Controllers\back\TicketController@scan_ticket');

    Route::get('/roster','App\Http\Controllers\back\RosterController@index');
    Route::get('/roster/load','App\Http\Controllers\back\RosterController@loadRoster');
    Route::get('/roster/create','App\Http\Controllers\back\RosterController@create');
    Route::post('/roster/insert','App\Http\Controllers\back\RosterController@insert');
});
