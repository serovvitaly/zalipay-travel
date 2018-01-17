<?php
/**
 * @var $dto \App\Services\Area\AreaModuleDtoInterface
 */
?>
@extends('default.area.layout')

@section('header')
<style>
    .text-image {
        color: #3596df;
        background: url(http://bipbap.ru/wp-content/uploads/2017/10/0_a9e8f_beecb6d9_XL.jpg) no-repeat;
        background-position: 10% 20%;
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }
    h1.text-image{
        font-size: 9rem;
        text-align: center;
        font-weight: bold;
    }
</style>
@endsection

@section('content')
    <h1 class="text-image">Египет</h1>

@endsection