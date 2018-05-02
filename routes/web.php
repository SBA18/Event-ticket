<?php

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

Route::get('/', 'WelcomeController@index'); // public

Route::get('event/{event}', 'WelcomeController@event')->name('event_show'); // public


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home'); //private locked


Route::resource('salles', 'SallesController');  //private

Route::resource('events', 'EventsController'); //rpivate

Route::resource('types', 'EventTypesController'); //private

Route::get('ticket/create/{event}', 'TicketsController@create')->name('create_ticket'); //public
Route::post('ticket/{event}', 'TicketsController@store')->name('store_ticket'); //public
Route::get('ticket/{ticket}', 'TicketsController@show')->name('show_ticket'); //public
Route::get('tickets', 'TicketsController@index')->name('tickets'); //private


Route::get('user/tickets', 'UsersController@tickets')->name('user_tickets'); //public

Route::get('check-in', 'TicketsController@checkIn')->name('check-in'); // private POS

Route::put('check-in', 'TicketsController@checkInPost')->name('checkInPost'); // private POS

Route::get('paiements/{ticket}/create', 'PaiementsController@create')->name('showPaiementForm'); // Private
Route::post('paiements/{ticket}', 'PaiementsController@store')->name('paiements_store'); //private