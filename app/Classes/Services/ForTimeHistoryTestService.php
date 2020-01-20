<?php

namespace App\Classes\Services;

use App\ForTimeHistoryTest;
use App\Classes\DataConverter as DataConverter;
use Illuminate\Support\Facades\DB;

class ForTimeHistoryTestService
{
    // Класс для работы с моделью ForTimeHistoryTest БД: Добавить запись, удалить, редактировать, выбрать данные
    public static function create($inputData)
    {
        $result = new ForTimeHistoryTest();
        $result->users_id = $inputData['currentUserId'];
        $result->for_time_tests_id = $inputData['testId'];
        $result->result = DataConverter::toSeconds($inputData['minutes'], $inputData['seconds']);
        $created=$result->save();
        return $created;
    }

    public static function delete($id)
    {
        $deleted=ForTimeHistoryTest::where('id',$id)->delete();
        return $deleted;
    }

    public static function getAll()
    {
        $list = ForTimeHistoryTest::all();
        return $list;
    }

    public static function getById($id)
    {
        $full=ForTimeHistoryTest::find($id);
        return $full;
    }

    protected static function changeResultFormat($list)
    {
        // подменяет значение поля result в массиве list на форматированный вид времени
        $i=0;
        foreach ($list as $item){
            $list[$i]->result=DataConverter::toMinutesSeconds($item->result);
            $i++;
        }
        return $list;
    }

    public static function getWithName()
    {
        $list = DB::select('select * from for_time_tests as t inner join for_time_history_tests as th on th.for_time_tests_id = t.id');
        $result=self::changeResultFormat($list);
        return $result;
    }

/*    public static function update($inputData)
    {
        $result=ForTimeHistoryTest::find($inputData['id']);
        $result->users_id = $inputData['currentUserId'];
        $result->for_time_tests_id = $inputData['testId'];
        $result->result = $inputData['result'];
        $updated=$result->save();
        return $updated;
    }*/
}
