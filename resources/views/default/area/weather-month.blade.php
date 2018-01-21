@extends('default.area.layout')

@section('content')

<img style="width: 550px;" src="http://dl4.joxi.net/drive/2018/01/16/0001/3659/73291/91/7dbce8102f.jpg">

<div class="col-lg-12">
    <h1>{{ $h1 }}</h1>
    <article>
    {!! $content !!}
    </article>
</div>

@endsection