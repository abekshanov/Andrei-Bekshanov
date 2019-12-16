<?php

namespace App\Classes\Services;

use App\ForRepsTest;

class ForRepsTestService
{
    // Класс для работы с моделью ForRepsTest БД: Добавить запись, удалить, редактировать, выбрать данные
    public static function create($inputData)
    {
        $tests = new ForRepsTest();
        $tests->name = $inputData['header'];
        $created=$tests->save();
        return $created;
    }

    public static function delete($testId)
    {
        $deleted=ForRepsTest::where('id',$testId)->delete();
        return $deleted;
    }

    public static function getAll()
    {
        $listForRepsTests = ForRepsTest::all();
        return $listForRepsTests;
    }

    public static function getById($testId)
    {
        $fullTest=ForRepsTest::find($testId);
        return $fullTest;
    }

    public static function update($inputData)
    {
        $test=ForRepsTest::find($inputData['id']);
        $test->name = $inputData['name'];
        $updated=$test->save();
        return $updated;
    }
}
