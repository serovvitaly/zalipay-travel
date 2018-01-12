@extends('default.layout')

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