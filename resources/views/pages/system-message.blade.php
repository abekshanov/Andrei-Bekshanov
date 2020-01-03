@extends('layouts.app')

@section('content')
    <div class="container">

    <?php
        $ch=curl_init();
        curl_setopt($ch, CURLOPT_URL, 'http://irr.ru');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, true);
        curl_setopt($ch, CURLOPT_NOBODY, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);


        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        $result=curl_exec($ch);
        curl_close($ch);
        echo $result;
    ?>



    </div>
@endsection

