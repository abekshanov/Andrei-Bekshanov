<?php

namespace App\Classes\Services;

use App\TrainingProgram;

class TrainingProgramsService
{
    // Класс для работы с моделью TrainingProgram БД: Добавить запись, удалить, редактировать, выбрать данные
    public static function create($inputData)
    {
        $program = new TrainingProgram();
        $program->name = $inputData['name'];
        $created=$program->save();
        return $created;
    }

    public static function delete($programId)
    {
        $deleted=TrainingProgram::where('id',$programId)->delete();
        return $deleted;
    }

    public static function getAll()
    {
        $listPrograms=TrainingProgram::all();
        return $listPrograms;
    }

    public static function update($inputData)
    {
        $program = TrainingProgram::find($inputData['id']);
        $program->name = $inputData['name'];
        $updated=$program->save();
        return $updated;
    }

}
