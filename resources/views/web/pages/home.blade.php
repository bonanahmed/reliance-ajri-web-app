@extends('web.component.main')
@include('web.component.jumbotron')
@section('title','Asuransi Jiwa dan Tabungan')
@section('container')
<section id="mitra">
    <div class="row">
        <div class="col-md-12 text-center">
            <h3 class="display-9">Dipercaya Oleh</h3>
            <p><small class="text-muted">Inilah beberapa dari mereka yang sudah bekerja sama dengan kami. Hubungi kami untuk kerja sama lebih lanjut</small></p>
        </div>
        <div class="col-md-12 your-class my-2 mb-5">
            @foreach($mitras as $mitra)
            <div class="mx-2 justify-content-center text-center">
                @if($mitra->image)
                <img style="height: 200px;object-fit: contain ;" class="img-thumbnail" src="{{ asset('storage/'.$mitra->image) }}" alt="">
                @else
                <img style="height: 200px;object-fit: contain ;" class="img-thumbnail" src="https://via.placeholder.com/150" alt="">
                @endif
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="d-flex flex-column my-5 mt-5" style="background-image:url('https://i.pinimg.com/474x/6f/76/97/6f769766a1ebea9f1b9c92281df8c518--white-patterns-random-things.jpg')">
    <div class="container">
        <div class="text-center mb-5">
            <p class="h4" style="color:#043055"><b>Big Coverage Insurance Made Easy For You</b></p>
            <p><small class="text-muted"> jiwa murni hingga 5Miliar tanpa cek medis</small></p>
        </div>
        <div class="tab-steps py-5">
            @foreach($slider as $item)
            <div class="tab-steps-item {{ $loop->index+1 > 1 ? 'd-none' : '' }}">
                <div class="row">
                    <div class="col text-center">
                        <img style="border-radius: 1rem;height:250px;object-fit: contain" src="{{ asset('storage/'.$item->image) }}" alt="">
                    </div>
                    <div class="col">
                        <div class="row justify-content-end">
                            <div class="card" style="width: 40rem;border-radius:1rem;background-color: #FFFFFF7F;">
                                <div class="card-body">
                                    <h5 class="card-title">{{ ($loop->index+1).'. '.$item->title }}</h5>
                                    <p class="text-dark" style="width: 25rem"><small> {!! $item->description !!}</small></p>
                                    <a href="{{ $item->button_link ?? '#' }}" class="btn btn-primary btn-sm p-2" style="border-radius: 10px; background-color: #31386b;">
                                        {{ $item->button }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            @endforeach
            <div class="flex-row text-center">
                <div class="flex-col-xs-12">
                    <ul class="tab-steps--list">
                        @foreach($slider as $item)
                        <li class="{{ $loop->index+1 > 1 ? '' : 'active' }}" data-step="{{ $loop->index + 1 }}"></li>

                        @endforeach
                    </ul>
                    <p class="fw-bolder">Reliance Group Term Life</p>
                </div>
            </div>
            <!-- progress tracker -->
        </div>
    </div>

</section>

<section style="background-image: url('{{ asset('assets/img/family-portrait.png') }}');background-size: cover;background-repeat: no-repeat;">
    <div class="container">
        <div class="row" style="padding:25px 60px 0px ;">
            <div class="col-md-6" style="padding-bottom: 300px;">
                <h1 class="display-4">{{ $variabel->home_section_1->value ?? 'home_section_1[value]' }}</h1>
                <p class="w-50">{!! $variabel->home_section_1->content ?? 'home_section_1[content]' !!}</p>
                <button type="button" class="btn btn-primary btn-sm py-3 px-4" style="border-radius: 10px;border:none; background-color: #31386b;">
                    Lihat Selengkapnya
                </button>
            </div>
        </div>

    </div>
    <div style="position: relative; bottom:0rem">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#ffffff" fill-opacity="1" d="M0,288L48,272C96,256,192,224,288,197.3C384,171,480,149,576,165.3C672,181,768,235,864,250.7C960,267,1056,245,1152,250.7C1248,256,1344,288,1392,304L1440,320L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
        </svg>
    </div>
</section>



<section>
    <div class="container">
        <div class="row justify-content-around">
            <div class="col text-center">
                <img class="img-fluid" src="{{ asset('assets/img/shield.png') }}" alt="">
                <p style="font-size: 20px;font-weight: 500;">Cek Status Premi</p>
                <p style="color:#737373;font-size: 16;">Ingin cek status klaim Anda?</p>
                <button type="button" class="btn btn-outline-primary">Cek Status Premi Sekarang</button>
            </div>
            <div class="col text-center">
                <img class="img-fluid" src="{{ asset('assets/img/papers.png') }}" alt="">
                <p style="font-size: 20px;font-weight: 500;">Ajukan Premi</p>
                <p style="color:#737373;font-size: 16;">Telah menjadi Nasabah kami?</p>
                <button type="button" class="btn btn-outline-primary">Ajukan Sekarang</button>
            </div>
        </div>
    </div>
</section>


<section id="produk">
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <p style="font-size: 32px;font-weight: 500;"><span style="color: #737373;">Pilihan</span> <span style="color: #29559B;">Produk Terbaik</span> <span style="color: #737373;">Kami</span></p>
                <p class="text-muted" style="font-size:12px ;">Asuransi jiwa murni hingga 5miliar tanpa cek medis</p>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-4 mb-5">
                <div class="text-center">
                    <img class="img-fluid" src="{{ asset('assets/img/umbrella.png') }}" alt="...">
                    <h5>Individu</h5>
                    <a href="/produk/individu" class="btn btn-outline-primary">Cek Detail Sekarang</a>
                </div>
            </div>
            <div class="col-md-4 mb-5">
                <div class="text-center">
                    <img class="img-fluid" src="{{ asset('assets/img/umbrella-rain.png') }}" alt="...">
                    <h5>Kumpulan</h5>
                    <a href="/produk/kumpulan" class="btn btn-outline-primary">Cek Detail Sekarang</a>
                </div>
            </div>
            <div class="col-md-4 mb-5">
                <div class="text-center">
                    <img class="img-fluid" src="{{ asset('assets/img/brosur.png') }}" alt="...">
                    <h5>Brosur</h5>
                    <button type="button" class="btn btn-outline-primary">Cek Detail Sekarang</button>
                </div>
            </div>
            <div class="col-md-4 mb-5">
                <div class="text-center">
                    <img class="img-fluid" src="{{ asset('assets/img/form-simulator.png') }}" alt="...">
                    <h5>Form Simulasi</h5>
                    <button type="button" class="btn btn-outline-primary">Cek Form Simulasi Sekarang</button>
                </div>
            </div>
            <div class="col-md-4 mb-5">
                <div class="text-center">
                    <img class="img-fluid" src="{{ asset('assets/img/form-request.png') }}" alt="...">
                    <h5>Form Request</h5>
                    <button type="button" class="btn btn-outline-primary">Cek Form Request Sekarang</button>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="news" class="mb-5">
    <div class="container">
        <div class="row mb-5">
            <div class="col text-center">
                <p style="font-weight: 500;
font-size: 32px;">Info Daily Reliance</p>
            </div>
        </div>
        <div class="row">
            @foreach($news as $item)
            <div class="col-md-4 mb-5">
                <div class="card border-0">

                    @if($item->image)
                    <img src="{{ asset('storage/'.$item->image) }}" class="card-img-top" alt="{{ $item->title }}">
                    @else
                    <img src="{{ asset('assets/img/info-daily.png') }}" class="card-img-top" style="border-radius: 10px;" alt="{{ $item->title }}">
                    @endif

                    <div class="card-body">
                        <p class="mb-2" style="font-size: 14px;"><b>{{ $item->kategori->title }}</b> <span class="text-muted">{{ date('d M Y', strtotime($item->created_at)); }}</span></p>
                        <p style="font-size: 24px; font-weight: 500;" class="card-text">{{ $item->title }}</p>
                        <a href="/news/{{ $item->slug }}" class="stretched-link"></a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="row justify-content-center">
            <div class="col-md-3 text-center">
                @if($news->count() >= 3)
                <a href="/news" class="btn btn-outline-danger">Lihat Semua Berita</a>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection