<?php

/** Posts */
Route::get('/post/create', 'PostController@create')->name('create_post');
Route::post('/post/create', 'PostController@store');
Route::get('/', 'HomeController@index')->name('home');
Route::get('/posts', 'PostController@index');

Route::get('/post/{postId}', 'PostController@show')->name('show_post');
Route::delete('/post/{postId}', 'PostController@destroy')->name('delete_post');
Route::put('/post/{postId}', 'PostController@edit')->name('edit_post');
Route::post('/post/{postId}', 'PostController@update')->name('update_post');;

/** Categories */
Route::get('/categories', 'CategoryController@index')->name('list_categories');
Route::get('/category', 'CategoryController@create')->name('create_category');
Route::post('/category', 'CategoryController@store');
Route::get('/category/{categoryId}', 'CategoryController@show')->name('show_category');
Route::delete('/category/{categoryId}', 'CategoryController@destroy')->name('delete_category');
Route::get('/category/{categoryId}/posts', 'HomeController@redirectToCategory')->name('posts_by_id');

/** Comments */
Route::post('/post/{postId}/comment', 'CommentsController@store')->name('create_comment');
Route::delete('/post/{postId}/comment', 'CommentsController@destroy')->name('delete_comment');

Auth::routes();
