@extends('default.layout-9-3')

@section('title', $title)
@section('meta_title', $metaTitle)
@section('meta_description', $metaDescription)

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1>{{ $h1 }}</h1>
            <article>
                {!! $content !!}
            </article>
        </div>
    </div>
@endsection