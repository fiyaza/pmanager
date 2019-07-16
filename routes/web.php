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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth'])->group(function () {
	Route::resource('companies', 'CompanyController');

	Route::get('projects/create/{company_id}', 'ProjectController@create');
	Route::post('projects/addUser', 'ProjectController@addUser')->name('projects.adduser');

	Route::resource('projects', 'ProjectController');

	Route::resource('roles', 'RoleController');
	Route::resource('tasks', 'TaskController');
	Route::resource('users', 'UserController');
	Route::resource('comments', 'CommentController');
});


