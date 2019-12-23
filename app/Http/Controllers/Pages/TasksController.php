<?php

namespace App\Http\Controllers\Pages;

use App\Classes\Services\TrainingTasksService;
use App\Http\Controllers\Controller;
use App\Http\Requests\TaskRequest;
use Exception;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    //tasks controller
 public function __construct()
 {
     $this->middleware('auth');
 }

    public function listTrainingTasks($programId, $programName)
 {
     session(['programId' => $programId]);
     session(['programName' => $programName]);
     try {
         $listTrainingTasks=trainingTasksService::getTaskList($programId);
         return view('admin.pages.tasks.training-tasks', compact('listTrainingTasks'));
     }catch (Exception $exception){
         $errors=$exception->getMessage();
         return back()->withErrors($errors);
     }

 }

 public function addTasks(TaskRequest $request)
 {
     // Validation is ON
     $input=$request->all();
     $programId=session('programId');
     $programName=session('programName');

     try{

         if ($programId!="NULL") {
             trainingTasksService::create($input);
             $status='Тренировка успешно добавлена!';
         } else {
             throw new Exception('Нельзя добавлять новые тренировки в Архив');
         }
         return redirect()->route('list-tasks', compact('programId', 'programName'))
             ->with('status', $status);
     }catch (Exception $exception){
        $errors=$exception->getMessage();
        return back()->withErrors($errors);
     }

 }

 public function deleteTasks($taskId)
 {
     $programId=session('programId');
     $programName=session('programName');

     try {
         trainingTasksService::delete($taskId);
         $status='Тренировка успешно удалена!';
         return redirect()->route('list-tasks', compact('programId', 'programName'))
             ->with('status', $status);
     }catch (Exception $exception){
         $errors=$exception->getMessage();
         return back()->withErrors($errors);
     }
 }

 public function showFullTask($taskId)
 {
     try {
         $fullTask=trainingTasksService::getFullTask($taskId);
         return view('admin.pages.tasks.full-task',compact('fullTask'));
     }catch (Exception $exception){
         $errors=$exception->getMessage();
         return back()->withErrors($errors);
     }
 }


 public function updateTasks(TaskRequest $request)
 {
    // Validation is ON
     $input=$request->all();
     $programId = session('programId');
     $programName = session('programName');
     try {
         trainingTasksService::update($input);
         $status = 'Тренировка успешно сохранена!';
         return redirect()->route('list-tasks', compact('programId', 'programName'))
             ->with('status', $status);
     }catch (Exception $exception){
         $errors=$exception->getMessage();
         return back()->withErrors($errors);
     }
 }

}
