<?php ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    hello
    {{$data[0]}}

    <form id="formdate" action="{{$url}}" token="{{$token}}">
        <p><b></b></p>
        <label for="datefrom">Выберите начальную дату для графика</label>
        <input name="datefrom" type="date">
        <br>
        <label for="dateupto">Выберите конечную дату для графика</label>
        <input name="dateupto" type="date">
        <input type="hidden" name="_token" id="tok" value="{{$token}}" />
        <br><!--onclick="my_func()"-->
        <button id="myAdd" href="{{$url}}"  token="{{$token}}">Отправить</button>
    </form>


    <div id="container"></div>





    <script src="https://code.highcharts.com/highcharts.js"></script>

    <script src="js/resp.js"></script>
<!--
    <script src=""></script>
    <script src=""></script>
-->

</body>
</html>
