<?php


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('comments', 'CommentsController@index');
Route::post('comments', 'CommentsController@store');
Route::put('comments/{comment}', 'CommentsController@update');
Route::delete('comments/{comment}', 'CommentsController@delete');
