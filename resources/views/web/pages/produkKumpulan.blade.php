@extends('web.component.main')
@section('title',$produk->title)
@section('description',Str::words(strip_tags(html_entity_decode($produk->body ?? '')),15))
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
                {!! $produk->body !!}
            </div>
        </div>
    </div>
</section>
@endsection