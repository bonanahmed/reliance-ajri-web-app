<section class="jumbotron">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="pt-5 mt-5">
                    <p style="margin: 0px;color:#29559B; font-size:20px">Reliance</p>
                    <p style="color:#29559B;font-size:53px;font-weight:700; font-style:normal;letter-spacing: 0.025em;">
                        {{ Request::get('variabel')->about_jumbotron_title->value ?? 'about_jumbotron_title' }}
                    </p>
                    <p style="color:#737373;font-style: normal;font-weight: 400;font-size: 31px;">{{
                        Request::get('variabel')->about_jumbotron_sub_title->value ?? 'about_jumbotron_sub_title' }}</p>
                    <a href="{{
                        Request::get('variabel')->whatsapp_url->value ?? '#' }}" target="_blank" type=" button" class="btn btn-md" style="background-color: #29559B;color:aliceblue;padding:16px 32px; border-radius:12px">
                        <i class="fa-brands fa-whatsapp"></i> Konsultasi Sekarang
                    </a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col" style="position:relative">
                        <div class="bg-right-side mt-5">
                            <img class="rounded img-fluid" src="{{ asset('assets/img/kuncir.png') }}" alt="Batik" title="Batik">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
<!-- jumbotron end -->