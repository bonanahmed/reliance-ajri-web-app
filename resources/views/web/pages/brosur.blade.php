@extends('web.component.main')
@section('title','Berita Terkini')
@section('description',Str::words(strip_tags(html_entity_decode($variabel->description_brosur->content ?? '')),15))
@section('keywords',$variabel->keyword_brosur->value ?? '')
@section('canonical',Request::fullUrl())
@section('container')
@include('web.component.title_jumbotron')
<section id="konten" class="m-5">
    <div class="container">
        <div class="row">
            @foreach($brosur as $item)
            <div class="col-md-6 mb-5">
                <div class="card" style="border:none">
                    <div style="background:#ddd; text-align:center">
                        @if($item->image)
                        <img src="{{ asset('storage/'.$item->image) }}" alt="{{ $item->title }}" style="border-radius:16px; height:400px; object-fit:contain">
                        @else
                        <img src="{{ asset('assets/img/info-daily.png') }}" class="card-img-top" alt="{{ $item->title }}" style="border-radius:16px; height:400px; object-fit:contain">
                        @endif
                    </div>

                    <div class="card-body">
                        <p class="mb-2" style="font-size: 14px;color:#262626"><b>{{ $item->kategori->title ?? '' }}</b>
                            <span style="margin-left:22px; color:#737373">{{ date('d M Y', strtotime($item->created_at)); }}</span>
                        </p>
                        <p style="font-size: 24px; font-weight: 500;" class="card-text">{{ $item->title }}</p>
                        <a href="/brosur/{{ $item->slug }}" class="stretched-link"></a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-md-12 paginations">
                {{ $brosur->links() }}
            </div>
        </div>
    </div>
</section>
@endsection