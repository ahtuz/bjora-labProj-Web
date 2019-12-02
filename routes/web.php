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

Auth::routes();

Route::view('/master_page', 'master_page')->name('master_page');

Route::view('/add_user', 'add_user')->name('add_user');

Route::get('/', 'HomeController@index')->name('home');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/question/create', 'QuestionController@create')->name('add_question');

Route::post('/question', 'QuestionController@store');

Route::get('/question', 'QuestionController@index')->name('view_questions');

Route::get('/question/{id}', 'QuestionController@show')->name('show_question');

Route::get('/question/{id}/update', 'QuestionController@edit')->name('edit_question');

Route::post('/question/{id}/update', 'QuestionController@update')->name('update_question');

Route::get('/question/{id}/delete', 'QuestionController@destroy')->name('delete_question');

Route::get('/user/{id}', 'UserController@show')->name('show_user');

Route::get('/user/{id}/questions', 'UserController@viewQuestion')->name('view_user_questions');