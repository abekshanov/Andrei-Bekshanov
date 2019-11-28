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


Route::get('/test/mvc-page/{title}', 'tests\testcontroller1@index')->name('mvc-page');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/pages/training-programs','pages\pageController@listTrainingPrograms')->name('training-programs');
