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

Route::get('/events/manage', 'CalendarEventsController@getManage');
Route::get('/events/list', 'CalendarEventsController@getList');
Route::resource('/events', 'CalendarEventsController');

Route::resource('/locations', 'LocationsController');
