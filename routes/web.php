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
    return view('layouts.user');
});

Route::get('logout',function(){
    Auth::logout();
    return redirect('/login');
});

Route::prefix('admin')->group(function () {

    Route::get('/', 'UserController@index');
    Route::get('/login','Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login','Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/logout','Auth\AdminLoginController@logout');
    Route::get('/patient/generateUserName/{name}','PatientController@generateUserName');

    // Route::name('trashed.')->group(function(){});
    Route::match(['get', 'delete','patch'], 'job/trashed/{job?}', 'JobController@trashed')->name('job.trashed');
    Route::match(['get', 'delete','patch'], 'drug/trashed/{drug?}', 'DrugController@trashed')->name('drug.trashed');

    Route::resource('user', 'UserController');
    Route::resource('patient', 'PatientController');
    Route::resource('diagnosis', 'DiagnosisController');
    Route::resource('drug', 'DrugController');
});

Auth::routes();