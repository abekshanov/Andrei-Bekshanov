@extends('layouts.app')

@section('content')
    <div class="container">
        <p>{{$strMsg}}</p>
        <a href="{{route($previousPage)}}" class="col-3 m-3">Вернуться назад</a>
    </div>
@endsection

