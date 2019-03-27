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
    return view('pages.front-end.content-frontend');
});

Route::resource('/user','UserController');
Route::resource('/badan-usaha','BadanUsahaController');
Route::resource('/job','PekerjaanController');
Route::resource('/pelamar','PelamarController');