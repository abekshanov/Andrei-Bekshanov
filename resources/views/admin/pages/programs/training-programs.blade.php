@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row m-0">
            <a href="{{route('add-program')}}" class="col-3 btn btn-sm btn-primary  my-3 ">Добавить программу</a>
            <div class="col-9"></div>
        </div> <!--endRow-->
        <table>
            @foreach($listTrainingPrograms as $listTrainingProgram)
                <tr>
                    <td>
                        <a href="{{route('list-tasks', array('programId' => $listTrainingProgram->id, 'programName' => $listTrainingProgram->name))}}" class="list-group-item list-group-item-action list-group-item-info my-1 py-1">{{$listTrainingProgram->id." ".$listTrainingProgram->name}}</a>
                    </td>
                    <td>
                        <a href="{{route('delete-program',['programId' => $listTrainingProgram->id])}}" class="btn btn-sm btn-primary ml-3 my-1" >Удалить программу</a>
                    </td>
                </tr>
            @endforeach
                <tr>
                    <td>
                        <a href="{{route('list-tasks',array('programId' => 'NULL', 'programName' => 'Архивные тренировки (из удаленных программ)'))}}" class="list-group-item list-group-item-action list-group-item-info my-1 py-1">Архивные тренировки (из удаленных программ)</a>
                    </td>
                 </tr>
        </table>
    </div>
@endsection
