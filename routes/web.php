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
Route::post('/doreg','App\Http\Controllers\AuthController@doRegister');
Route::post('/dologin','App\Http\Controllers\AuthController@login');
Route::get('/dologout','App\Http\Controllers\AuthController@logout');
Route::get('/artists','App\Http\Controllers\front\HomeController@artists');
Route::get('/artists/{name}','App\Http\Controllers\front\HomeController@artist_detail');

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
    Route::post('/roster/insert','App\Http\Controllers\back\RosterController@insertRoster');
    Route::get('/roster/edit/{id}','App\Http\Controllers\back\RosterController@editRoster');
    Route::get('/roster/remove/image/{id}','App\Http\Controllers\back\RosterController@removePhoto');
    Route::post('/roster/update/{id}','App\Http\Controllers\back\RosterController@updateRoster');
    Route::get('/roster/delete/{id}','App\Http\Controllers\back\RosterController@deleteRoster');

    Route::get('/banner','App\Http\Controllers\back\BannerController@index');
    Route::get('/banner/load','App\Http\Controllers\back\BannerController@loadBanner');
    Route::get('/banner/create','App\Http\Controllers\back\BannerController@create');
    Route::post('/banner/insert','App\Http\Controllers\back\BannerController@insert');
    Route::get('/banner/edit/{id}','App\Http\Controllers\back\BannerController@edit');
    Route::post('/banner/update/{id}','App\Http\Controllers\back\BannerController@update');
    Route::get('/banner/delete/{id}','App\Http\Controllers\back\BannerController@deleteBanner');
    Route::get('/banner/active/{id}','App\Http\Controllers\back\BannerController@active');
    Route::get('/banner/priority/{id}','App\Http\Controllers\back\BannerController@priority');
    Route::get('/banner/remove/image/{id}','App\Http\Controllers\back\BannerController@removePhoto');

    Route::get('/release','App\Http\Controllers\back\ReleaseController@release_index');
    Route::get('/release/load','App\Http\Controllers\back\ReleaseController@loadRelease');
    Route::get('/release/create','App\Http\Controllers\back\ReleaseController@createRelease');
    Route::post('/release/insert','App\Http\Controllers\back\ReleaseController@insertRelease');

    Route::get('/invoice','App\Http\Controllers\InvoiceController@index');
    Route::get('/invoice/load','App\Http\Controllers\InvoiceController@loadInvoice');
    Route::get('/invoice/create','App\Http\Controllers\InvoiceController@create');
});
