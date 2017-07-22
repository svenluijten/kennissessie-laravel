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

Route::get('/', 'StaticPagesController@home')
    ->name('home')
    ->middleware('auth');

Auth::routes();

Route::group(['prefix' => 'posts'], function () {
    Route::get('', 'PostsController@index')->name('posts.index');
    Route::post('', 'PostsController@store');
    Route::get('/create', 'PostsController@create')->name('posts.create');
    Route::get('/{post}', 'PostsController@show')->name('posts.show');
});
