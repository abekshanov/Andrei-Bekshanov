@extends('layouts.app')

@section('content')
    <div class="container">

        @foreach($listResultStrengthTests as $testResult)
            <p>
                <?=$testResult->name." - ".$testResult->result." кг";?>
            </p>
        @endforeach

        @foreach($listResultForRepsTests as $testResult)
            <p>
                <?=$testResult->name." - ".$testResult->result." повт.";?>
            </p>
        @endforeach

        @foreach($listResultForTimeTests as $testResult)
            <p>
                <?=$testResult->name." - ".$testResult->result;?>
            </p>
        @endforeach
    </div>
@endsection

