<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
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
}
