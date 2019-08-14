<?php

Route::get('/', 'DogAlert@show');
Route::post('/','DogAlert@addAlerts');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
