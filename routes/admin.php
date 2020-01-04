<?php
Route::group(['namespace'=>'Admin',],function (){
    Route::get('dashboard','DashboardController@dashboard')->name('admin.dashboard');
});

