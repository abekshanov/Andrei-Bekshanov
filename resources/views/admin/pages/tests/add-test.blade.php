@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row m-0">
            <a href="{{URL::previous()}}" class="col-3 btn btn-sm btn-primary  my-3" >Назад</a>
            <div class="col-6"></div>
        </div>

        <form method="post"  action="{{route('add-test-data')}}" >
            {{ csrf_field() }}
            <input type="hidden" name="id"  value="">

            <select class="custom-select" name="modelName">
                <option value="" selected>Выберите тип теста</option>
                <option  value="StrengthTest">Силовые тесты</option>
                <option  value="ForRepsTest">Тесты на MAX количество повторений</option>
                <option  value="ForTimeTest">Тесты на время</option>
            </select>

            <p>Название теста</p>
            <input type="text" name="name" value="" id="" class="w-100">
            <input type="submit" value="Добавить">
        </form>
    </div>
@endsection

