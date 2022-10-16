<footer style="color:aliceblue;background: linear-gradient(106deg, rgba(41, 85, 155, 0.5) 10.89%, #29559B 100%);">
    <div class="container py-5">
        <div class="row">
            <div class="col-md-4">
                <img src="{{ asset('assets/img/logo-2.png') }}" alt="">
                <p>{!! Request::get('variabel')->footer_info->content ?? 'footer_info' !!}</p>
            </div>
            <div class="col-md-4">
                <h5>Sitemap</h5>
                <div class="row row-cols-2">
                    <div class="col mt-3">Beranda</div>
                    <div class="col mt-3">Klaim</div>
                    <div class="col mt-3">Tentang Kami</div>
                    <div class="col mt-3">Galeri</div>
                    <div class="col mt-3">Produk</div>
                    <div class="col mt-3">Berita</div>
                    <div class="col mt-3">Mitra</div>
                </div>
            </div>
            <div class="col-md-4">
                <h5>Kontak</h5>
                {!! Request::get('variabel')->contact->content ?? '' !!}
            </div>
        </div>

    </div>
    <div class="row justify-content-center" style="background-color: #29559B;">
        <div class="col-md-4 text-center p-4" style="color:white ;">
            Copyrights 2022 Reliance Life
        </div>
    </div>
</footer>