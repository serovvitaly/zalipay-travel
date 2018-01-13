<?php
/**
 * @var $dto \App\Services\Area\AreaModuleDtoInterface
 */
?>
@extends('default.layout')

@section('content')
    <h1>{{ $dto->getTitle() }}</h1>
@endsection