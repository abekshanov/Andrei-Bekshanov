<?php

namespace App\Http\Controllers\Pages;

use App\Classes\Services\TrainingTasksService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    //tasks controller

 public function listTrainingTasks($programId, $programName)
 {
     $listTrainingTasks=trainingTasksService::showTaskList($programId);
     return view('admin.pages.tasks.training-tasks', compact('listTrainingTasks', 'programId', 'programName'));
 }

 public function addTasks(Request $request)
 {
    $strMsg='Тренировка успешно добавлена';
    $previousPage='training-programs';
    $input=$request->all();
    trainingTasksService::addToDb($input);
    return view('pages.system-message', compact('strMsg','previousPage'));
 }

 public function showFullTask($taskId)
 {
     $fullTask=trainingTasksService::showFullTask($taskId);
     return view('admin.pages.tasks.full-task',compact('fullTask'));
 }


 public function updateTasks(Request $request)
 {
     $previousPage='training-programs';
     $input=$request->all();
     $isUpdated=trainingTasksService::update($input);

     if ($isUpdated) {
         $strMsg='Тренировка успешно сохранена';
     } else {
         $strMsg='Не удалось сохранить троенировку(((';
     }

     return view('pages.system-message', compact('strMsg','previousPage'));
 }

}

