<?php

namespace App\Classes\Services;

use App\ForTimeHistoryTest;
use App\Classes\DataConverter as DataConverter;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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
        $list=self::changeResultFormat($list);
        return $list;
    }

    public static function getByDateCurUser($curUser, $startDate=0, $endDate=0)
    {
        if ($startDate&&$endDate) {
            /*если переданы параметры началная и конечная дата, то выводить за период для текущего пользователя*/
            $list = DB::select("
            select subselect.* from (
                select th.users_id, th.for_time_tests_id, th.result, th.created_at, th.updated_at, t.name from for_time_tests as t
                    inner join for_time_history_tests as th
                    on th.for_time_tests_id = t.id
                where th.users_id = ?
                ) as subselect
            where created_at < ?
            and created_at > ?
            ", [$curUser, $endDate, $startDate]);
        } else {
            /*если даты не указаны, то выводить последнюю запись по каждому тесту для текущего пользователя*/
            $list = DB::select("
                select th.users_id, th.for_time_tests_id, th.result, th.created_at, th.updated_at, t.name
                from for_time_history_tests as th
                    inner join (select for_time_tests_id as tid, max(created_at) as mc
                                from for_time_history_tests
                                where users_id = ?
                                group by for_time_tests_id) as ld
                    on th.for_time_tests_id = ld.tid and th.created_at=ld.mc
                    inner join for_time_tests as t
                    on ld.tid = t.id
            ", [$curUser]);
        }
        $list=self::changeResultFormat($list);
        return $list;
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
