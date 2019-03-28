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

Route::get('/', function () {
    return view('pages.front-end.content-frontend');
});

Route::resource('/user','UserController')->except(['create'])->middleware('auth');
Route::resource('/badan-usaha','BadanUsahaController')->middleware('auth');
Route::resource('/job','PekerjaanController');
Route::resource('/pelamar','PelamarController');

// Route::get('/home', 'HomeController@index')->name('home');
