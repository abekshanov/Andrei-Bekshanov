<?php

namespace App\Http\Controllers\tests;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class testcontroller1 extends Controller
{
    // для экспериментов
    public function index($title){
        $address="pages/mvc-pages/".$title;
       return view('pages.mvc-page', compact('title','address'));
    }
}