<?php

Route::get('/', 'PostsController@index');


Auth::routes();
Route::post('post/{post}/accept', 'ContractsController@store');
Route::post('post/{post}/bid', 'BidsController@store');

Route::get('/home', 'PostsController@index');

Route::get('/user/edit', 'ProfileController@edit');
Route::get('/user/{user}', 'ProfileController@index');

Route::post('/user/edit', 'ProfileController@update');

Route::get('post', 'PostsController@index');

Route::get('post/new', 'PostsController@create');
Route::get('post/{post}', 'PostsController@show');

Route::post('post/new', 'PostsController@store');

Route::get('/pet/new', 'PetsController@create');
Route::post('/pet/new', 'PetsController@store');

Route::get('/contract', 'ContractsController@index');

Route::get('/admin', 'AdminController@index');

Route::get('/admin/user', 'AdminController@editUser');
Route::post('/admin/user/delete', 'AdminController@deleteUser');
Route::post('/admin/user/update', 'AdminController@updateUser');

Route::get('/admin/bid', 'AdminController@editBid');
Route::post('/admin/bid/delete', 'AdminController@deleteBid');


Route::get('/admin/contract', 'AdminController@editContract');
Route::post('/admin/contract/delete', 'AdminController@deleteContract');


Route::post('/search', 'SearchController@search');

Route::get('/notification', 'NotificationController@index');