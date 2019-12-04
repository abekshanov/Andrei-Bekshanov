<?php

namespace App\Http\Controllers\Pages;

use App\Classes\Services\TrainingProgramsService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProgramsController extends Controller
{
    //programs controller
 public function listTrainingPrograms (){
     $listTrainingPrograms=TrainingProgramsService::showPrograms();
     return view('admin.pages.programs.training-programs',compact('listTrainingPrograms'));
 }

 public  function addPrograms (Request $request){
     $previousPage='training-programs'; //страница на которую можно вернуться
     $input=$request->all();
     $isAdded=trainingProgramsService::addProgram($input);

     if ($isAdded) {
         $strMsg='Программа успешно добавлена';
     } else {
         $strMsg='Не удалось добавить программу(((';
     }
     return view('pages.system-message', ['strMsg'=>$strMsg,'previousPage'=>$previousPage]);
 }

 public function deletePrograms ($programId){

     $previousPage='training-programs'; //страница на которую можно вернуться
     $isDeleted=TrainingProgramsService::deleteProgram($programId);

     if ($isDeleted){
         $strMsg='Программа успешно удалена, связанные с ней тренировки сохнранены в "Архив тренировок"';
     } else {
         $strMsg='Не удалось удалить программу ((("';
     }

     return view('pages.system-message', compact('strMsg', 'previousPage'));
 }



}

