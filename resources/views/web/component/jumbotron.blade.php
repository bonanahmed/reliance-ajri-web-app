<section class="jumbotron">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="pt-5">
                    <p style="margin: 0px;">Reliance</p>
                    <p style="color:#29559B;font-size:61px;font-weight:700">{{ Request::get('variabel')->produk_title->value ?? 'produk_title' }}</p>
                    <p style="color:#737373;
font-style: normal;
font-weight: 400;
font-size: 31px;">{{ Request::get('variabel')->produk_sub_title->value ?? 'produk_sub_title' }}</p>
                    <button type=" button" class="btn btn-md" style="background-color: #29559B;color:aliceblue">
                        <i class="fa-brands fa-whatsapp"></i> Konsultasi Sekarang
                    </button>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col">
                        <img class="rounded img-fluid" src="{{ asset('assets/img/frame.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
<!-- jumbotron end -->