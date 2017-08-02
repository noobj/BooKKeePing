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

Route::get('records/{date}', 'RecordController@index')->where('date', '[0-9]{4}_[0-9]{2}_[0-9]{2}');

Route::resource('dummies', 'DummiesController');

Route::resource('records', 'RecordController');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
