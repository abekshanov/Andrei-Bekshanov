<?php

namespace App\Classes\Services;

use App\ForRepsHistoryTest;
use Illuminate\Support\Facades\DB;

class ForRepsHistoryTestService
{
    // Класс для работы с моделью ForRepsHistoryTest БД: Добавить запись, удалить, редактировать, выбрать данные
    public static function create($inputData)
    {
        $result = new ForRepsHistoryTest();
        $result->users_id = $inputData['currentUserId'];
        $result->for_reps_tests_id = $inputData['testId'];
        $result->result = $inputData['result'];
        $created=$result->save();
        return $created;
    }

    public static function delete($id)
    {
        $deleted=ForRepsHistoryTest::where('id',$id)->delete();
        return $deleted;
    }

    public static function getAll()
    {
        $list = ForRepsHistoryTest::all();
        return $list;
    }

    public static function getWithName()
    {
        $list = DB::select('select * from for_reps_tests as r inner join for_reps_history_tests as rh on rh.for_reps_tests_id = r.id');
        return $list;
    }

/*    public static function getById($id)
    {
        $full=ForRepsHistoryTest::find($id);
        return $full;
    }*/

/*    public static function update($inputData)
    {
        $result=ForRepsHistoryTest::find($inputData['id']);
        $result->users_id = $inputData['currentUserId'];
        $result->for_reps_tests_id = $inputData['testId'];
        $result->result = $inputData['result'];
        $updated=$result->save();
        return $updated;
    }*/
}
