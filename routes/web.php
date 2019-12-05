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
Route::get('/admin/pages/training-programs','Pages\ProgramsController@listTrainingPrograms')->name('training-programs');

// на контроллер вывода списка тренировок
Route:: get('/admin/pages/training-tasks/{programId}-{programName}','Pages\TasksController@listTrainingTasks')->name('change-programs');


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
Route::post('/admin/pages/add-program-db','Pages\ProgramsController@addPrograms')->name('add-program-db');

// на контроллер удаления программы из БД
route::get('/admin/pages/delete-program-db/{programId}','Pages\ProgramsController@deletePrograms')->name('delete-program');

// на контроллер вывода содержимого выбранной тренировки
route::get('/admin/pages/show-full-task/{taskId}','Pages\TasksController@showFullTask')->name('show-full-task');

//на шаблон формы изменения данных программы
route::get('/admin/pages/form-program-db/{programId}-{programName}',function ($programId, $programName){

    return view('admin.pages.programs.update-program', compact('programId','programName'));
})->name('form-program-db');

// на контроллер обновления существующей программы в БД
Route::post('/admin/pages/update-program-db','Pages\ProgramsController@updatePrograms')->name('update-program-db');

// на контроллер обновления существующей тренировки в БД
Route::post('/admin/pages/update-task-data','Pages\TasksController@updateTasks')->name('update-task-data');

