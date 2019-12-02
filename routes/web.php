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

//на тестовую страницу
Route::get('/test/mvc-page/{title}', 'tests\testcontroller1@index')->name('mvc-page');



Auth::routes();

//стандартная home страница laravel
Route::get('/home', 'HomeController@index')->name('home');
// на страницу вывода списка программ
Route::get('/pages/training-programs','pages\pageController@listTrainingPrograms')->name('training-programs');

// на страницу вывода списка тренировок
Route:: get('/pages/training-tasks/{program_id}','pages\pageController@changeTrainingPrograms')->name('change-programs');

// на страницу уведомлений
//Route::post('/pages/system-message','pages\pageController@showSystemMessage')->name('sys-msg');


// на страницу добавления новой программы тренировок
Route:: get('/pages/add-training-program',function (){
    return view('pages.add-program');
})->name('add-program');

// на страницу добавления новой тренировки
Route:: get('/pages/add-training-tasks',function (){
    return view('pages.add-task');
})->name('add-task');

//на контроллер записи данных в БД
Route::post('pages/add-task-db','pages\pageController@addTasks')->name('add-task-db');

