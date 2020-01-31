<?php

namespace App\Classes\Services;

use App\User;

class UserService
{
    // Класс для работы с моделью Users БД: Добавить запись, удалить, редактировать, выбрать данные
    public static function getAll()
    {
        $athletes = User::all();

        return $athletes;
    }

}
