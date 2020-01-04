<?php
Route::group(['namespace'=>'Admin','middleware' => 'auth','prefix'=>'admin'],function (){
    Route::get('dashboard','DashboardController@dashboard')->name('admin.dashboard');
    Route::resource('user','UserController');
});