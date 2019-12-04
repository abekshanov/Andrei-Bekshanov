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
// на контроллер вывода списка программ
Route::get('/admin/pages/training-programs','pages\pageController@listTrainingPrograms')->name('training-programs');

// на контроллер вывода списка тренировок
Route:: get('/admin/pages/training-tasks/{program_id}','pages\pageController@changeTrainingPrograms')->name('change-programs');


// на страницу добавления новой программы тренировок
Route:: get('/admin/pages/add-training-program',function (){
    return view('admin.pages.programs.add-program');
})->name('add-program');

// на страницу добавления новой тренировки
Route:: get('/admin/pages/add-training-tasks/{program_id}',function ($program_id){
    return view('admin.pages.tasks.add-task',compact('program_id'));
})->name('add-task');

//на контроллер записи тренировки в БД
Route::post('/admin/pages/add-task-db','pages\pageController@addTasks')->name('add-task-db');

// на контроллер записи программы в БД
Route::post('/admin/pages/add-program-db','pages\pageController@addPrograms')->name('add-program-db');

// на контроллер удаления программы из БД
route::get('/admin/pages/delete-program-db/{program_id}','pages\pageController@deletePrograms')->name('delete-program');

// на контроллер вывода содержимого выбранной тренировки
route::get('/admin/pages/show-full-task/{task_id}','pages\pageController@showFullTask')->name('show-full-task');
