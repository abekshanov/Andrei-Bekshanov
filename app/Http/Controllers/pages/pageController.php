<?php

namespace App\Http\Controllers\pages;

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
     $listTrainingTasks=training_task::all();

     dump($listTrainingTasks);
    return view('pages.training-tasks', compact('listTrainingTasks'));
 }

/* public function showSystemMessage($str_msg){

     return view('pages.system-message', ['str'=>$str_msg]);

 }*/

 public function addTasks (Request $request){
    $str_msg='Тренировка успешно добавлена';
    $previous_page='training-programs';
    $input=$request->all();

    return view('pages.system-message', ['str'=>$str_msg,'previous_page'=>$previous_page]);
 }

}
