@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row m-0">
            <a href="{{URL::previous()}}" class="col-3 btn btn-sm btn-primary  my-3" >Назад</a>
            <a href="{{route}}" class="col-3 btn btn-sm btn-primary  my-3" >Назад</a>
        </div>

        <form method="post"  action="{{route('update-task-data')}}" >
            {{ csrf_field() }}
            <input type="hidden" name="id"  value="{{$fullTask->id}}">
            <p>Название тренировки</p>
            <input type="text" name="header" value="{{$fullTask->header}}" id="" class="w-100">
            <p>Задания на тренировку</p>
            <textarea name="content"  id="" cols="30" class="w-100 data-spy" rows="15">{{$fullTask->content}}</textarea>
            <input type="submit" value="Сохранить">
        </form>
    </div>
@endsection

