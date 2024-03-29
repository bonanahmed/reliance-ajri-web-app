@extends('web.component.main')
@section('title',$produk->title)
@section('meta_title',$produk->meta_title)
@section('description',$produk->meta_description)
@section('keywords',$produk->meta_keywords)
@section('canonical',Request::fullUrl())
@section('container')
<style>
    .list-group-item.active {
        background: linear-gradient(106deg, rgba(41, 85, 155, 0.5) 10.89%, #29559B 100%);

    }
</style>
@include('web.component.title_jumbotron')
<section id="konten" class="m-5">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="list-group custom-list">
                    @foreach($list as $item)
                    <a href="/produk/kumpulan/{{ $item->slug }}#konten" class="list-group-item list-group-item-action {{ Request::is('produk/kumpulan/'.$item->slug) ? 'active' : '' }}">
                        {{ $item->title }}
                    </a>
                    @endforeach
                </div>
            </div>
            <div class="col-md-8">
                <h1 class="text-center mb-3 resp-title">{{ $produk->title }}</h1>
                @if($produk->image)
                <img class="img-fluid rounded-2" src="{{ asset('storage/'.$produk->image) }}" alt="">
                @endif
                <div class="ck-content mt-3">
                    {!! $produk->body !!}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection