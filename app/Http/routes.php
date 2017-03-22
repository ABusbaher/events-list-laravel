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


//POČETNA STRANA
Route::get('/events',['uses'=>'EventController@getAll','as'=>'events']);


Route::get('/event/search',['uses'=>'SearchController@get','as'=>'event.search']);
Route::get('/event/{event_id}',['uses'=>'EventController@getSingle','as'=>'single_event']);
Route::post('/event/{event_id}',['uses'=>'EventController@prijava','as'=>'prijava']);

//SAMO ULOGOVANI SA ROLOM SUBCRIBER
Route::group(['middleware'=>'subscriber'],function(){
    Route::get('/user/{id}',['uses'=>'UserController@getUser','as'=>'user']);
});

Route::auth();
//SAMO ULOGOVANI SA ROLOM ADMINISTRATOR
Route::group(['middleware'=>'admin'],function(){
    Route::resource('admin/users', 'AdminUserController');
    Route::resource('admin/events', 'AdminEventsController');
});


Route::get('/home', 'HomeController@index');
