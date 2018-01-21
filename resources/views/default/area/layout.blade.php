@extends('default.layout-12')

@section('title', $title)
@section('meta_title', $metaTitle)
@section('meta_description', $metaDescription)

@section('content')
    @include('default.breadcrumb')
    @yield('content')
@overwrite