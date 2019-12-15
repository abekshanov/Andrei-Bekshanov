<?php

namespace App\Http\Controllers\Pages;

use App\Classes\Services\TrainingProgramsService;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProgramRequest;
use Illuminate\Http\Request;
use Exception;

class ProgramsController extends Controller
{
    //programs controller
 public function listTrainingPrograms()
 {
     try{
         $listTrainingPrograms=TrainingProgramsService::getAll();
         return view('admin.pages.programs.training-programs',compact('listTrainingPrograms'));
     }catch (Exception $exception){
         $errors=$exception->getMessage();
         return back()->withErrors($errors);
     }
  }

 public function addPrograms(ProgramRequest $request)
 {
     $input=$request->all();

     try {
         trainingProgramsService::create($input);
         $status='Программа успешно добавлена!';
         return redirect()->route('training-programs')
             ->with('status', $status);
     }catch (Exception $exception){
         $errors=$exception->getMessage();
         return back()->withErrors($errors);
     }
 }

 public function deletePrograms($programId)
 {
    try{
        TrainingProgramsService::delete($programId);
        $status='Программа успешно удалена, связанные с ней тренировки сохнранены в "Архив тренировок"';
        return redirect()->route('training-programs')
            ->with('status', $status);
    }catch (Exception $exception){
        $errors=$exception->getMessage();
        return back()->withErrors($errors);
    }
 }

 public function updatePrograms(ProgramRequest $request)
 {
     $input=$request->all();
     try {
         trainingProgramsService::update($input);
         $status='Программа успешно сохранена!';
         return redirect()->route('training-programs')
             ->with('status', $status);
     }catch (Exception $exception){
         $errors=$exception->getMessage();
         return back()->withErrors($errors);
     }
 }

}

