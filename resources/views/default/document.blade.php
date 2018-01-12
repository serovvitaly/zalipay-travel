@extends('default.layout')

@section('title', $title)
@section('meta_title', $seo_title)
@section('meta_description', $seo_description)

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1>{{ $title }}</h1>
            <article>
                {!! $content !!}
            </article>
        </div>
    </div>
@endsection