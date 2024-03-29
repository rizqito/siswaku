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

Route::get('/', 'PagesController@homepage');
Route::get('about', 'PagesController@about');
Auth::routes(['register' => false]);
Route::get('siswa/cari','SiswaController@cari');
Route::resource('siswa','SiswaController');
Route::resource('kelas','KelasController')->parameters(['kelas'=>'kelas']);
Route::get('date-mutator','SiswaController@dateMutator');
Route::resource('hobi','HobiController');
Route::resource('user','UserController');