@extends('layouts.app')

@section('content')
    <div class="container">
        <p>Название тренировки:</p>
        <p>{{$result->header}}</p>
        <p>Задание:</p>
        <p>{{$result->content}}</p>
        <p>Результат</p>
        <p>{{$result->results}}</p>

    </div>
@endsection

