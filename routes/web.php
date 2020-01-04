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


Route::group(['namespace'=>'Admin','middleware' => 'auth','prefix'=>'admin'],function (){
    Route::get('dashboard','DashboardController@dashboard')->name('admin.dashboard');
    Route::resource('user','UserController');
});



Route::get('/', function () {
    return view('welcome');
});







Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
