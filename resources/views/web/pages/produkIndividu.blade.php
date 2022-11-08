@extends('web.component.main')
@include('web.component.title_jumbotron')
@section('title','Produk Individu')
@section('container')
<section id="konten">
    <div class="container">
        <div class="row mb-5 py-5">
            <div class="col-md">
                <h1>{{ $var->produk_individu_sec1->value ?? 'produk_individu_sec1[value]' }}</h1>
                <p>
                    {!! $var->produk_individu_sec1->content ?? 'produk_individu_sec1[content]' !!}
                </p>
            </div>
            <div class="col-md">
                @if($var->produk_individu_sec1->image)
                <div class="bg-backg-batik"></div>
                <img src="{{ asset('storage/'.$var->produk_individu_sec1->image) }}" class="img-fluid"
                    style="border-radius:10px; position:relative; z-index:2" alt="">
                @endif
            </div>
        </div>

    </div>
    <div class="container">
        <div class="row mt-5">
            <div class="col-md">
                <div class="col-md-8" style="position:relative">
                    <div class="backg-left-batik"></div>
                    <h1>{{ $var->produk_individu_sec2->value ?? 'produk_individu_sec2[value]' }}</h1>

                </div>
                <p>
                    {!! $var->produk_individu_sec2->content ?? 'produk_individu_sec2[content]' !!}
                </p>
            </div>
            <div class="col-md text-right" style="position:relative">
                <div class="backg-right-batik"></div>
                <img src="{{ asset('assets/img/wepik-photo-mode-2022821-1544471.png') }}" class="img-fluid" alt=""
                    style="position:relative; z-index:2">
            </div>
        </div>

    </div>


</section>
<section class="wave-bg"></section>
<!-- <div class="row">
    <div class="col-md-12">
        <img id="wallpaper" src="https://images.pexels.com/photos/531880/pexels-photo-531880.jpeg?auto=compress&cs=tinysrgb&h=350" class="mx-auto d-block">
        <img id="tablet" src="https://avatanplus.com/files/resources/original/58fb507e4582f15b95b26d4d.png" class="mx-auto d-block">
    </div>
</div> -->

@endsection