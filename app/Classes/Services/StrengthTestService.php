<?php

namespace App\Classes\Services;

use App\StrengthTest;

class StrengthTestService
{
    // Класс для работы с моделью StrengthTest БД: Добавить запись, удалить, редактировать, выбрать данные
    public static function create($inputData)
    {
        $tests = new StrengthTest();
        $tests->name = $inputData['name'];
        $created=$tests->save();
        return $created;
    }

    public static function delete($testId)
    {
        $deleted=StrengthTest::where('id',$testId)->delete();
        return $deleted;
    }

    public static function getAll()
    {
        $listStrengthTests = StrengthTest::all();
        return $listStrengthTests;
    }

    public static function getById($testId)
    {
        $fullTest=StrengthTest::find($testId);
        return $fullTest;
    }

    public static function update($inputData)
    {
        $test=StrengthTest::find($inputData['id']);
        $test->name = $inputData['name'];
        $updated=$test->save();
        return $updated;
    }
}
