@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
             <div class="col-4"></div>
             <a href="{{route('add-program')}}" class="col-4 btn btn-sm btn-primary  my-3 ">Добавить программу</a>
             <div class="col-4"></div>
        </div> <!--endrow-->
        <div class="listgroup">
           @foreach($listTrainingPrograms as $listTrainingProgram)
                <a href="{{route('change-programs',$listTrainingProgram->id)}}" class="list-group-item list-group-item-action list-group-item-info my-1 py-0">{{$listTrainingProgram->id." ".$listTrainingProgram->name}}</a>
           @endforeach
        </div>
    </div>
@endsection

