<?php

namespace App\Classes\Services;

use App\ForRepsHistoryTest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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

    public static function getByDateCurUser($curUser, $startDate=0, $endDate=0)
    {
        if ($startDate&&$endDate) {
            /*если переданы параметры началная и конечная дата, то выводить запериод*/
            $list = DB::select("
            select subselect.* from (
                select rh.users_id, rh.for_reps_tests_id, rh.result, rh.created_at, rh.updated_at, r.name from for_reps_tests as r
                    inner join for_reps_history_tests as rh
                    on rh.for_reps_tests_id = r.id
                where rh.users_id = ?
                ) as subselect
            where created_at < ?
            and created_at > ?
            ", [$curUser, $endDate, $startDate]);
        } else {
            /*если даты не указаны, то выводить последнюю запись по каждому тесту для текущего пользователя*/
            $list = DB::select("
                select rh.users_id, rh.for_reps_tests_id, rh.result, rh.created_at, rh.updated_at, r.name
                from for_reps_history_tests as rh
                    inner join (select for_reps_tests_id as tid, max(created_at) as mc
                                from for_reps_history_tests
                                where users_id = ?
                                group by for_reps_tests_id) as ld
                    on rh.for_reps_tests_id = ld.tid and rh.created_at=ld.mc
                    inner join for_reps_tests as r
                    on ld.tid = r.id
            ", [$curUser]);
        }
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
