@extends('layouts.app')

@section('content')
    <div class="container">
        <p>Название тренировки:</p>
        <p>{{$fullTask->header}}</p>
        <p>Задание:</p>
        <p>{{$fullTask->content}}</p>
        <p>Результат</p>
        <p>{{$fullTask->results}}</p>

    </div>
@endsection

