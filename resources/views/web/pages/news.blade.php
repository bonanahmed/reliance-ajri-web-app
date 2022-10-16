@extends('web.component.main')
@include('web.component.title_jumbotron')
@section('container')
<section id="konten" class="m-5">
    <div class="container">
        <div class="row">
            @foreach($news as $item)
            <div class="col-md-4 mb-5">
                <div class="card">

                    @if($item->image)
                    <img src="{{ asset('storage/'.$item->image) }}" class="card-img-top" alt="{{ $item->title }}">
                    @else
                    <img src="{{ asset('assets/img/info-daily.png') }}" class="card-img-top" alt="{{ $item->title }}">
                    @endif

                    <div class="card-body">
                        <p class="mb-2"><b>Kategori</b> <span class="text-muted">{{ date('d M Y', strtotime($item->created_at)); }}</span></p>
                        <p class="card-text"> {{ $item->title  }}</p>
                        <a href="/news/{{ $item->slug }}" class="stretched-link"></a>

                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-md-4">
                {{ $news->links() }}
            </div>
        </div>
    </div>
</section>
@endsection