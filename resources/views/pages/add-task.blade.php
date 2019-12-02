@extends('layouts.app')

@section('content')
    <div class="container">
        <p>Страница для добавления новой тренировки в БД</p>
        <form method="post"  action="{{route('add-task-db')}}" >
            {{ csrf_field() }}
            <p>Название тренировки</p>
            <input type="text" name="header" id="" class="w-100">
            <p>Задания на тренировку</p>
            <textarea name="content" id="" cols="30" class="w-100 data-spy" rows="15"></textarea>
            <input type="submit" value="Добавить">
        </form>
    </div>
@endsection

