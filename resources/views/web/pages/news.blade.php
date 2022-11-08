@extends('web.component.main')
@include('web.component.title_jumbotron')
@section('title','Berita Terkini')
@section('container')
<section id="konten" class="m-5">
    <div class="container">
        <div class="row">
            @foreach($news as $item)
            <div class="col-md-4 mb-5">
                <div class="card" style="border:none">

                    @if($item->image)
                    <img src="{{ asset('storage/'.$item->image) }}" alt="{{ $item->title }}" style="border-radius:16px">
                    @else
                    <img src="{{ asset('assets/img/info-daily.png') }}" class="card-img-top" alt="{{ $item->title }}"  style="border-radius:16px">
                    @endif

                    <div class="card-body">
                        <p class="mb-2" style="font-size: 14px;color:#262626"><b>{{ $item->kategori->title }}</b> 
                        <span style="margin-left:22px; color:#737373">{{ date('d M Y', strtotime($item->created_at)); }}</span>
                        </p>
                        <p style="font-size: 24px; font-weight: 500;" class="card-text">{{ $item->title }}</p>
                        <a href="/news/{{ $item->slug }}" class="stretched-link"></a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-md-12 paginations">
                {{ $news->links() }}
            </div>
        </div>
    </div>
</section>
@endsection