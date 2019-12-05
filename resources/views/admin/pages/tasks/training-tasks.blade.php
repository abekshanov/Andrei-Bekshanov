@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row m-0">
            <a href="{{route('add-task',['programId' => $programId])}}" class="col-3 btn btn-sm btn-primary  my-3  ">Добавить новую тренировку</a>
            <div class="col-6"></div>
            <a href="{{route('form-program-db', compact('programId', 'programName'))}}" class="col-3 btn btn-sm btn-primary  my-3  ">Изменить название программы</a>
        </div> <!--endrow-->
        <div class="row m-0">
            <a href="{{route('training-programs')}}" class="col-3 btn btn-sm btn-primary  my-3" >Назад</a>
            <div class="col-6"></div>
            <a href="{{route('delete-program',['programId' => $programId])}}" class="col-3 btn btn-sm btn-primary  my-3" >Удалить программу</a>
        </div> <!--endrow-->
        <p>Программа: {{$programName}}</p>
        <table>
           @foreach($listTrainingTasks as $listTrainingTask)
               <tr>
                   <td>
                       <a href="{{route('show-full-task',['taskId'=>$listTrainingTask->id])}}" class="list-group-item list-group-item-action list-group-item-info my-1 py-0">{{$listTrainingTask->id." ".$listTrainingTask->header}}</a>
                   </td>
               </tr>
           @endforeach
        </table>
    </div>
@endsection

