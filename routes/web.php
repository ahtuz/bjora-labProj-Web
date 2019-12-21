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

Route::get('/login', function(){
    
    if(request()->hasCookie('user_cookie')){
        return redirect('/home');
    }

    return view('auth/login');
});

Route::group(['middleware'=>'login'], function(){
    Route::get('/home', function(){
        return view('home');
    });
});

Route::group(['middleware'=>'isadmin'], function(){
    Route::get('/admin/view_users', 'AdminController@view_users')->name('view_users');
    Route::get('/admin/add_user', 'AdminController@add_user')->name('add_user');
    Route::post('/admin/add_user', 'AdminController@store_user');
    Route::get('/admin/{id}/edit', 'AdminController@edit_user')->name('admin_edit_user');
    Route::post('/admin/{id}/edit', 'AdminController@update_user');
    Route::get('/admin/{id}/delete', 'AdminController@delete_user')->name('admin_delete_user');

    Route::get('/admin/label/add', 'LabelController@create')->name('add_label');
    Route::post('/admin/label', 'LabelController@store');
    Route::get('/admin/label', 'LabelController@index')->name('view_label');
    Route::get('/admin/label/{id}/delete', 'LabelController@destroy')->name('delete_label');
    Route::get('/admin/label/{id}/update', 'LabelController@edit')->name('edit_label');
});

Route::post('/login', 'UserController@login')->name('login');

Route::post('/logout', 'UserController@logout')->name('logout');

// Auth::routes();

Route::view('register', 'auth/register')->name('register');

Route::get('/', 'HomeController@index')->name('home');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/question/create', 'QuestionController@create')->name('add_question');

Route::post('/question', 'QuestionController@store');

Route::get('/question', 'QuestionController@index')->name('view_questions');

Route::get('/question/{id}', 'QuestionController@show')->name('show_question');

Route::post('/question/{id}', 'AnswerController@store')->name('add_answer');

Route::get('/question/{id}/update', 'QuestionController@edit')->name('edit_question');

Route::post('/question/{id}/update', 'QuestionController@update')->name('update_question');

Route::get('/question/{id}/delete', 'QuestionController@destroy')->name('delete_question');

Route::get('/user/{id}', 'UserController@show')->name('show_user');

Route::get('/user/{id}/questions', 'UserController@viewQuestion')->name('view_user_questions');

Route::get('/user/{id}/questions/search', 'UserController@searchIndex')->name('user_question_search');

Route::get('/user/{id}/update', 'UserController@edit')->name('edit_user');

Route::get('/user/{id}/delete', 'UserController@destroy')->name('delete_user');

Route::get('/answer/{id}/update', 'AnswerController@edit')->name('edit_answer');

Route::post('/user/{id}', 'MessageController@store')->name('send_message');

Route::get('/user/{id}/inbox', 'MessageController@show')->name('inbox');

Route::get('/message/{id}/delete', 'MessageController@destroy')->name('delete_message');

Route::get('/search', 'HomeController@searchIndex')->name('home_search');



Route::get('/authe', 'UserController@index');