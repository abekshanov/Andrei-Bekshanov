<?php

namespace App\Classes\Services;

use App\TrainingTask;

class trainingTasksService
{
    // Класс для работы с моделью TrainingTask БД: Добавить запись, удалить, редактировать, выбрать данные
    public static function addToDb($inputData)
    {
        $tasks = new TrainingTask();
        $tasks->header = $inputData['header'];
        $tasks->content = $inputData['content'];
        $tasks->training_programs_id = $inputData['programId'];
        $tasks->save();
    }

    public static function showTaskList($programId)
    {
        $tasks= new TrainingTask();
        if ($programId=="NULL") { $listTrainingTasks=$tasks::whereNull('training_programs_id')->get(); }
        else {
            $listTrainingTasks = $tasks::where('training_programs_id', $programId)->get();
        }
        return $listTrainingTasks;
    }

    public static function showFullTask($taskId)
    {
        $fullTask=TrainingTask::find($taskId);
        return $fullTask;
    }

    public static function update($inputData)
    {
        $task=TrainingTask::find($inputData['id']);
        $task->header = $inputData['header'];
        $task->content = $inputData['content'];
        $isUpdated=$task->save();
        return $isUpdated;
    }
}
