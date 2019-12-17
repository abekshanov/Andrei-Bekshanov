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


Auth::routes();

//стандартная home страница laravel
Route::get('/home', 'HomeController@index')->name('home');
// на контроллер вывода списка программ
Route::get('/admin/pages/training-programs','Pages\ProgramsController@listTrainingPrograms')
    ->name('training-programs');

// на контроллер вывода списка тренировок
Route:: get('/admin/pages/training-tasks/{programId}-{programName}','Pages\TasksController@listTrainingTasks')
    ->name('list-tasks');


// на страницу добавления новой программы тренировок
Route:: get('/admin/pages/add-training-program',function (){
    return view('admin.pages.programs.add-program');
})->name('add-program');

// на страницу добавления новой тренировки
Route:: get('/admin/pages/add-training-tasks/{programId}',function ($programId){
    return view('admin.pages.tasks.add-task',compact('programId'));
})->name('add-task');

//на контроллер записи тренировки в БД
Route::post('/admin/pages/add-task-db','Pages\TasksController@addTasks')->name('add-task-db');

// на контроллер записи программы в БД
Route::post('/admin/pages/add-program-db','Pages\ProgramsController@addPrograms')
    ->name('add-program-db');

// на контроллер удаления программы из БД
Route::get('/admin/pages/delete-program-db/{programId}','Pages\ProgramsController@deletePrograms')
    ->name('delete-program');

// на контроллер вывода содержимого выбранной тренировки
Route::get('/admin/pages/show-full-task/{taskId}','Pages\TasksController@showFullTask')
    ->name('show-full-task');

//на шаблон формы изменения данных программы
Route::get('/admin/pages/form-program-db', function () {
    return view('admin.pages.programs.update-program');
})->name('form-program-db');

// на контроллер обновления существующей программы в БД
Route::post('/admin/pages/update-program-db','Pages\ProgramsController@updatePrograms')
    ->name('update-program-db');

// на контроллер обновления существующей тренировки в БД
Route::post('/admin/pages/update-task-data','Pages\TasksController@updateTasks')
    ->name('update-task-data');

// на контроллер удаления тренировки из БД
Route::get('/admin/pages/delete-task-db/{taskId}','Pages\TasksController@deleteTasks')
    ->name('delete-task');

// на список стандартных заданий
Route::get('/admin/pages/list-tests', 'Pages\TestsController@listTests')
    ->name('list-tests');

// на вывод одного теста для Изменения/удаления
Route::get('/admin/pages/full-test/{testId}-{modelName}','Pages\TestsController@fullTest')
    ->name('full-test');

// на контроллер изменения теста
Route::post('/admin/pages/update-test-data','Pages\TestsController@updateTests')
    ->name('update-test-data');

// на страницу добавления нового теста
Route::get('/admin/pages/add-test', function (){
    return view('admin.pages.tests.add-test');
})->name('add-test');

// на контроллер добавления данных нового теста в хранилище
Route::post('/admin/pages/add-test-data','Pages\TestsController@addTests')
    ->name('add-test-data');

// на контроллер удаления теста
Route::get('/admin/pages/delete-test/{testId}-{modelName}','Pages\TestsController@deleteTest')
    ->name('delete-test');
