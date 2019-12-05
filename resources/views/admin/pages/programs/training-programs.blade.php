@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row m-0">
            <a href="{{route('add-program')}}" class="col-3 btn btn-sm btn-primary  my-3 ">Добавить программу</a>
            <div class="col-9"></div>
        </div> <!--endRow-->
        <div class="listgroup">
           @foreach($listTrainingPrograms as $listTrainingProgram)
                <a href="{{route('change-programs', array('programId' => $listTrainingProgram->id, 'programName' => $listTrainingProgram->name))}}" class="list-group-item list-group-item-action list-group-item-info my-1 py-0">{{$listTrainingProgram->id." ".$listTrainingProgram->name}}</a>
           @endforeach
           <a href="{{route('change-programs',array('programId' => 'NULL', 'programName' => 'Архивные тренировки (из удаленных программ)'))}}" class="list-group-item list-group-item-action list-group-item-info my-1 py-0">Архивные тренировки (из удаленных программ)</a>
        </div>
    </div>
@endsection
