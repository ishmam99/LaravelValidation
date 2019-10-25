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
    return view('welcome');});
    
Route::get('/pdf-check', function () {
    return view('pdf');});
Route::get('/login','UserController@login');
Route::post('loginstore','UserController@loginstore');
Route::get('/signup','UserController@signup');
Route::post('register','UserController@register');
Route::group(['middleware'=>'checkloggedin'],function(){
   
    Route::get('dashboard','UserController@dashboard');
    Route::get('logout','UserController@logout');
    Route::get('users','UserController@all');
    Route::get('delete/{id}','UserController@delete');
    Route::post('update/{id}','UserController@update');
    Route::post('upload','MediaController@upload');
    Route::get('export','UserController@export');
    Route::get('/downloadPDF/{id}','UserController@downloadPDF');
    Route::get('/download/{id}','MediaController@download');
    Route::get('/customer','MediaController@customer');
    Route::post('import','MediaController@import');
    Route::get('/pdf','MediaController@pdf');
    Route::post('create','MediaController@create');

});
