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
    // check if the logged in user is admin
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
    Route::post('/admin/label/{id}', 'LabelController@update')->name('update_label');

    Route::get('/question/create', 'QuestionController@create')->name('add_question');
    Route::get('/question/{id}', 'QuestionController@show')->name('show_question');
    Route::get('/admin/question', 'AdminController@view_questions')->name('admin_view_questions');
    Route::get('/admin/question/{id}/update', 'AdminController@edit_user_question')->name('admin_edit_question');
    Route::post('/admin/question/{id}/update', 'AdminController@update_user_question')->name('admin_update_question');
    Route::get('/admin/question/{id}/delete', 'AdminController@destroy_user_question')->name('admin_delete_question');
    Route::post('/admin/question/{id}/change_status', 'AdminController@change_status')->name('admin_change_status');

    Route::get('admin/user/{id}/questions', 'UserController@viewQuestion')->name('admin_view_user_questions');
    Route::get('admin/user/{id}/questions/search', 'UserController@searchIndex')->name('admin_user_question_search');

    Route::get('admin/user/{id}/inbox', 'MessageController@show')->name('admin_view_inbox');
});

Route::group(['middleware'=>'isloggedin'], function(){
    Route::post('/question/{id}', 'AnswerController@store')->name('add_answer');
    Route::get('/question/create', 'QuestionController@create')->name('add_question');
    Route::post('/question', 'QuestionController@store');
    Route::get('/user/{id}', 'UserController@show')->name('show_user');
    Route::post('/user/{id}', 'MessageController@store')->name('send_message');
});

Route::group(['middleware'=>'isownerquestion'], function(){
    // middleware to check is the logged in user is  owner
    Route::get('/question/{id}/update', 'QuestionController@edit')->name('edit_question');
    Route::post('/question/{id}/update', 'QuestionController@update')->name('update_question');
    Route::get('/question/{id}/delete', 'QuestionController@destroy')->name('delete_question');
    Route::post('/question/{id}/change_status', 'QuestionController@change_status')->name('change_status');
});

Route::group(['middleware'=>'isowner'], function(){
    // profile and inbox
    Route::get('/user/{id}/inbox', 'MessageController@show')->name('inbox');
    Route::get('/user/{id}/questions', 'UserController@viewQuestion')->name('view_user_questions');
    Route::get('/user/{id}/questions/search', 'UserController@searchIndex')->name('user_question_search');
    Route::get('/user/{id}/update', 'UserController@edit')->name('edit_user');
    Route::post('/user/{id}/update', 'UserController@update');
    Route::get('/user/{id}/delete', 'UserController@destroy')->name('delete_user');
});

Route::group(['middleware'=>'isowneranswer'], function(){
    Route::get('/answer/{id}/update', 'AnswerController@edit')->name('edit_answer');
    Route::post('/answer/{id}/update', 'AnswerController@update')->name('update_answer');
    Route::get('/answer/{id}/delete', 'AnswerController@destroy')->name('delete_answer');
});

Route::group(['middleware'=>'isownermessage'], function(){
    Route::get('/message/{id}/delete', 'MessageController@destroy')->name('delete_message');
});   

Route::post('/login', 'UserController@login')->name('login');

Route::post('/logout', 'UserController@logout')->name('logout');

Route::get('/register', 'UserController@create')->name('register');

Route::post('/register', 'UserController@store');

Route::get('/', 'HomeController@index')->name('home');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/question/{id}', 'QuestionController@show')->name('show_question');

Route::get('/search', 'HomeController@searchIndex')->name('home_search');