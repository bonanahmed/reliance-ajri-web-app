@extends('web.component.main')
@include('web.component.title_jumbotron')
@section('title',$produk->title)
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
                    <a href="/produk/kumpulan/{{ $item->slug }}#konten" class="list-group-item list-group-item-action {{ Request::is('produk/kumpulan/'.$item->slug) ? 'active' : '' }}">
                        {{ $item->title }}
                    </a>
                    @endforeach
                </div>
            </div>
            <div class="col-md-8">
                <h1 class="text-center mb-5">{{ $produk->title }}</h1>
                {!! $produk->body !!}
            </div>
        </div>
    </div>
</section>
@endsection