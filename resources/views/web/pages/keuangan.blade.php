@extends('web.component.main')
@section('title', 'Laporan Keuangan Reliance')
@section('description','Reliance Keuangan')
@section('keywords','reliance,keuangan,laporan')
@section('canonical',Request::fullUrl())
@section('container')

<style>
    .list-group-item.active {
        background: linear-gradient(106deg, rgba(41, 85, 155, 0.5) 10.89%, #29559B 100%);

    }
</style>
@include('web.component.about_jumbotron')
<section id="konten" class="m-5">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-xs-12">
                <div class="list-group custom-list">
                    @foreach($about as $item)
                    <a href="/about/{{ $item->slug }}#konten" class="list-group-item list-group-item-action {{ Request::is('about/'.$item->slug) ? 'active' : '' }}">
                        {{ $item->title }}
                    </a>
                    @endforeach
                    <a href="/keuangan#konten" class="list-group-item list-group-item-action {{ Request::is('keuangan') ? 'active' : '' }}">
                        Laporan Keuangan
                    </a>
                </div>
            </div>
            <div class="col-md-8 col-xs-12">
                <h1 class="text-center mb-3 resp-title">Laporan Keuangan</h1>
                @foreach($keuangan as $item)
                <div class="row">
                    <div class="col-12">{{ $item->title }}</div>
                    <div class="col-12">{!! $item->body !!}</div>
                    @foreach($item->files as $file)
                    <a href="{{ asset('storage/'.$file->file) }}">{{ explode('/',$file->file)[1] }}</a>
                    @endforeach
                </div>
                @endforeach
            </div>
        </div>

    </div>
</section>
@endsection