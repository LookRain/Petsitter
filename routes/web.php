<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/user/{user}', 'ProfileController@index');

Route::get('post', 'PostsController@index');

Route::get('post/new', 'PostsController@create');
Route::get('post/{post}', 'PostsController@show');

Route::post('post/new', 'PostsController@store');
