<?php

namespace App\Classes\Services;

use App\TrainingProgram;

class TrainingProgramsService
{
    // Класс для работы с моделью TrainingProgram БД: Добавить запись, удалить, редактировать, выбрать данные
    public static function addProgram($inputData)
    {
        $program = new TrainingProgram();
        $program->name = $inputData['name'];
        $isAdded=$program->save();
        return $isAdded;
    }

    public static function deleteProgram($programId)
    {
        $isDeleted=TrainingProgram::where('id',$programId)->delete();
        return $isDeleted;
    }

    public static function showPrograms()
    {
        $listPrograms=TrainingProgram::all();
        return $listPrograms;
    }

    public static function updateProgram($inputData)
    {
        $program = TrainingProgram::find($inputData['id']);
        $program->name = $inputData['name'];
        $isUpdated=$program->save();
        return $isUpdated;
    }

}
