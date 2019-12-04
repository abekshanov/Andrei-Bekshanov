@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <a href="{{route('add-task',['programId'=>$programId])}}" class="col-3 btn btn-sm btn-primary  my-3  ">Добавить новую тренировку</a>
            <div class="col-6"></div>
            <div class="col-3 btn btn-sm btn-primary  my-3  ">Изменить название программы</div>
        </div> <!--endrow-->
        <div class="row">
            <div class="col-9"></div>
            <a href="{{route('delete-program',['programId'=>$programId])}}" class="col-3 btn btn-sm btn-primary  my-3" >Удалить программу</a>
        </div> <!--endrow-->
        <div class="listgroup">
           @foreach($listTrainingTasks as $listTrainingTask)
                <a href="{{route('show-full-task',['taskId'=>$listTrainingTask->id])}}" class="list-group-item list-group-item-action list-group-item-info my-1 py-0">{{$listTrainingTask->id." ".$listTrainingTask->header}}</a>
           @endforeach
        </div>
    </div>
@endsection

