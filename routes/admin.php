<?php
Route::group(['namespace'=>'Admin','middleware' => 'auth','prefix'=>'admin'],function (){
    Route::get('dashboard','DashboardController@dashboard')->name('admin.dashboard');
    Route::resource('user','UserController');
    Route::resource('subject','SubjectController',['as'=>'admin']);
    Route::resource('teacher','TeacherController',['as'=>'admin']);
    Route::resource('student','StudentController',['as'=>'admin']);
    Route::resource('result','ResultController',['as'=>'admin']);
    Route::resource('fee_type','FeeTypeController',['as'=>'admin']);
    Route::resource('classes_fee','ClassesFeeController',['as'=>'admin']);

});
Route::get('/getStudent','Admin\ResultController@getStudent')->name('admin.result.getStudent');
Route::get('/getSubject','Admin\ResultController@getSubject')->name('admin.result.getSubject');
