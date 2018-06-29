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
    return view('auth.login');
});

Route::get('/dashboard', 'HomeController@dashboard');

Route::post('login', 'Auth\LoginController@login')->name('login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/index', 'TaskController@index')->name('task.index');
Route::post('/store', 'TaskController@store')->name('task.store');
Route::get('/tasks', 'TaskController@tasks')->name('task.list');
Route::put('/update/{id}', 'TaskController@update')->name('task.update');


