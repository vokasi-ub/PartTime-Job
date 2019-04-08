<?php
use App\Http\Middleware\isAdmin;
use App\Http\Middleware\isUser;
use App\Http\Middleware\isComplete;
use App\Http\Middleware\dontCreate;
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
Auth::routes(['verify' => true]);


// Just for All

Route::get('/', function () {
    return view('pages.front-end.content-frontend');
});
Route::get('/home', function () {
    return view('pages.front-end.content-frontend');
});
Route::get('/lowongan', 'FrontendController@indexJob');
Route::post('/lowongan', 'FrontendController@createApply');
Route::get('/badanUsaha', 'FrontendController@indexBadanUsaha');

// Route::get('/instansi/{post}', 'InstansiController@index')->middleware(isUser::class);

Route::resource('/user','UserController')->except(['create'])->middleware(isAdmin::class);
Route::resource('/badan-usaha','BadanUsahaController')->middleware(isAdmin::class);
Route::resource('/job','PekerjaanController')->middleware(isAdmin::class);
Route::resource('/pelamar','PelamarController')->middleware(isAdmin::class);

Route::group(['middleware' => [isUser::class, 'verified']], function() {

    Route::resource('/instansi','InstansiController')->except(['create']);

});

Route::resource('/bio','CreateInstansiController')->middleware(dontCreate::class);
Route::resource('/jobHole','LowonganController')->middleware(isComplete::class);
Route::resource('/lamaran','LamaranController')->middleware(isComplete::class);
Route::post('/lamaran','LamaranController@emailHim')->name('lamaran.sendMail')->middleware(isComplete::class);


// Route::get('/home', 'HomeController@index')->name('home');
