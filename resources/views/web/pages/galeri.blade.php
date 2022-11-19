@extends('web.component.main')

@section('title', 'Galeri')
@section('description','Reliance Galeri Image')
@section('canonical',Request::fullUrl())
@section('container')
@include('web.component.title_jumbotron')
<section id="konten" class="m-5">
    <div class="container">
        <div class="row">
            @foreach($galeri as $item)
            <div class="col-md-4 mb-5">
                <div class="card border-0">
                    @if($item->images)
                    <img style="height:200px;object-fit: cover;border-radius:10px;" src="{{ asset('storage/'.$item->images->first()->image) }}" class="card-img-top img-fluid" alt="{{ $item->title }}">
                    @endif

                    <div class="card-body">
                        <p class="mb-2"><span class="text-muted">{{ date('d M Y', strtotime($item->created_at)); }}</span></p>
                        <p style="font-size: 24px; font-weight:500">{{ strtoupper($item->title)  }}</p>
                        <a href="/galeri/{{ $item->slug }}" class="stretched-link"></a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="row">
            <div class="d-flex justify-content-center mt-3">
                {{ $galeri->links() }}
            </div>
        </div>
    </div>
</section>
@endsection