<section class="jumbotron with-landing-page">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="pt-5">
                    <span class="title-jumbotron">{{ $head_title ?? '{module}_title' }}</span>
                    <p class="desc-jumbotron">{{ $head_sub_title ?? '{module}_sub_title' }}</p>
                    <a href="{{ Request::get('variabel')->link_simulasi->value ?? '/' }}" type="button" class="btn btn-md mb-4" style="background-color: #29559B;color:white">
                        {{ Request::get('variabel')->btn_simulasi->value ?? 'btn_simulasi' }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- jumbotron end -->