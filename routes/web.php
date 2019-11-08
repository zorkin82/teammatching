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

Route::get('/', function () {
    return view('layout');
});


Route::get('/player', 'PlayerController@index');
Route::post('/player', 'PlayerController@store');
Route::get('/player/create', 'PlayerController@create');
Route::get('/player/{player}', 'PlayerController@show');
Route::get('/player/{player}/edit', 'PlayerController@edit');
Route::put('/player/{player}', 'PlayerController@update');
Route::delete('/player/{player}', 'PlayerController@destroy');
Route::get('/player/{player}/delete', 'PlayerController@destroy');

Route::get('/game', 'GameController@index');
Route::get('/game/create', 'GameController@create');
Route::get('/game/{game}', 'GameController@show');
Route::get('/game/{game}/delete', 'GameController@destroy');

Route::post('/game/{game}/player', 'PlayerAssignmentController@store');
Route::put('/game/{game}/player', 'PlayerAssignmentController@update');
Route::delete('/game/{game}/player/{player}', 'PlayerAssignmentController@destroy');

Route::post('/teambalance', 'TeambalanceController@store');


