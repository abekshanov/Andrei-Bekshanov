<?php

namespace App\Classes\Services;

use App\StrengthHistoryTest;
use Illuminate\Support\Facades\DB;

class StrengthHistoryTestService
{
    // Класс для работы с моделью StrengthHistoryTest БД: Добавить запись, удалить, редактировать, выбрать данные
    public static function create($inputData)
    {
        $result = new StrengthHistoryTest();
        $result->users_id = $inputData['currentUserId'];
        $result->strength_tests_id = $inputData['testId'];
        $result->result = $inputData['result'];
        $created=$result->save();
        return $created;
    }

    public static function delete($id)
    {
        $deleted=StrengthHistoryTest::where('id',$id)->delete();
        return $deleted;
    }

    public static function getAll()
    {
        $list = StrengthHistoryTest::all();
        return $list;
    }

    public static function getWithName()
    {
        $list = DB::select('select * from strength_tests as s inner join strength_history_tests as sh on sh.strength_tests_id = s.id');
        return $list;
    }


/*    public static function getById($id)
    {
        $full=StrengthHistoryTest::find($id);
        return $full;
    }*/

/*    public static function update($inputData)
    {
        $result=StrengthHistoryTest::find($inputData['id']);
        $result->users_id = $inputData['currentUserId'];
        $result->strength_tests_id = $inputData['testId'];
        $result->result = $inputData['result'];
        $updated=$result->save();
        return $updated;
    }*/
}
