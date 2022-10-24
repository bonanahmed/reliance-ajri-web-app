<section class="jumbotron">
    <div class="row">
        <div class="col-md-12">
            <div class="pt-5 px-5">
                <span style="color:#29559B;font-size:61px;font-weight:700">{{ $head_title ?? '{module}_title' }}</span>
                <p style="font-size: 31px; font-weight: 400;color:#737373">{{ $head_sub_title ?? '{module}_sub_title' }}</p>
                <button type="button" class="btn btn-md mb-4" style="background-color: #29559B;color:white">
                    {{ Request::get('variabel')->btn_simulasi->value ?? 'btn_simulasi' }}
                </button>
            </div>
        </div>
    </div>
</section>
<!-- jumbotron end -->