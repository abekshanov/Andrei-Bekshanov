@extends('layouts.app')

@section('content')
{{--    вывод показателей для пользователя за период--}}
    <div class="container">
        <h6>Сила</h6>
        <ul>
        @foreach($listResultStrengthTests as $testResult)
            <li>
                <?=$testResult->name." - ".$testResult->result." кг";?>
            </li>
        @endforeach
        </ul>

        <h6>Силовая выносливость</h6>
        <ul>
        @foreach($listResultForRepsTests as $testResult)
            <li>
                <?=$testResult->name." - ".$testResult->result." повт.";?>
            </li>
        @endforeach
        </ul>

        <h6>Выносливость</h6>
        <ul>
        @foreach($listResultForTimeTests as $testResult)
            <li>
                <?=$testResult->name." - ".$testResult->result;?>
            </li>
          @endforeach
        </ul>
    </div>
@endsection

