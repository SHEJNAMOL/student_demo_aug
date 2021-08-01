<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;

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



//Route::get('/', 'TeacherController@index'); // localhost:8000/
//Route::get('/getTeachers/{teacher_id}', 'TeacherController@getTeachers');

//Route::get('/', 'StudClassController@index'); // localhost:8000/
//Route::get('/getclasses/{class_id}', 'StandardController@getclasses');


Route::get('/', 'App\Http\Controllers\StudentController@index');
//Route::get('/show/{student_id}', 'App\Http\Controllers\StudentController@show');
Route::get('/create', 'App\Http\Controllers\StudentController@create');
Route::post('/create', 'App\Http\Controllers\StudentController@create');
//Route::post('/store', 'App\Http\Controllers\StudentController@store');
Route::get('/edit/{student_id}', 'App\Http\Controllers\StudentController@edit');
Route::post('/update', 'App\Http\Controllers\StudentController@update');
//Route::get('/destroy/{student_id}', 'App\Http\Controllers\StudentController@destroy');


 Route::get('/student_marks', 'App\Http\Controllers\StudentMarkController@index');
 //Route::get('/show/{student_id}', 'App\Http\Controllers\StudentMarkController@show');
 Route::get('/student_marks/create', 'App\Http\Controllers\StudentMarkController@create');
// Route::post('/store', 'App\Http\Controllers\StudentMarkController@store');
// Route::get('/edit/{student_id}', 'App\Http\Controllers\StudentMarkController@edit');
// Route::get('/update/{student_id}', 'App\Http\Controllers\StudentMarkController@update');
// Route::get('/destroy/{student_id}', 'App\Http\Controllers\StudentMarkController@destroy');

