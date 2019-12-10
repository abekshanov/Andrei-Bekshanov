<?php

namespace App\Http\Controllers\Pages;

use App\Classes\Services\TrainingProgramsService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProgramsController extends Controller
{
    //programs controller
 public function listTrainingPrograms()
 {
     $listTrainingPrograms=TrainingProgramsService::getAll();
     return view('admin.pages.programs.training-programs',compact('listTrainingPrograms'));
 }

 public  function addPrograms(Request $request)
 {
     $input=$request->all();
     $added=trainingProgramsService::create($input);

     $status="";
     $errors="";

     if ($added){
         $status='Программа успешно добавлена!';
     } else{
         $errors='Ошибка!';
     }

     return redirect()->route('training-programs')
         ->with('status', $status)
         ->with('errors', $errors);
 }

 public function deletePrograms($programId)
 {
     $deleted=TrainingProgramsService::delete($programId);

     $status="";
     $errors="";

     if ($deleted){
         $status='Программа успешно удалена, связанные с ней тренировки сохнранены в "Архив тренировок"';
     } else{
         $errors='Ошибка!';
     }

     return redirect()->route('training-programs')
         ->with('status', $status)
         ->with('errors', $errors);
 }

 public function updatePrograms(Request $request)
 {
     $input=$request->all();
     $updated=trainingProgramsService::update($input);

     $status="";
     $errors="";

     if ($updated){
         $status='Программа успешно сохранена!';
     } else{
         $errors='Ошибка!';
     }

     return redirect()->route('training-programs')
         ->with('status', $status)
         ->with('errors', $errors);
 }


}

