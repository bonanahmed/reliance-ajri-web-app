@extends('web.component.main')
@section('title','Asuransi Jiwa dan Tabungan')
@section('description',Str::words(strip_tags(html_entity_decode($variabel->footer_info->content ?? '')),15))
@section('keywords',$variabel->keyword_beranda->value ?? '')
@section('canonical',Request::fullUrl())
@section('container')
@include('web.component.jumbotron')
<section id="mitra">
    <div class="row rpy-5">
        <div class="col-md-12 text-center">
            <h3 class="display-9">Dipercaya Oleh</h3>
            <p><small class="text-muted">Inilah beberapa dari mereka yang sudah bekerja sama dengan kami. Hubungi kami
                    untuk kerja sama lebih lanjut</small></p>
        </div>
        <div class="col-md-12 your-class my-2 rmb-5">
            @foreach($mitras as $mitra)
            <div class="mx-2 justify-content-center text-center">
                @if($mitra->image)
                <img style="height: 136px; padding:30px; object-fit: contain; border:none; background:#F2F2F2;" class="img-thumbnail" src="{{ asset('storage/'.$mitra->image) }}" alt="{{$mitra->name}}" title="{{$mitra->name}}">
                @else
                <img style="height: 136px; padding:30px; object-fit: contain ; border:none; background:#F2F2F2;" class="img-thumbnail" src="https://via.placeholder.com/160x56" alt="">
                @endif
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="d-flex flex-column my-5 mt-5 section-slider">
    <div class="section-slider-wrapper"></div>
    <div class="container" style="position:relative">
        <div class="text-center mb-5 mt-5">
            <p class="h4" style="color:#29559B;"><b>Big Coverage Insurance Made Easy For You</b></p>
            <p><small class="text-muted"> jiwa murni hingga 5Miliar tanpa cek medis</small></p>
        </div>
        <div class="tab-steps">
            @foreach($slider as $item)
            <div class="tab-steps-item {{ $loop->index+1 > 1 ? 'd-none' : '' }}">
                <div class="row">
                    <div class="col text-center card-custom">
                        <div class="shadow-custom">
                            <div style="box-shadow: inset 3px 3px 4px rgba(255, 255, 255, 0.25), inset -3px -3px 4px rgba(255, 255, 255, 0.25);filter: drop-shadow(16px 16px 51px rgba(0, 0, 0, 0.2));backdrop-filter: blur(7px);border-radius: 30px;"></div>
                        </div>
                        <img style="width:100%;border-radius: 1rem;height:300px;object-fit: cover; position:relative; z-index:10" src="{{ asset('storage/'.$item->image) }}" alt="{{$item->title}}" title="{{$item->title}}">
                    </div>
                    <div class="col resp-desc">
                        <div class="row justify-content-end">
                            <div class="card card-right">
                                <div class="card-body">
                                    <h5 class="card-title" style="color:#29559B">{{ ($loop->index+1).'. '.$item->title
                                        }}</h5>
                                    <p class="text-dark" style="width: 25rem"><small> {!! $item->description !!}</small>
                                    </p>
                                    <a href="{{ $item->button_link ?? '#' }}" class="btn btn-primary btn-sm " style="background-color: #29559B; display: flex; flex-direction: row; align-items: center; padding: 16px 32px; gap: 16px;width: 220px;height: 64px;border-radius: 12px;">
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

<section class="mb-10" style="background-image: url('{{ asset('assets/img/family-portrait.png') }}');background-size: cover;background-repeat: no-repeat;  background-attachment: fixed;  background-position: center;">
    <div class="container">
        <div class="row" style="padding:25px 60px 0px ;">
            <div class="col-md-6" style="padding-bottom: 300px;">
                <h1 class="display-4">{!! $variabel->home_section_1->value ?? 'home_section_1[value]' !!}</h1>
                <div class="home_section_content">{!! $variabel->home_section_1->content ?? 'home_section_1[content]' !!}</div>
                <button type="button" class="btn btn-primary btn-sm py-3 px-4" style="border-radius: 10px;border:none; background-color: #29559B;">
                    Lihat Selengkapnya
                </button>
            </div>
        </div>

    </div>
    <div style="position: relative; bottom:0rem;">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#ffffff" fill-opacity="1" d="M0,224L40,213.3C80,203,160,181,240,170.7C320,160,400,160,480,165.3C560,171,640,181,720,170.7C800,160,880,128,960,133.3C1040,139,1120,181,1200,197.3C1280,213,1360,203,1400,197.3L1440,192L1440,320L1400,320C1360,320,1280,320,1200,320C1120,320,1040,320,960,320C880,320,800,320,720,320C640,320,560,320,480,320C400,320,320,320,240,320C160,320,80,320,40,320L0,320Z">
            </path>
        </svg>

        <div class="container">
            <div class="top-section-status">
                <div class="row justify-content-around">
                    <div class="col text-center">
                        <img class="img-fluid img-resp" src="{{ asset('assets/img/shield.png') }}" alt="Status Premi" title="Status Premi">
                        <p style="font-size: 20px;font-weight: 500;">Cek Status Premi</p>
                        <p style="color:#737373;font-size: 16;">Ingin cek status klaim Anda?</p>
                        <button type="button" class="btn btn-outline-primary btn-fsize">Cek Status Premi Sekarang</button>
                    </div>
                    <div class="col text-center">
                        <img class="img-fluid img-resp" src="{{ asset('assets/img/papers.png') }}" alt="Ajukan Premi" title="Ajukan Premi">
                        <p style="font-size: 20px;font-weight: 500;">Ajukan Premi</p>
                        <p style="color:#737373;font-size: 16;">Telah menjadi Nasabah kami?</p>
                        <button type="button" class="btn btn-outline-primary btn-fsize">Ajukan Sekarang</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section id="produk" class="mt-5">
    <div class="container py-5">
        <div class="row">
            <div class="col text-center">
                <p style="font-size: 32px;font-weight: 500;"><span style="color: #737373;">Pilihan</span> <span style="color: #29559B;">Produk Terbaik</span> <span style="color: #737373;">Kami</span></p>
                <p class="text-muted" style="font-size:12px ;">Asuransi jiwa murni hingga 5miliar tanpa cek medis</p>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-4 mb-5">
                <div class="text-center">
                    <img class="img-fluid" src="{{ asset('assets/img/umbrella.png') }}" alt="Produk Individu" title="Produk Individu">
                    <h5>Individu</h5>
                    <a href="/produk/individu" class="btn btn-outline-primary">Cek Detail Sekarang</a>
                </div>
            </div>
            <div class="col-md-4 mb-5">
                <div class="text-center">
                    <img class="img-fluid" src="{{ asset('assets/img/umbrella-rain.png') }}" alt="Produk Kumpulan" title="Produk Kumpulan">
                    <h5>Kumpulan</h5>
                    <a href="/produk/kumpulan/{{ Request::get('produk') ? Request::get('produk')->slug : '' }}" class="btn btn-outline-primary">Cek Detail Sekarang</a>
                </div>
            </div>
            <div class="col-md-4 mb-5">
                <div class="text-center">
                    <img class="img-fluid" src="{{ asset('assets/img/brosur.png') }}" title="Brosur" alt="Brosur">
                    <h5>Brosur</h5>
                    <button type="button" class="btn btn-outline-primary">Cek Detail Sekarang</button>
                </div>
            </div>
            <div class="col-md-4 mb-5">
                <div class="text-center">
                    <img class="img-fluid" src="{{ asset('assets/img/form-simulator.png') }}" alt="Form Simulasi" title="Form Simulasi">
                    <h5>Form Simulasi</h5>
                    <a href="/simulasi/produk" class="btn btn-outline-primary">Cek Form Simulasi Sekarang</a>
                </div>
            </div>
            <div class="col-md-4 mb-5">
                <div class="text-center">
                    <img class="img-fluid" src="{{ asset('assets/img/form-request.png') }}" alt="Form Request" title="Form Request">
                    <h5>Form Request</h5>
                    <a href="/form" type="button" class="btn btn-outline-primary">Cek Form Request Sekarang</a>
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
                    <img src="{{ asset('storage/'.$item->image) }}" class="card-img-top" alt="{{ $item->title }}" title="{{ $item->title }}">
                    @else
                    <img src="{{ asset('assets/img/info-daily.png') }}" class="card-img-top" style="border-radius: 10px;" title="{{ $item->title }}" alt="{{ $item->title }}">
                    @endif

                    <div class="card-body">
                        <p class="mb-2" style="font-size: 14px;color:#262626"><b>{{ $item->kategori->title }}</b>
                            <span style="margin-left:22px; color:#737373">{{ date('d M Y', strtotime($item->created_at)); }}</span>
                        </p>

                        <a href="/news/{{ $item->slug }}" style="text-decoration: none;" class="stretched-link">
                            <p style="font-size: 24px; font-weight: 500; color:black" class="card-text">{{ $item->title }}</p>
                        </a>
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