<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TestsController extends Controller
{
    //
    public function listTests()
    {
        return view('admin.pages.tests.tests');
    }
}
