<?php
/**
 * @var $dto \App\Services\Area\AreaModuleDtoInterface
 */
?>
@extends('default.area.layout')

@section('head')
<style>
    .text-image {
        color: #3596df;
        background: url(http://bipbap.ru/wp-content/uploads/2017/10/0_a9e8f_beecb6d9_XL.jpg) no-repeat;
        background-position: 70% 20%;
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }
    h1.text-image{
        font-size: 9rem;
        text-align: center;
        font-weight: bold;
        font-family: 'Rubik', sans-serif;
    }
    body {
        background: #d7e3d9;
    }
</style>
@endsection

@section('content')
    <h1 class="text-image">Египет</h1>

    <div class="row">
        <div class="col-lg-12">
            <div class="card bg-light mb-3">
                <div class="card-header">Header</div>
                <div class="card-body">
                    <h5 class="card-title">Light card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card bg-light mb-3">
                <div class="card-header">Header</div>
                <div class="card-body">
                    <h5 class="card-title">Light card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card bg-light mb-3">
                <div class="card-header">Header</div>
                <div class="card-body">
                    <h5 class="card-title">Light card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>
        </div>
    </div>

@endsection