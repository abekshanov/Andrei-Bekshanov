<?php

namespace App\Http\Controllers\Pages;

use App\Classes\Services\TrainingTasksService;
use App\Http\Controllers\Controller;
use App\Http\Requests\TaskRequest;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    //tasks controller

 public function listTrainingTasks($programId, $programName)
 {
     $listTrainingTasks=trainingTasksService::getTaskList($programId);
     session(['programId' => $programId]);
     session(['programName' => $programName]);
     return view('admin.pages.tasks.training-tasks', compact('listTrainingTasks'));
 }

 public function addTasks(Request $request)
 {
     $programId=session('programId');
     $programName=session('programName');
     $status="";
     $errors="";

     $input=$request->all();
     if ($programId!="NULL") {
         $created=trainingTasksService::create($input);
     } else {
         $created=false;
     }

     if ($created){
         $status='Тренировка успешно добавлена!';
     } else{
         if ($programId=="NULL") {
             $errors='Нельзя добавлять новые тренировки в Архив';
         } else {
             $errors='Ошибка!';
         }
     }

     return redirect()->route('list-tasks', compact('programId', 'programName'))
         ->with('status', $status)
         ->with('errors', $errors);
 }

 public function deleteTasks($taskId)
 {
     $isDeleted=trainingTasksService::delete($taskId);

     $programId=session('programId');
     $programName=session('programName');
     $status="";
     $errors="";

     if ($isDeleted){
         $status='Тренировка успешно удалена!';
     } else{
         $errors='Ошибка!';
     }

     return redirect()->route('list-tasks', compact('programId', 'programName'))
         ->with('status', $status)
         ->with('errors', $errors);
 }

 public function showFullTask($taskId)
 {
     $fullTask=trainingTasksService::getFullTask($taskId);
     return view('admin.pages.tasks.full-task',compact('fullTask'));
 }


 public function updateTasks(TaskRequest $request)
 {
     //VERSION METHOD BASED ON VALIDATION

     $input=$request->all();
     $programId = session('programId');
     $programName = session('programName');

     trainingTasksService::update($input);

     $status = 'Тренировка успешно сохранена!';

     return redirect()->route('list-tasks', compact('programId', 'programName'))
         ->with('status', $status);
 }

    /*public function updateTasks(Request $request) // LAST VERSION METHOD BASED ON EXCEPTIONS
    {

        $input=$request->all();
        $programId = session('programId');
        $programName = session('programName');

        try {
            trainingTasksService::update($input);
            $status = 'Тренировка успешно сохранена!';
        }
        catch (\Throwable $exception) {

            $errors=$exception->getMessage();

            return back()->withErrors($errors);
        }

        return redirect()->route('list-tasks', compact('programId', 'programName'))
            ->with('status', $status);
    } */

}
