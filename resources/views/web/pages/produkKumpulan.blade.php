@extends('web.component.main')
@include('web.component.title_jumbotron')
@section('container')
<section id="konten" class="m-5">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="list-group">
                    @foreach($list as $item)
                    <a href="/produk/kumpulan/{{ $item->slug }}#konten" class="list-group-item list-group-item-action {{ Request::is('about/'.$item->slug) ? 'active' : '' }}">
                        {{ $item->title }}
                    </a>
                    @endforeach
                    <!-- <a type="button" class="list-group-item list-group-item-action active">
                            Cras justo odio
                        </a>
                        <a type="button" class="list-group-item list-group-item-action">Dapibus ac facilisis in</a>
                        <a type="button" class="list-group-item list-group-item-action">Morbi leo risus</a>
                        <a type="button" class="list-group-item list-group-item-action">Porta ac consectetur ac</a>
                        <a type="button" class="list-group-item list-group-item-action" disabled>Vestibulum at eros</a> -->
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