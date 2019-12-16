@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row m-0">
{{--            <a href="{{URL::previous()}}" class="col-3 btn btn-sm btn-primary  my-3" >Назад</a>--}}
            <div class="col-6"></div>
{{--            <a href="{{route('delete-task', ['taskId' => $fullTask->id])}}" class="col-3 btn btn-sm btn-primary  my-3" >Удалить тренировку</a>--}}
        </div>

        <form method="post"  action="{{route('update-test-data')}}" >
            {{ csrf_field() }}
            <input type="hidden" name="modelName"  value="{{$modelName}}">
            <input type="hidden" name="id"  value="{{$fullTest->id}}">
            <p>Название теста</p>
            <input type="text" name="name" value="{{$fullTest->name}}" id="" class="w-100">
            <input type="submit" value="Сохранить">
        </form>
    </div>
@endsection

