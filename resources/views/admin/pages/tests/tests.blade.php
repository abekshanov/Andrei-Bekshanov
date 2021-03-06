@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row m-0">
            <a href="{{route('add-test')}}" class="col-3 btn btn-sm btn-primary  my-3" >Добавить новый тест</a>
        </div>
        <div class="row m-0">
            <a href="{{URL::previous()}}" class="col-3 btn btn-sm btn-primary  my-3" >Назад</a>
        </div>
        <table>
            <thead>Силовые тесты:</thead>
            @foreach($listStrengthTests as $listStrengthTest)
                <tr>
                    <td>
                        <a href="{{route('full-test',['testId' => $listStrengthTest->id, 'modelName' => 'StrengthTest'])}}"
                           class=" list-group-item list-group-item-action list-group-item-info my-1 py-1">
                            {{$listStrengthTest->name}}
                        </a>
                    </td>
                    <td>
                        <a href="{{route('delete-test', ['testId' => $listStrengthTest->id, 'modelName' => 'StrengthTest'])}}"
                           class="btn btn-sm btn-primary ml-3" >
                            Удалить
                        </a>
                    </td>
                    <td>
                        <a href="{{route('result-test', ['testId' => $listStrengthTest->id, 'modelName' => 'StrengthTest'])}}"
                           class="btn btn-sm btn-primary ml-3" >
                            Внести результат
                        </a>
                    </td>
                </tr>
            @endforeach
        </table>

        <table>
            <thead>Тесты на MAX повторений:</thead>
            @foreach($listForRepsTests as $listForRepsTest)
                <tr>
                    <td>
                        <a href="{{route('full-test',['testId'=>$listForRepsTest->id, 'modelName' => 'ForRepsTest'])}}"
                           class=" list-group-item list-group-item-action list-group-item-info my-1 py-1">
                            {{$listForRepsTest->name}}
                        </a>
                    </td>
                    <td>
                        <a href="{{route('delete-test', ['testId' => $listForRepsTest->id, 'modelName' => 'ForRepsTest'])}}"
                           class="btn btn-sm btn-primary ml-3" >
                            Удалить
                        </a>
                    </td>
                    <td>
                        <a href="{{route('result-test', ['testId' => $listForRepsTest->id, 'modelName' => 'ForRepsTest'])}}"
                           class="btn btn-sm btn-primary ml-3" >
                            Внести результат
                        </a>
                    </td>
                </tr>
            @endforeach
        </table>

        <table>
            <thead>Тесты на время:</thead>
            @foreach($listForTimeTests as $listForTimeTest)
                <tr>
                    <td>
                        <a href="{{route('full-test',['testId' => $listForTimeTest->id, 'modelName' => 'ForTimeTest'])}}"
                           class=" list-group-item list-group-item-action list-group-item-info my-1 py-1">
                            {{$listForTimeTest->name}}</a>
                    </td>
                    <td>
                        <a href="{{route('delete-test', ['testId'=>$listForTimeTest->id, 'modelName' => 'ForTimeTest'])}}"
                           class="btn btn-sm btn-primary ml-3" >
                            Удалить
                        </a>
                    </td>
                    <td>
                        <a href="{{route('result-test', ['testId'=>$listForTimeTest->id, 'modelName' => 'ForTimeTest'])}}"
                           class="btn btn-sm btn-primary ml-3" >
                            Внести результат
                        </a>
                    </td>
                </tr>
            @endforeach
        </table>

    </div>
@endsection

