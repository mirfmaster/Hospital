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
    Route::get('/', function () {
        return view('admin.index');
    })->middleware('auth');
    Route::get('/login',function ()
    {
        return view('admin.login');
    });
    Route::get('/logout','HomeController@logout');
    Route::match(['get', 'delete','patch'], 'job/trashed/{job?}', 'JobController@trashed')->name('job.trashed');
    Route::match(['get', 'delete','patch'], 'drug/trashed/{drug?}', 'DrugController@trashed')->name('drug.trashed');

    Route::resource('user', 'UserController');
    Route::resource('job', 'JobController');
    Route::resource('drug', 'DrugController');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
