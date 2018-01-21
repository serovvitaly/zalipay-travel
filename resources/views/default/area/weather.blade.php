@extends('default.area.layout')

@section('content')
<h1>Погода в Египте</h1>

<img style="width: 550px;" src="http://dl4.joxi.net/drive/2018/01/16/0001/3659/73291/91/7dbce8102f.jpg">

<h4>Описание погоды по месяцам</h4>

{!! $widgetAreaMonthsGrid !!}

@endsection