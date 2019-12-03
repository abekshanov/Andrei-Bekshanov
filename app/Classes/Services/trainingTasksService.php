<?php

namespace App\Classes\Services;

use App\training_task;

class trainingTasksService
{
    // Класс для работы с моделью training_task БД: Добавить запись, удалить, редактировать, выбрать данные
    public function addToDb ($input_data){
        $tasks = new training_task();
        $tasks->header = $input_data['header'];
        $tasks->content = $input_data['content'];
        $tasks->training_programs_id = $input_data['program_id'];
        $tasks->save();
    }

}
