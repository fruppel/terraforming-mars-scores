<?php
Route::get('/', function () {
    return redirect(route('games.index'));
});

Auth::routes();

Route::resource('/games', 'GameController')->middleware('auth');
Route::get('/games/{game}/calculate', 'GameController@calculate')->name('games.calculate')->middleware('auth');
Route::resource('/players', 'PlayerController')->middleware('auth');
Route::resource('/games/{game}/scores', 'ScoreController')->middleware('auth');
