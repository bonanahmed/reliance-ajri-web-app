@extends('web.component.main')
@section('description',Str::words(strip_tags(html_entity_decode($news->body ?? '')),15))
@section('keywords',$news->meta_keywords)
@section('canonical',Request::fullUrl())
@section('title',$news->title)
@section('container')
<section id="konten" class="m-5">
    <div class="container py-5 mt-5">
        <div class="row">
            <div class="col-md">
                <h1>{{ $news->title }}</h1>
                @if($news->image)
                <img class="img-fluid rounded-2" src="{{ asset('storage/'.$news->image) }}" alt="">
                @endif
                <div class="ck-content mt-3">
                    {!! $news->body !!}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection