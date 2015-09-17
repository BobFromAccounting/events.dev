<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'HomeController@showHome');

Route::resource('/auth', 'UsersController');

Route::get('/events/manage', 'CalendarEventsController@getManage');
Route::get('/events/list', 'CalendarEventsController@getList');
Route::resource('/events', 'CalendarEventsController');

Route::get('/login', 'HomeController@login');
Route::get('/signup', 'HomeController@signup');
Route::get('/consoles', 'HomeController@consoles');
Route::get('/genres', 'HomeController@genres');
Route::get('/create', 'HomeController@createEvent');