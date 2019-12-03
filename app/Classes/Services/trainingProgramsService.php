<?php

namespace App\Classes\Services;

use App\training_program;

class trainingProgramsService
{
    // Класс для работы с моделью training_program БД: Добавить запись, удалить, редактировать, выбрать данные
    public function addProgramToDb ($input_data){
        $program = new training_program();
        $program->name = $input_data['name'];
        $program->save();
    }

    public function deleteProgramFromDb ($program_id){
        $program = new training_program();
        $program::where('id',$program_id)->delete();
    }

    public function showProgramsFromDb (){
        $programs=training_program::all();
        return $programs;
    }

}
