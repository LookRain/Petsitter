<?php

Route::get('/', 'PostsController@index');


Auth::routes();
Route::post('post/{post}/accept', 'ContractsController@store');
Route::post('post/{post}/bid', 'BidsController@store');

Route::get('/home', 'PostsController@index');

Route::get('/user/{user}', 'ProfileController@index');

Route::get('post', 'PostsController@index');

Route::get('post/new', 'PostsController@create');
Route::get('post/{post}', 'PostsController@show');

Route::post('post/new', 'PostsController@store');

Route::get('/pet/new', 'PetsController@create');
Route::post('/pet/new', 'PetsController@store');

Route::get('/contract', 'ContractsController@index');
