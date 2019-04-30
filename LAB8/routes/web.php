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

Route::get('/', [
	'uses'=>'PostsController@getIndex',
	'as'=>'index'
]);

Route::post('/new', [
	'uses'=>'PostsController@postNew',
	'as'=>'new_post'
]);

Route::get('/delete/{id}', [
	'uses'=>'PostsController@getDelete',
	'as'=>'delete'
]);

Route::get('/edit/{id}', [
	'uses'=>'PostsController@getEdit',
	'as'=>'edit'
]);

Route::post('/edit', [
	'uses'=>'PostsController@postEdit',
	'as'=>'edit_post'
]);