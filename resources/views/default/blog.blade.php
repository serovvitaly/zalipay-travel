@extends('default.layout-9-3')

@section('title', $title)
@section('meta_title', $metaTitle)
@section('meta_description', $metaDescription)

@section('content')
    @foreach($items as $item)
        @include('default.document-item', (array)$item)
    @endforeach
    <div class="row">
        <div class="col-lg-12">
            {{ $items->links() }}
        </div>
    </div>
@endsection