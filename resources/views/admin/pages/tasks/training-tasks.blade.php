@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row m-0">
            <a href="{{route('add-task',['programId' => session('programId')])}}" class="col-3 btn btn-sm btn-primary  my-3  ">
                Добавить новую тренировку
            </a>
            <div class="col-6"></div>
            <a href="{{route('form-program-db')}}" class="col-3 btn btn-sm btn-primary  my-3  ">Изменить название программы</a>
        </div> <!--endrow-->
        <div class="row m-0">
            <a href="{{route('training-programs')}}" class="col-3 btn btn-sm btn-primary  my-3" >Назад</a>
            <div class="col-6"></div>
            <a href="{{route('delete-program',['programId' => session('programId')])}}" class="col-3 btn btn-sm btn-primary  my-3  " >
                Удалить программу
            </a>
        </div> <!--endrow-->
        <h4>{{session('programName')}}</h4>
        <table>
           @foreach($listTrainingTasks as $listTrainingTask)
               <tr>
                   <td>
                       <a href="{{route('show-full-task',['taskId'=>$listTrainingTask->id])}}"
                          class=" list-group-item list-group-item-action list-group-item-info my-1 py-1">
                           {{$listTrainingTask->header}}
                       </a>
                   </td>
                   <td>
                       <a href="{{route('delete-task', ['taskId' => $listTrainingTask->id])}}"
                          class="btn btn-sm btn-primary ml-3" >Удалить</a>
                   </td>
               </tr>
           @endforeach
        </table>
    </div>
@endsection

