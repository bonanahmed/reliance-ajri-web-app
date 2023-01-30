<footer style="color:aliceblue;background: linear-gradient(106deg, rgba(41, 85, 155, 0.5) 10.89%, #29559B 100%);">
    <div class="container py-5">
        <div class="row">
            <div class="col-md-4">
                <img src="{{ asset('assets/img/logo-2.png') }}" title="Reliance Logo" alt="Reliance Logo">
                <p>{!! Request::get('variabel')->footer_info->content ?? 'footer_info' !!}</p>
            </div>
            <div class="col-md-4">
                <h5>Sitemap</h5>
                <div class="row row-cols-2 mb-4">
                    <div class="col mt-3"><a href="/" class="custom-link">Beranda</a></div>
                    <div class="col mt-3"><a href="/" class="custom-link">Klaim</a></div>
                    <div class="col mt-3"><a href="/about/{{ $about_list->first()->slug ?? ''}}" class="custom-link">Tentang Kami</a></div>
                    <div class="col mt-3"><a href="/" class="custom-link">Galeri</a></div>
                    <div class="col mt-3"><a href="/produk/kumpulan/{{ $produk_kumpulan->first()->slug ?? '' }}" class="custom-link">Produk</a></div>
                    <div class="col mt-3"><a href="/" class="custom-link">Berita</a></div>
                    <div class="col mt-3"><a href="/" class="custom-link">Mitra</a></div>
                </div>
            </div>
            <div class="col-md-4">
                <h5>Kontak</h5>
                {!! Request::get('variabel')->contact->content ?? '' !!}
            </div>
        </div>

    </div>
    <div class="row justify-content-center g-0" style="background-color: #29559B;">
        <div class="col-md-4 text-center p-4" style="color:white ;">
            PT Asuransi Jiwa Reliance Indonesia berizin dan diawasi oleh Otoritas Jasa Keuangan <br/>
            Copyrights © 2022 Reliance Life
        </div>
    </div>

</footer>