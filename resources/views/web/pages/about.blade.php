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


    <section id="konten" class="m-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="list-group">
                        <a type="button" class="list-group-item list-group-item-action active">
                            Cras justo odio
                        </a>
                        <a type="button" class="list-group-item list-group-item-action">Dapibus ac facilisis in</a>
                        <a type="button" class="list-group-item list-group-item-action">Morbi leo risus</a>
                        <a type="button" class="list-group-item list-group-item-action">Porta ac consectetur ac</a>
                        <a type="button" class="list-group-item list-group-item-action" disabled>Vestibulum at eros</a>
                    </div>
                </div>
                <div class="col-md-8">
                    <h1 class="text-center mb-5">Asuransi Jiwa Reliance Indonesia</h1>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. A odit, dolorum eos nisi perspiciatis optio laudantium voluptatibus cupiditate corrupti quam qui architecto velit officiis! Voluptates perspiciatis corporis praesentium autem ratione.</p>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. A odit, dolorum eos nisi perspiciatis optio laudantium voluptatibus cupiditate corrupti quam qui architecto velit officiis! Voluptates perspiciatis corporis praesentium autem ratione.</p>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. A odit, dolorum eos nisi perspiciatis optio laudantium voluptatibus cupiditate corrupti quam qui architecto velit officiis! Voluptates perspiciatis corporis praesentium autem ratione.</p>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. A odit, dolorum eos nisi perspiciatis optio laudantium voluptatibus cupiditate corrupti quam qui architecto velit officiis! Voluptates perspiciatis corporis praesentium autem ratione.</p>
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