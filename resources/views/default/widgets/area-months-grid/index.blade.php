<div class="row">
@foreach($documents as $document)
    <div class="col-lg-3">
        <strong><a href="/{{ $document->uri }}">{{ $document->title }}</a></strong>
        <p class="small">{{ $document->description }}</p>
    </div>
@endforeach
</div>