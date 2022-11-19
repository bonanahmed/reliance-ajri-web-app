@extends('web.component.main')
@section('title', 'Galeri '.$galeri->title)
@section('description',Str::words(strip_tags(html_entity_decode($galeri->description),15))
@section('canonical',Request::fullUrl())
@section('container')
<style>
    .img-thumbnail-cust {
        --bs-aspect-ratio: 40%;
        border-radius: 10px;
    }
</style>
<section id="konten" class="m-5">
    <div class="container py-5">
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/" class="link-dark">Beranda</a></li>
                <li class="breadcrumb-item"><a href="/galeri" class="link-dark">Galeri</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ strtoupper($galeri->title) }}</li>
            </ol>
        </nav>
        <div class="row mt-5 mb-5">
            <p class="mb-2">Created at <span class="text-muted">{{ date('d M Y', strtotime($galeri->created_at)); }}</span></p>
            <h1>{{ $galeri->title }}</h1>
        </div>
        <div class=" row mb-5">
            <div class="col-md-12">
                {!! $galeri->description !!}
            </div>
        </div>
        <div class="row">
            @foreach($galeri->images as $item)
            <div class="col-md-4 mb-5 text-center">
                <a href="{{ asset('storage/'.$item->image) }}" target="_blank">
                    <img src="{{ asset('storage/'.$item->image) }}" class="img-fluid img-thumbnail-cust" alt="{{ $item->title }}">
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection