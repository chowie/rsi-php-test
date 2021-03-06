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

Route::get('/', 'ResumeController@show');

Route::get('/contact', 'ContactFormController@show');
Route::post('/contact', 'ContactFormController@save')
    ->middleware('throttle:3,1');

Route::get('/success', 'ContactFormController@success');
