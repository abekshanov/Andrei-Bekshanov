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

    public function showFromDb ($program_id){
        $tasks= new training_task();
        if ($program_id=="NULL") { $listTrainingTasks=$tasks::whereNull('training_programs_id')->get(); }
        else {
            $listTrainingTasks = $tasks::where('training_programs_id', $program_id)->get();
        }
        return $listTrainingTasks;
    }

    public function showFullTaskDb ($task_id){
        $full_task=training_task::find( $task_id);
        return $full_task;
    }

}
