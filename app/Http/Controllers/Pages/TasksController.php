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
     $listTrainingTasks=trainingTasksService::getTaskList($programId);
     session(['programId' => $programId, 'progrmaName' => $programName]);
     return view('admin.pages.tasks.training-tasks', compact('listTrainingTasks'));
 }

 public function addTasks(Request $request)
 {
    $strMsg='Тренировка успешно добавлена';
    $previousPage='training-programs';
    $input=$request->all();
    trainingTasksService::create($input);
    return view('pages.system-message', compact('strMsg','previousPage'));
 }

 public function deleteTasks(Request $request)
 {
     $taskId=$request['id'];
     trainingTasksService::delete($taskId);

     $programId=session('programID');
     $programName=session('programName');
     return redirect()->route('change-programs', compact('programId', 'programName'))->with('status', 'Тренировка успешно удалена!');
 }

 public function showFullTask($taskId)
 {
     $fullTask=trainingTasksService::getFullTask($taskId);
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
