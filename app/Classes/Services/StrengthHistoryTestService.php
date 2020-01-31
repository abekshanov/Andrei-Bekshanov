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

    public static function getByDateCurUser($curUser, $startDate=0, $endDate=0)
    {
        if ($startDate&&$endDate) {
            /*если переданы параметры началная и конечная дата, то выводить за период*/
            $list = DB::select("
            select subselect.* from (
                select sh.users_id, sh.strength_tests_id, sh.result, sh.created_at, sh.updated_at, s.name from strength_tests as s
                    inner join strength_history_tests as sh
                    on sh.strength_tests_id = s.id
                where sh.users_id = ?
                ) as subselect
            where created_at < ?
            and created_at > ?
            ", [$curUser, $endDate, $startDate]);
        } else {
            /*если даты не указаны, то выводить последнюю запись по каждому тесту для текущего пользователя*/
            $list = DB::select("
                select sh.users_id, sh.strength_tests_id, sh.result, sh.created_at, sh.updated_at, s.name
                from strength_history_tests as sh
                    inner join (select strength_tests_id as tid, max(created_at) as mc
                                from strength_history_tests
                                where users_id = ?
                                group by strength_tests_id) as ld
                    on sh.strength_tests_id = ld.tid and sh.created_at=ld.mc
                    inner join strength_tests as s
                    on ld.tid = s.id
            ", [$curUser]);
        }
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
