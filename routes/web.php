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

Route::view('/question/addQuestion', 'question/addQuestion')->name('addQuestion');
Route::view('/master', 'masterPage')->name('masterPage');
Route::view('/addUser', 'addUser')->name('addUser');

Route::get('/', 'HomeController@index')->name('home');

Route::get('/question/create', 'QuestionController@create')->name('add_question');

Route::post('/question', 'ProductController@store');

Route::get('/question', 'QuestionController@index')->name('view_questions');

Route::get('/question/update/{id}', 'QuestionController@edit')->name('edit_question');

Route::post('/question/update/{id}', 'QuestionController@update')->name('update_question');