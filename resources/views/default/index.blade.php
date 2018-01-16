@extends('default.layout')

@section('title', 'Путеводитель по Египту')
@section('meta_title', 'Путеводитель по Египту')
@section('meta_description', 'Погода, отели, пляжи, достопримечательности, отзывы обо всем этом')

@section('content')
@foreach($items as $item)
    @include('default.document-item', $item->toArray())
@endforeach
<div class="row">
    <div class="col-lg-12">
        {{ $items->links() }}
    </div>
</div>
@endsection