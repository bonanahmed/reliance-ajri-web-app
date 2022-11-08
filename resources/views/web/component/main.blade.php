<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- my css -->
    <link rel="stylesheet" href="{{ asset('assets/style.css') }}">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Rubik">

    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- slick slider -->
    <!-- Add the slick-theme.css if you want default styling -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <!-- Add the slick-theme.css if you want default styling -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />
    <title>Reliance - @yield('title')</title>
</head>

<body>
    <!-- navbar -->
    @include('web.component.navbar')
    <!-- navbar end -->
    @yield('container')


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