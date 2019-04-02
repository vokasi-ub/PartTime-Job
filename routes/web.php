<?php
use App\Http\Middleware\isAdmin;
use App\Http\Middleware\isUser;
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


// Just for All

Route::get('/', function () {
    return view('pages.front-end.content-frontend');
});
Route::get('/home', function () {
    return view('pages.front-end.content-frontend');
});
Route::get('/lowongan', function () {
    return view('pages.front-end.lowongan-frontend');
});

// Route::get('/instansi/{post}', 'InstansiController@index')->middleware(isUser::class);

Route::resource('/user','UserController')->except(['create'])->middleware(isAdmin::class);
Route::resource('/badan-usaha','BadanUsahaController')->middleware(isAdmin::class);
Route::resource('/job','PekerjaanController')->middleware(isAdmin::class);
Route::resource('/pelamar','PelamarController')->middleware(isAdmin::class);
Route::resource('/instansi','InstansiController')->middleware(isUser::class);
Route::resource('/jobHole','LowonganController')->middleware(isUser::class);
Route::resource('/lamaran','LamaranController')->middleware(isUser::class);


// Route::get('/home', 'HomeController@index')->name('home');
