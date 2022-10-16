@extends('web.component.main')
@section('container')
<section id="konten" class="m-5">
    <div class="container">
        <div class="row">
            <div class="col-md">
                <h1>{{ $news->title }}</h1>
                @if($news->image)
                <img class="img-fluid rounded-2" src="{{ asset('storage/'.$news->image) }}" alt="">
                @endif
                <p>{!! $news->body !!}</p>
            </div>
        </div>
    </div>
</section>
@endsection