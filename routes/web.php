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

// Route::get('/', function () {
//     $nama = 'Rahma';
//     return view('home', compact('nama')); 
// });

//Home
Route::get('/', 'HomeController@home');

//Student
// Route::get('/siswa', 'SiswaController@index');
// Route::get('/siswa/add', 'SiswaController@create');
// Route::get('/siswa/{student}', 'SiswaController@show');
// Route::get('/siswa/delete/{student}', 'SiswaController@show');
// Route::post('/siswa/add', 'SiswaController@store');
// Route::delete('/siswa/{student}', 'SiswaController@destroy');
// Route::get('/siswa/{student}/edit', 'SiswaController@edit');
// Route::patch('/siswa/{student}', 'SiswaController@update'); 
Route::resource('student', 'StudentController');


