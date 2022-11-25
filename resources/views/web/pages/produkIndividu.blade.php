@extends('web.component.main')
@section('title','Produk Individu')
@section('container')
@section('description',Str::words(strip_tags(html_entity_decode($var->produk_individu_sec1->content ?? '')),15))
@section('canonical',Request::fullUrl())
@section('keywords',$variabel->keyword_individu->value ?? '')
@include('web.component.title_jumbotron')
<section id="konten">
    <div class="container">
        <div class="row mb-5 py-5">
            <div class="col-md">
                <h1 class="title-custom">{{ $var->produk_individu_sec1->value ?? 'produk_individu_sec1[value]' }}</h1>
                <p>
                    {!! $var->produk_individu_sec1->content ?? 'produk_individu_sec1[content]' !!}
                </p>
            </div>
            <div class="col-md">
                @if($var->produk_individu_sec1->image)
                <div class="bg-backg-batik"></div>
                <img src="{{ asset('storage/'.$var->produk_individu_sec1->image) }}" class="img-fluid" style="border-radius:10px; position:relative; z-index:2" alt="">
                @endif
            </div>
        </div>

    </div>
    <div class="container">
        <div class="row mt-5">
            <div class="col-md">
                <div class="col-md-8" style="position:relative">
                    <div class="backg-left-batik"></div>
                    <h1 class="title-custom">{{ $var->produk_individu_sec2->value ?? 'produk_individu_sec2[value]' }}</h1>

                </div>
                <p>
                    {!! $var->produk_individu_sec2->content ?? 'produk_individu_sec2[content]' !!}
                </p>
            </div>
            <div class="col-md text-right" style="position:relative">
                <div class="backg-right-batik"></div>
                <img src="{{ asset('assets/img/wepik-photo-mode-2022821-1544471.png') }}" class="img-fluid img-side-right" alt="" style="position:relative; z-index:2">
            </div>
        </div>

    </div>

    <section class="wave-bg"></section>
    <section class="produk-diagram-container">
        <div class="container">
            <div class="row">
                <div class="col-md">
                    <h1 class="text-center my-5 title-custom">{{ $var->produk_diagram->value ?? '' }}</h1>

                    @if(isset($var->produk_diagram->image))
                    <div class="text-center">
                        <img src="{{ asset('storage/'.$var->produk_diagram->image) }}" class="img-fluid" style="height:400px;object-fit:contain">
                    </div>
                    @endif

                    <div class="ck-content">
                        <p>
                            {!! $var->produk_diagram->content ?? '' !!}
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section class="syarat-ketentuan-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md">
                    <h1 class="text-center my-5 title-custom">{{ $var->produk_syarat->value ?? '' }}</h1>

                    @if(isset($var->produk_syarat->image))
                    <div class="text-center">
                        <img src="{{ asset('storage/'.$var->produk_syarat->image) }}" class="img-fluid" style="height:400px;object-fit:contain">
                    </div>
                    @endif

                    <div class="ck-content table-custom">
                        <p>
                            {!! $var->produk_syarat->content ?? '' !!}
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section style="background-color:#EBEEF3">
        <div class="container">
            <div class="row">
                <div class="col-md">
                    <h1 class="text-center my-5 title-custom">{{ $var->produk_table->value ?? '' }}</h1>

                    @if(isset($var->produk_table->image))
                    <div class="text-center">
                        <img src="{{ asset('storage/'.$var->produk_table->image) }}" class="img-fluid" style="height:400px;object-fit:contain">
                    </div>
                    @endif

                    <div class="ck-content">
                        <p>
                            {!! $var->produk_table->content ?? '' !!}
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </section>


</section>


@endsection