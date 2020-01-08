<?php
Route::group(['namespace'=>'Admin','middleware' => 'auth','prefix'=>'admin'],function (){
    Route::get('dashboard','DashboardController@dashboard')->name('admin.dashboard');
    Route::resource('user','UserController');
    Route::resource('subject','SubjectController',['as'=>'admin']);
    Route::resource('teacher','TeacherController',['as'=>'admin']);
    Route::resource('student','StudentController',['as'=>'admin']);
});
