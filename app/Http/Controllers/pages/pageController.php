<?php

namespace App\Http\Controllers\pages;

use App\Classes\Services\trainingProgramsService;
use App\Classes\Services\trainingTasksService;
use App\Http\Controllers\Controller;
use App\training_task;
use Illuminate\Http\Request;
use App\training_program;

class pageController extends Controller
{
    //page controller
 public function listTrainingPrograms (){
    $result_service= new trainingProgramsService();
    return view('admin.pages.programs.training-programs',['listTrainingPrograms'=>$result_service->showProgramsFromDb()]);
 }
 public function changeTrainingPrograms ($program_id){
    $result_service= new trainingTasksService();
    return view('admin.pages.tasks.training-tasks', ['listTrainingTasks'=>$result_service->showFromDb($program_id), 'program_id' => $program_id]);
 }
 public function addTasks (Request $request){
    $str_msg='Тренировка успешно добавлена';
    $previous_page='training-programs';
    $input=$request->all();

    $result_service= new trainingTasksService();
    $result_service->addToDb($input);
    return view('admin.pages.system-message', ['str'=>$str_msg,'previous_page'=>$previous_page]);
 }
 public  function addPrograms (Request $request){
     $str_msg='Программа успешно добавлена';
     $previous_page='training-programs'; //страница на которую можно вернуться
     $input=$request->all();

     $result_service= new trainingProgramsService();
     $result_service->addProgramToDb($input);
     return view('admin.pages.system-message', ['str'=>$str_msg,'previous_page'=>$previous_page]);
 }
 public function deletePrograms ($program_id){
     $str_msg='Программа успешно удалена, связанные с ней тренировки сохнранены в "Архив тренировок"';
     $previous_page='training-programs'; //страница на которую можно вернуться

     $result_service= new trainingProgramsService();
     $result_service->deleteProgramFromDb($program_id);
     return view('admin.pages.system-message', ['str'=>$str_msg,'previous_page'=>$previous_page]);
 }

 public function showFullTask ($task_id){
     $result_service= new trainingTasksService();
     $result=$result_service->showFullTaskDb($task_id);
     return view('admin.pages.tasks.full-task',compact('result'));
 }


}
