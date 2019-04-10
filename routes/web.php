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
    return redirect(route('games.index'));
});

Auth::routes();

Route::resource('/games', 'GameController')->middleware('auth');
Route::get('/games/{game}/calculate', 'GameController@calculate')->name('games.calculate')->middleware('auth');
Route::resource('/players', 'PlayerController')->middleware('auth');
Route::resource('/games/{game}/scores', 'ScoreController')->middleware('auth');
