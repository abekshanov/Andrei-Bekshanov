@extends('layouts.app')

@section('content')
    <div class="container">
        <p>Страница для добавления новой программы тренировок в БД</p>
        <div class="row m-0">
            <a href="{{URL::previous()}}" class="col-3 btn btn-sm btn-primary  my-3" >Назад</a>
        </div>
        <form method="post"  action="{{route('update-program-db')}}" >
            {{ csrf_field() }}
            <p>Название программы</p>
            <input name="id" type="hidden" value="{{$programId}}">
            <input type="text" name="name" id="" value="{{$programName}}" class="w-100">
            <input type="submit" value="Обновить">
        </form>
    </div>
@endsection

