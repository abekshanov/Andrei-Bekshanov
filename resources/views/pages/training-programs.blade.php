@extends('layouts.app')

@section('content')
       @foreach($listTrainingPrograms as $listTrainingProgram)
           {{$listTrainingProgram->id." ".$listTrainingProgram->name}}<br>
       @endforeach
@endsection

