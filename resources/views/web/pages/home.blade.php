<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- my css -->
    <link rel="stylesheet" href="assets/style.css">

    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- slick slider -->
    <!-- Add the slick-theme.css if you want default styling -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <!-- Add the slick-theme.css if you want default styling -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />
    <title>{{ $variabel->title->value ?? 'WEBSITE' }}</title>
</head>

<body>
    <!-- navbar -->
    @include('web.component.navbar')
    <!-- navbar end -->

    @include('web.component.jumbotron1')

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

    <section class="d-flex flex-column my-5 mt-5">
        <div class="text-center mb-5">
            <p class="h4" style="color:#043055"><b>Big Coverage Insurance Made Easy For You</b></p>
            <p><small class="text-muted"> jiwa murni hingga 5Miliar tanpa cek medis</small></p>
        </div>
        <div class="tab-steps py-5" style="background-image:url('https://i.pinimg.com/474x/6f/76/97/6f769766a1ebea9f1b9c92281df8c518--white-patterns-random-things.jpg')">
            <div class="tab-steps-item">
                <div class="row">
                    <div class="col text-center">
                        <img style="border-radius: 1rem;" src="https://via.placeholder.com/500x200" alt="">
                    </div>
                    <div class="col">
                        <div class="row justify-content-end">
                            <div class="card" style="width: 40rem;border-radius:1rem;background-color: #FFFFFF7F;">
                                <div class="card-body">
                                    <h5 class="card-title">4. Reliance Group Term Life</h5>
                                    <p class="text-dark" style="width: 25rem"><small> Lorem ipsum dolor, sit amet consectetur adipisicing elit. Cum corrupti vero ratione laboriosam enim? Deleniti est nam voluptate porro, ipsam facilis alias placeat eum dolore praesentium quidem odio adipisci fuga!</small></p>
                                    <button type="button" class="btn btn-primary btn-sm p-2" style="border-radius: 10px; background-color: #31386b;">
                                        Cek Flexi Life Sekarang
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="tab-steps-item d-none">
                <div class="tab-steps--blocks">
                    <span class="tab-steps--number">2</span>
                    <span class="tab-steps--desease">copie-colle</span>
                </div>
            </div>
            <div class="tab-steps-item d-none">
                <div class="tab-steps--blocks">
                    <span class="tab-steps--number">3</span>
                    <span class="tab-steps--desease">Edites</span>
                </div>
            </div>
            <div class="tab-steps-item d-none">
                <div class="tab-steps--blocks">
                    <div class="tab-steps--number">4</div>
                    <div class="tab-steps--desease">Générer</div>
                </div>
            </div>
            <div class="tab-steps-item d-none">
                <div class="tab-steps--blocks">
                    <div class="tab-steps--number">5</div>
                    <div class="tab-steps--desease">Générer</div>
                </div>
            </div>
            <!-- progress tracker -->
            <div class="flex-row text-center">
                <div class="flex-col-xs-12">
                    <ul class="tab-steps--list">
                        <li class="active" data-step="1"></li>
                        <li data-step="2"></li>
                        <li data-step="3"></li>
                        <li data-step="4"></li>
                        <li data-step="5"></li>
                    </ul>
                    <p class="fw-bolder">Reliance Group Term Life</p>
                </div>
            </div>
            <!-- progress tracker -->
        </div>

    </section>

    <section style="background-image: url('{{ asset('assets/img/family-portrait.png') }}');background-size: cover;background-repeat: no-repeat;">
        <div class="row" style="padding:25px 60px 0px ;">
            <div class="col-md-6">
                <h1 class="display-4">Cukup Bayar Sesuai Risikomu</h1>
                <p class="w-50">Lorem ipsum dolor sit amet consectetur adipisicing elit. Non nulla fugiat nesciunt. Ipsam ducimus officiis explicabo reiciendis dolorem nam, deleniti tempore similique quidem. Pariatur voluptatem, ullam quae esse placeat sed.Lorem ipsum dolor sit amet consectetur adipisicing elit. Non nulla fugiat nesciunt. Ipsam ducimus officiis explicabo reiciendis dolorem nam, deleniti tempore similique quidem. Pariatur voluptatem, ullam quae esse placeat sed.</p>
                <button type="button" class="btn btn-primary btn-sm py-3 px-4" style="border-radius: 10px;border:none; background-color: #31386b;">
                    Lihat Selengkapnya
                </button>
            </div>
        </div>
        <div style="position: relative; bottom:0rem">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                <path fill="#ffffff" fill-opacity="1" d="M0,288L48,272C96,256,192,224,288,197.3C384,171,480,149,576,165.3C672,181,768,235,864,250.7C960,267,1056,245,1152,250.7C1248,256,1344,288,1392,304L1440,320L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
            </svg>
        </div>
    </section>



    <section>
        <div class="row justify-content-around">
            <div class="col text-center">
                <img class="img-fluid" src="{{ asset('assets/img/shield.png') }}" alt="">
                <p>Cek Status Premi</p>
                <p>Ingin cek status klaim Anda?</p>
                <button type="button" class="btn btn-outline-primary">Cek Status Premi Sekarang</button>
            </div>
            <div class="col text-center">
                <img class="img-fluid" src="{{ asset('assets/img/papers.png') }}" alt="">
                <p>Cek Status Premi</p>
                <p>Ingin cek status klaim Anda?</p>
                <button type="button" class="btn btn-outline-primary">Ajukan Sekarang</button>
            </div>
        </div>
    </section>


    <section id="produk">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <h4>Pilihan Produk Terbaik Kami</h4>
                    <p class="text-muted" style="font-size:12px ;">Asuransi jiwa murni hingga 5miliar tanpa cek medis</p>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-4 mb-5">
                    <div class="text-center">
                        <img class="img-fluid" src="{{ asset('assets/img/umbrella.png') }}" alt="...">
                        <h5>Individu</h5>
                        <button type="button" class="btn btn-outline-primary">Cek Detail Sekarang</button>
                    </div>
                </div>
                <div class="col-md-4 mb-5">
                    <div class="text-center">
                        <img class="img-fluid" src="{{ asset('assets/img/umbrella-rain.png') }}" alt="...">
                        <h5>Kumpulan</h5>
                        <button type="button" class="btn btn-outline-primary">Cek Detail Sekarang</button>
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
                    <h5>Info Daily Reliance</h5>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-5">
                    <div class="card">
                        <img src="{{ asset('assets/img/info-daily.png') }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="mb-2"><b>Kategori</b> <span class="text-muted">12 Januari 2022</span></p>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-5">
                    <div class="card">
                        <img src="{{ asset('assets/img/info-daily.png') }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="mb-2"><b>Kategori</b> <span class="text-muted">12 Januari 2022</span></p>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-5">
                    <div class="card">
                        <img src="{{ asset('assets/img/info-daily.png') }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="mb-2"><b>Kategori</b> <span class="text-muted">12 Januari 2022</span></p>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-3 text-center">
                    <button type="button" class="btn btn-outline-danger">Lihat Semua Berita</button>
                </div>
            </div>
        </div>
    </section>

    @include('web.component.footer')



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('.your-class').slick({
                arrows: false,
                slidesToShow: 6,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 0,
                infinite: true,
                speed: 5000,
            });

        });

        $(document).ready(function() {

            $('.tab-steps--list li').click(function() {

                $(this).addClass('active');

                var dataStep = $(this).attr('data-step');
                $('.tab-steps--list li').each(function() {
                    if ($(this).attr('data-step') > dataStep) {
                        $(this).removeClass('active');
                    } else {
                        $(this).addClass('active');
                    }
                });
                $(".tab-steps").find(".tab-steps-item").addClass("d-none");
                $(".tab-steps").find(".tab-steps-item").eq($(this).index()).removeClass("d-none").addClass('in');
                $(".tab-steps").find(".tab-steps-item").eq($(this).index() + 1).addClass("d-none");

            })
        })
    </script>

</body>

</html>