<footer style="background: linear-gradient(106deg, rgba(41, 85, 155, 0.5) 10.89%, #29559B 100%);">
    <div class="container py-5">
        <div class="row">
            <div class="col-md-4">
                <img src="{{ asset('assets/img/logo-2.png') }}" alt="">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam facere animi placeat quae ad delectus pariatur dolores velit, odio, optio hic nihil. Animi laboriosam rem iure vel. Accusantium, praesentium neque.</p>
            </div>
            <div class="col-md-4">
                <h5>Sitemap</h5>
                <div class="row row-cols-2">
                    <div class="col">Column</div>
                    <div class="col">Column</div>
                    <div class="col">Column</div>
                    <div class="col">Column</div>
                </div>
            </div>
            <div class="col-md-4">
                <h5>Kontak</h5>
                {!! $variabel->contact->content ?? '' !!}
            </div>
        </div>

    </div>
    <div class="row justify-content-center" style="background-color: #29559B;">
        <div class="col-md-4 text-center p-4" style="color:white ;">
            Copyrights 2022 Reliance Life
        </div>
    </div>
</footer>