<?php

Route::group(['domain' => '{tenant}.'.env('APP_DOMAIN'), 'middleware' => 'web'], function(){
	Route::get('', 'UserController@index')->name('index');
	Route::post('/store', 'UserController@store')->name('store');
	Route::get('/edit/{id}', 'UserController@edit')->name('edit');
	Route::put('/edit/{id}', 'UserController@update')->name('update');
	Route::get('/delete/{id}', 'UserController@delete')->name('delete');
	Route::post('/upload', 'UserController@upload')->name('upload');
});


Route::get('/', function () {
    return view('welcome');
})->name('home');
