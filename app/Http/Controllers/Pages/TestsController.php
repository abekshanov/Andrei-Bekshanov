<?php

namespace App\Http\Controllers\Pages;

use App\Classes\Services\ForRepsTestService;
use App\Classes\Services\ForTimeTestService;
use App\Classes\Services\StrengthTestService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception;

class TestsController extends Controller
{
    //
    public function listTests()
    {
        try {
            $listStrengthTests=StrengthTestService::getAll();
            $listForRepsTests=ForRepsTestService::getAll();
            $listForTimeTests=ForTimeTestService::getAll();
            return view('admin.pages.tests.tests', compact('listStrengthTests', 'listForRepsTests', 'listForTimeTests'));
        }catch (Exception $exception){
            $errors=$exception->getMessage();
            return back()->withErrors($errors);
        }
    }

    public function fullTest($testId, $modelName)
    {
        try{
            if ($modelName=='StrengthTest') $fullTest=StrengthTestService::getById($testId);
            elseif ($modelName=='ForRepsTest') $fullTest=ForRepsTestService::getById($testId);
            elseif ($modelName=='ForTimeTest') $fullTest=ForTimeTestService::getById($testId);

            return view('admin.pages.tests.full-strength-test', compact('fullTest', 'modelName'));
        }catch (Exception $exception){
            $errors=$exception->getMessage();
            return back()->withErrors($errors);
        }
    }

    public function updateTests(Request $request)
    {
        try {
            $input=$request->all();

            if ($input['modelName']=='StrengthTest') $fullTest=StrengthTestService::update($input);
            elseif ($input['modelName']=='ForRepsTest') $fullTest=ForRepsTestService::update($input);
            elseif ($input['modelName']=='ForTimeTest') $fullTest=ForTimeTestService::update($input);


            $status="Данные сохранены успешно!";
            return redirect()->route('list-tests')->with('status', $status);
        }catch (Exception $exception){
            $errors=$exception->getMessage();
            return back()->withErrors($errors);
        }
    }

}
