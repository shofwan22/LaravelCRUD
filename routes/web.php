<?php
date_default_timezone_set('Asia/Jakarta');
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
//     return view('welcome');
// });

Route::get('/','NewsController@index');
Route::post('/addberita','NewsController@store')->name('addberita');
Route::get('/showberita/{id}','NewsController@show')->name('showberita');
Route::put('/updateberita/{id}','NewsController@update')->name('updateberita');
Route::delete('/deleteberita/{id}','NewsController@destroy')->name('deleteberita');
