@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row m-0">
            <a href="{{route('add-program')}}" class="col-3 btn btn-sm btn-primary  my-3 ">Добавить новую программу</a>
            <div class="col-9"></div>
        </div> <!--endRow-->
        <h4>Программы</h4>
        <table>
            @foreach($listTrainingPrograms as $listTrainingProgram)
                <tr>
                    <td>
                        <a
                            href="{{route('list-tasks', ['programId' => $listTrainingProgram->id,
                                                         'programName' => $listTrainingProgram->name])}}"
                            class="list-group-item list-group-item-action list-group-item-info my-1 py-1"
                        >
                            {{$listTrainingProgram->name}}
                        </a>
                    </td>
                    <td>
                        <a href="{{route('delete-program',['programId' => $listTrainingProgram->id])}}"
                           class="btn btn-sm btn-primary ml-3 my-1" >Удалить</a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
