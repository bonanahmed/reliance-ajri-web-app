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
    <title>Reliance</title>
</head>

<body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">Reliance</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item mx-1">
                        <a class="nav-link active" aria-current="page" href="#">Beranda</a>
                    </li>
                    <li class="nav-item mx-3">
                        <a class="nav-link" href="#">Tentang Kami</a>
                    </li>
                    <li class="nav-item mx-3">
                        <a class="nav-link" href="#">Produk</a>
                    </li>
                    <li class="nav-item mx-3">
                        <a class="nav-link" href="#">Mitra</a>
                    </li>
                    <li class="nav-item mx-3">
                        <a class="nav-link" href="#">Klaim</a>
                    </li>
                    <li class="nav-item mx-3">
                        <a class="nav-link" href="#">Gallery</a>
                    </li>
                    <li class="nav-item mx-3">
                        <a class="nav-link" href="#">Berita</a>
                    </li>
                    <!-- <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Dropdown
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li> -->
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                    </li>
                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
    <!-- navbar end -->

    <!-- jumbotron -->
    <section class="jumbotron">
        <div class="row justify-content-around">
            <div class="col-md-6">
                <p>Reliance</p>
                <h1 class="display-4">Reliance Endowment</h1>
                <p class="lead">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Laboriosam hic deleniti ratione modi sequi sapiente, officia amet consectetur dolor dolore a architecto voluptatem veritatis error, debitis eaque eos facilis unde?</p>
                <button type="button" class="btn btn-md" style="background-color: #31386b;color:aliceblue">
                    <i class="fa-brands fa-whatsapp"></i> Konsultasi Sekarang
                </button>
            </div>
            <div class="col-md-6">
                <div class="row justify-content-center">
                    <div class="col">
                        <img class="rounded img-fluid" src="https://via.placeholder.com/400" alt="">
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- jumbotron end -->

    <section id="mitra">
        <div class="row my-5">
            <div class="col text-center">
                <h3 class="display-9">Dipercaya Oleh</h3>
                <p><small class="text-muted">Inilah beberapa dari mereka yang sudah bekerja sama dengan kami. Hubungi kami untuk kerja sama lebih lanjut</small></p>
            </div>
            <div class="col">
                <div class="your-class my-2 mb-5">
                    <div>
                        <img class="rounded" src="https://via.placeholder.com/100" alt="">
                    </div>
                    <div><img class="rounded" src="https://via.placeholder.com/100" alt=""></div>
                    <div><img class="rounded" src="https://via.placeholder.com/100" alt=""></div>
                    <div><img class="rounded" src="https://via.placeholder.com/100" alt=""></div>
                    <div><img class="rounded" src="https://via.placeholder.com/100" alt=""></div>
                    <div><img class="rounded" src="https://via.placeholder.com/100" alt=""></div>
                    <div><img class="rounded" src="https://via.placeholder.com/100" alt=""></div>
                </div>
            </div>
        </div>
    </section>
    <!-- slider 
    <section class="row">
        <div class="your-class my-2 mb-5">
            <div>
                <img class="rounded" src="https://via.placeholder.com/100" alt="">
            </div>
            <div><img class="rounded" src="https://via.placeholder.com/100" alt=""></div>
            <div><img class="rounded" src="https://via.placeholder.com/100" alt=""></div>
            <div><img class="rounded" src="https://via.placeholder.com/100" alt=""></div>
            <div><img class="rounded" src="https://via.placeholder.com/100" alt=""></div>
            <div><img class="rounded" src="https://via.placeholder.com/100" alt=""></div>
            <div><img class="rounded" src="https://via.placeholder.com/100" alt=""></div>
        </div>
    </section>
    slider end -->

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

    <section style="background-image: url('https://via.placeholder.com/1600x800');background-size:contain;background-position:center;">
        <div class="row p-5">
            <div class="col-md-6 p-lg-5">
                <h1 class="display-4">Cukup Bayar Sesuai Risikomu</h1>
                <p class="w-50">Lorem ipsum dolor sit amet consectetur adipisicing elit. Non nulla fugiat nesciunt. Ipsam ducimus officiis explicabo reiciendis dolorem nam, deleniti tempore similique quidem. Pariatur voluptatem, ullam quae esse placeat sed.Lorem ipsum dolor sit amet consectetur adipisicing elit. Non nulla fugiat nesciunt. Ipsam ducimus officiis explicabo reiciendis dolorem nam, deleniti tempore similique quidem. Pariatur voluptatem, ullam quae esse placeat sed.</p>
                <button type="button" class="btn btn-primary btn-sm py-3 px-4" style="border-radius: 10px;border:none; background-color: #31386b;">
                    Lihat Selengkapnya
                </button>
            </div>
        </div>
        <div style="position: relative; bottom:0px">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                <path fill="#ffffff" fill-opacity="1" d="M0,288L48,272C96,256,192,224,288,197.3C384,171,480,149,576,165.3C672,181,768,235,864,250.7C960,267,1056,245,1152,250.7C1248,256,1344,288,1392,304L1440,320L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
            </svg>
        </div>
    </section>



    <section>
        <div class="row justify-content-around">
            <div class="col text-center">
                <img src="https://via.placeholder.com/200x200" alt="">
                <p>Cek Status Premi</p>
                <p>Ingin cek status klaim Anda?</p>
            </div>
            <div class="col text-center">
                <img src="https://via.placeholder.com/200x200" alt="">
                <p>Cek Status Premi</p>
                <p>Ingin cek status klaim Anda?</p>
            </div>
        </div>
    </section>


    <section>
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
                        <img src="https://via.placeholder.com/200x200" alt="...">
                        <h5>Individu</h5>
                        <button type="button" class="btn btn-outline-primary">Primary</button>
                    </div>
                </div>
                <div class="col-md-4 mb-5">
                    <div class="text-center">
                        <img src="https://via.placeholder.com/200x200" alt="...">
                        <h5>Individu</h5>
                        <button type="button" class="btn btn-outline-primary">Primary</button>
                    </div>
                </div>
                <div class="col-md-4 mb-5">
                    <div class="text-center">
                        <img src="https://via.placeholder.com/200x200" alt="...">
                        <h5>Individu</h5>
                        <button type="button" class="btn btn-outline-primary">Primary</button>
                    </div>
                </div>
                <div class="col-md-4 mb-5">
                    <div class="text-center">
                        <img src="https://via.placeholder.com/200x200" alt="...">
                        <h5>Individu</h5>
                        <button type="button" class="btn btn-outline-primary">Primary</button>
                    </div>
                </div>
                <div class="col-md-4 mb-5">
                    <div class="text-center">
                        <img src="https://via.placeholder.com/200x200" alt="...">
                        <h5>Individu</h5>
                        <button type="button" class="btn btn-outline-primary">Primary</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="news">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <h5>Info Daily Reliance</h5>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-5">
                    <div class="card">
                        <img src="https://via.placeholder.com/200x200" class="card-img-top" alt="...">
                        <div class="card-body">
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