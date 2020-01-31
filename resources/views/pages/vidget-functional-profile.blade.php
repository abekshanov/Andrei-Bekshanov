@extends('layouts.app')

@section('content')

<script>
    $(document).ready(function () {
 // ---------- // пока выводим всех атлетов потом сделаю выборку для определенного коуча
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({

            url: '/pages/athletes',
            type: 'post',
            data: ({
                userId: $('#userId').val()
            }),
            dataType: 'html',
            success: function (data) {

                data=JSON.parse(data);   //data[номер строки данных][название поля]
                console.log(data['name']);
/*                var options="";
                $.each(data, function (key, value) {
                   options = options + '<option>' + value['name'] + '</option>';
                }

                $('#athlete').html(options);*/
            }
        });
// --------------

        $("#get-info-button").bind("click", function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: '/pages/ath-info',
                type: 'post',
                data: ({
                    userId: $('#userId').val()
                }),
                dataType: 'html',
                success: function (data) {

                    data=JSON.parse(data);   //data[номер объекта][номер строки данных][название поля]

                    var ulStrength="";
                    var ulStrengthEndurance="";
                    var ulEndurance="";

                    $.each(data[0], function (key, value) {
                        ulStrength = ulStrength + "<li>" + value['name'] + " - " + value['result'] + " кг</li>";
                    });
                    $.each(data[1], function (key, value) {
                        ulStrengthEndurance = ulStrengthEndurance + "<li>" + value['name'] + " - " + value['result'] + "</li>";
                    });
                    $.each(data[2], function (key, value) {
                        ulEndurance = ulEndurance + "<li>" + value['name'] + " - " + value['result'] + "</li>";
                    });

                    $('#strength').html(ulStrength);
                    $('#strength-endurance').html(ulStrengthEndurance);
                    $('#endurance').html(ulEndurance);

                }
            });
        });
    });
</script>

    {{--    вывод показателей для пользователя за период--}}
    <div class="container">
        {{--AJAX запросы--}}
        <form>
            <p>
                <select size="3" multiple name="athlete" id="athlete" class="custom-select">
                    <option disabled>Выберите атлета</option>
                </select>
            </p>
            <label>Атлет</label>
            <input name="userId" id="userId" type="text" />
            <input name="getInfo" id="get-info-button" type="button"  value="Загрузить" />
        </form>


        <h6>Сила</h6>
        <ul  id="strength">
        </ul>

        <h6>Силовая выносливость</h6>
        <ul id="strength-endurance">
        </ul>

        <h6>Выносливость</h6>
        <ul id="endurance">
        </ul>

    </div>
@endsection

