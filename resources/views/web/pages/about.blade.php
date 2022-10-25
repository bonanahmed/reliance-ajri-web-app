@extends('web.component.main')
@include('web.component.jumbotron')
@section('container')
<style>
    .list-group-item.active {
        background: linear-gradient(106deg, rgba(41, 85, 155, 0.5) 10.89%, #29559B 100%);

    }
</style>
<section id="konten" class="m-5">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="list-group">
                    @foreach($list as $item)
                    <a href="/about/{{ $item->slug }}#konten" class="list-group-item list-group-item-action {{ Request::is('about/'.$item->slug) ? 'active' : '' }}">
                        {{ $item->title }}
                    </a>
                    @endforeach
                </div>
            </div>
            <div class="col-md-8">
                <h1 class="text-center mb-5">{{ $about->title }}</h1>
                <div class="text-center">
                    @if($about->image)
                    <img class="img-fluid mb-5" src="{{ asset('storage/'.$about->image) }}" alt="{{ $about->title }}">
                    @endif
                </div>
                <div class="ck-content px-3">
                    {!! $about->body !!}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection