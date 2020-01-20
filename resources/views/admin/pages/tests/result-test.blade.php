@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row m-0">
            <a href="{{URL::previous()}}" class="col-3 btn btn-sm btn-primary  my-3" >Назад</a>
            <div class="col-6"></div>
        </div>

        <form method="post"  action="{{route('add-result-test')}}" >
            {{ csrf_field() }}
            <input type="hidden" name="modelName"  value="{{$modelName}}">
            <input type="hidden" name="testId"  value="{{$fullTest->id}}">
            <p>Название теста: {{$fullTest->name}} </p>
            <input type="number" name="minutes" value="00" id=""  class="col-2"> : <input type="number" name="seconds" value="00" id="" class="col-2">
            <input type="submit" value="Сохранить">
        </form>
    </div>
@endsection

