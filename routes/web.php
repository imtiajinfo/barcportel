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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix'=>'admin','namespace'=>'Admin','middleware'=>['auth','admin']], function (){
    Route::get('/dashboard', 'AdminController@dashboard')->name('admin.dashboard');
//    Course
    Route::resource('/course','CourseController');
    Route::resource('course/{course}/unit','UnitController');
    Route::resource('/course/{course}/unit/{unit}/lesson','LessonController');
});

Route::group(['prefix'=>'student','namespace'=>'Student','middleware'=>['auth','student']], function (){
    Route::get('dashboard', 'StudentController@dashboard')->name('student.dashboard');
});
