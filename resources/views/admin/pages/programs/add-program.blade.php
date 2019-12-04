@extends('layouts.app')

@section('content')
    <div class="container">
        <p>Страница для добавления новой программы тренировок в БД</p>
        <form method="post"  action="{{route('add-program-db')}}" >
            {{ csrf_field() }}
            <p>Название программы</p>
            <input type="text" name="name" id="" class="w-100">
            <input type="submit" value="Добавить">
        </form>
    </div>
@endsection

