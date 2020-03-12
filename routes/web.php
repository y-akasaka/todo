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

Route::get('/login', 'BbsController@login');

Route::post('/auth', 'BbsController@auth');

Route::get('/input', 'BbsController@input');

Route::get('/list', 'BbsController@list');

Route::post('/save', 'BbsController@save');