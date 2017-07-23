<?php

Route::get('/', function () {
    return redirect()->route('posts.index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/**
 * Comments routes
 */
Route::post('posts/{id}/comments', 'CommentsController@store')->name('comments.store');
Route::delete('comments/{id}', 'CommentsController@destroy')->name('comments.destroy');

/**
 * Posts routes
 */
Route::resource('posts', 'PostsController');


