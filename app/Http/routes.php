<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/events',['uses'=>'EventController@getAll','as'=>'events']);
Route::get('/event/search',['uses'=>'SearchController@get','as'=>'event.search']);
//Route::get('/event/search?=event',['uses'=>'SearchController@get','as'=>'event.searching']);

Route::post('/event/{event_id}',['uses'=>'EventController@prijava','as'=>'prijava']);
Route::get('/event/{event_id}',['uses'=>'EventController@getSingle','as'=>'single_event']);

Route::auth();
Route::group(['middleware'=>'admin'],function(){
    Route::resource('admin/users', 'AdminUserController');
    Route::resource('admin/events', 'AdminEventsController');
});


Route::get('/home', 'HomeController@index');
