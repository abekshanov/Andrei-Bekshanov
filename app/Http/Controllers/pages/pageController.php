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
    //


 public function listTrainingPrograms (){

     $listTrainingPrograms=training_program::all();

    dump($listTrainingPrograms);
    return view('pages.training-programs',compact('listTrainingPrograms'));
 }

 public function changeTrainingPrograms ($program_id){
     $listTrainingTasks=training_task::where('training_programs_id', $program_id)->get();

     dump($listTrainingTasks);
    return view('pages.training-tasks', ['listTrainingTasks'=>$listTrainingTasks, 'program_id' => $program_id]);
 }



 public function addTasks (Request $request){
    $str_msg='Тренировка успешно добавлена';
    $previous_page='training-programs';
    $input=$request->all();
    $result_service= new trainingTasksService();
    $result_service->addToDb($input);

    return view('pages.system-message', ['str'=>$str_msg,'previous_page'=>$previous_page]);
 }

 public  function addPrograms (Request $request){
     $str_msg='Программа успешно добавлена';
     $previous_page='training-programs'; //страница на которую можно вернуться
     $input=$request->all();
     $result_service= new trainingProgramsService();
     $result_service->addProgramToDb($input);

     return view('pages.system-message', ['str'=>$str_msg,'previous_page'=>$previous_page]);
 }

}
