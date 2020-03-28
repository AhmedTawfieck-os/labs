<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    //first route will return the view of welcome blade
    return view('welcome');});
    //here i make a group of routes with middleware auth, instead of putting auth to each route
Route::group(['middleware' => 'auth'], function(){
    Route::get('/posts', 'PostController@index')->name('posts.index');

    Route::get('/posts/create', 'PostController@create')->name('posts.create');

    Route::get('/posts/{post}', 'PostController@show')->name('posts.show');

    Route::post('/posts', 'PostController@store')->name('posts.store');

    Route::get('/posts/{post}/edit', 'PostController@edit')->name('posts.edit');

    Route::put('/posts/{post}', 'PostController@update')->name('posts.update');

    Route::delete('/posts/{post}', 'PostController@destroy')->name('posts.destroy');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
