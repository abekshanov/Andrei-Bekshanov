<?php

namespace App\Http\Controllers\Pages;

use App\Classes\Services\ForRepsTestService;
use App\Classes\Services\ForTimeTestService;
use App\Classes\Services\StrengthTestService;
use App\Classes\Services\StrengthHistoryTestService;
use App\Classes\Services\ForRepsHistoryTestService;
use App\Classes\Services\ForTimeHistoryTestService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception;

class TestsController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

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

            return view('admin.pages.tests.full-test', compact('fullTest', 'modelName'));
        }catch (Exception $exception){
            $errors=$exception->getMessage();
            return back()->withErrors($errors);
        }
    }

    public function addTests(Request $request)
    {
        try {
            $input=$request->all();

            if ($input['modelName']=='StrengthTest') StrengthTestService::create($input);
            elseif ($input['modelName']=='ForRepsTest') ForRepsTestService::create($input);
            elseif ($input['modelName']=='ForTimeTest') ForTimeTestService::create($input);


            $status="Данные добавлены успешно!";
            return redirect()->route('list-tests')->with('status', $status);
        }catch (Exception $exception){
            $errors=$exception->getMessage();
            return back()->withErrors($errors);
        }
    }


    public function updateTests(Request $request)
    {
        try {
            $input=$request->all();

            if ($input['modelName']=='StrengthTest') StrengthTestService::update($input);
            elseif ($input['modelName']=='ForRepsTest') ForRepsTestService::update($input);
            elseif ($input['modelName']=='ForTimeTest') ForTimeTestService::update($input);


            $status="Данные сохранены успешно!";
            return redirect()->route('list-tests')->with('status', $status);
        }catch (Exception $exception){
            $errors=$exception->getMessage();
            return back()->withErrors($errors);
        }
    }


    public function deleteTest($testId, $modelName)
    {
        try{
            if ($modelName=='StrengthTest') StrengthTestService::delete($testId);
            elseif ($modelName=='ForRepsTest') ForRepsTestService::delete($testId);
            elseif ($modelName=='ForTimeTest') ForTimeTestService::delete($testId);
            $status="Тест успешно удален!";
            return redirect(route('list-tests'))->with('status', $status);;
        }catch (Exception $exception){
            $errors=$exception->getMessage();
            return back()->withErrors($errors);
        }
    }


    public function inputResultTest($testId, $modelName)
    {
        try{
            if ($modelName=='StrengthTest') $fullTest=StrengthTestService::getById($testId);
            elseif ($modelName=='ForRepsTest') $fullTest=ForRepsTestService::getById($testId);
            elseif ($modelName=='ForTimeTest') $fullTest=ForTimeTestService::getById($testId);

            return view('admin.pages.tests.result-test', compact('fullTest', 'modelName'));
        }catch (Exception $exception){
            $errors=$exception->getMessage();
            return back()->withErrors($errors);
        }
    }

    public function addResultTest(Request $request)
    {
        try {
            $input=$request->all();
            $input['currentUserId']=$request->user()->id;
            if ($input['modelName']=='StrengthTest') StrengthHistoryTestService::create($input);
            elseif ($input['modelName']=='ForRepsTest') ForRepsHistoryTestService::create($input);
            elseif ($input['modelName']=='ForTimeTest') ForTimeHistoryTestService::create($input);

            $status="Данные добавлены успешно!";
            return redirect()->route('list-tests')->with('status', $status);
        }catch (Exception $exception){
            $errors=$exception->getMessage();
            return back()->withErrors($errors);
        }
    }

    public function listResultTests()
    {
        try {
            $listResultStrengthTests=StrengthHistoryTestService::getWithName();
            $listResultForRepsTests=ForRepsHistoryTestService::getWithName();
            $listResultForTimeTests=ForTimeHistoryTestService::getWithName();


            return view('pages.system-message', compact(
                'listResultStrengthTests',
                'listResultForRepsTests',
                'listResultForTimeTests'));
        }catch (Exception $exception){
            $errors=$exception->getMessage();
            return back()->withErrors($errors);
        }
    }



}
