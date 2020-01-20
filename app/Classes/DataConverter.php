<?php

namespace App\Classes;



class DataConverter
{
    // Класс для конвертации дынных из одного представления в другое
    public static function toSeconds($minutes, $seconds)
    {
        $result = $minutes*60+$seconds;
        return $result; //возвращает секунды одним числом
    }

    public static function toMinutesSeconds($seconds)
    {
        $beforeDot=floor($seconds / 60);
        $afterDot=($seconds / 60)-$beforeDot;
        $sec=$afterDot*60;
        if ($sec<10) {$sec="0".$sec;}

        $result = $beforeDot.":".$sec;
        return $result; // возвращает строку в формате минуты:секунды
    }

}
