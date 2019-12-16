<?php

namespace App\Classes\Services;

use App\ForTimeTest;

class ForTimeTestService
{
    // Класс для работы с моделью ForTimeTest БД: Добавить запись, удалить, редактировать, выбрать данные
    public static function create($inputData)
    {
        $tests = new ForTimeTest();
        $tests->name = $inputData['header'];
        $created=$tests->save();
        return $created;
    }

    public static function delete($testId)
    {
        $deleted=ForTimeTest::where('id',$testId)->delete();
        return $deleted;
    }

    public static function getAll()
    {
        $listForTimeTests = ForTimeTest::all();
        return $listForTimeTests;
    }

    public static function getById($testId)
    {
        $fullTest=ForTimeTest::find($testId);
        return $fullTest;
    }

    public static function update($inputData)
    {
        $test=ForTimeTest::find($inputData['id']);
        $test->name = $inputData['name'];
        $updated=$test->save();
        return $updated;
    }
}
