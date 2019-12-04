@extends('layouts.app')

@section('content')
    <div class="container">
        <p>{{$str}}</p>
        <a href="{{route($previous_page)}}" class="col-3 m-3">Вернуться назад</a>
    </div>
@endsection

