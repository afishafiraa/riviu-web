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

Route::get('/pelanggan', function () {
    return view('review.form');
});

Route::get('/nyoba', function () {
    return view('review.form-t');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware('role:admin')->group(function(){
    Route::resource('admin/teknisi', 'AdminController');
    Route::get('admin/dashboard', 'AdminController@dashboard')->name('admin.dashboard');
    Route::get('admin/toprank', 'AdminController@topRank')->name('admin.topRank');
    Route::get('admin/hasil-survey', 'AdminController@hasilSurvey')->name('admin.hasilSurvey');
    Route::get('admin/pending-survey', 'AdminController@pendingSurvey')->name('admin.pendingSurvey');
    Route::get('admin/detail-survey/{id}', 'AdminController@detailSurvey')->name('admin.detailSurvey');
    Route::get('admin/detail-teknisi/{id}', 'AdminController@detailTeknisi')->name('admin.detailTeknisi');
    // Route::resource('users', 'UserController');
});

Route::middleware('role:teknisi')->group(function(){
    Route::resource('ticket', 'TicketController');
    Route::resource('review', 'ReviewController')->except([
        'index', 'store'
    ]);
    // Route::get('review/index/{ticket}', 'ReviewController@index')->name('review.index');
    Route::post('subjek/pelanggan', 'ReviewController@simpan')->name('review.simpan');
    Route::get('subjek/{ticket}', 'ReviewController@subjek')->name('review.subjek');
    Route::get('finish', 'ReviewController@finishReview')->name('review.finish');
    // Route::resource('users', 'UserController');
});

// Route::resource('input-ticket', 'TicketController');
// Route::resource('input-form-ticket', 'ReviewController');

Route::get('review/index/{id_random}', 'ReviewController@index')->name('review.pelanggan');
Route::post('review/pelanggan', 'ReviewController@store')->name('review.save');
Route::get('finish-p', 'ReviewController@finishpReview')->name('review.finish-p');

Route::get('sendemail', 'MailController@sendemail');