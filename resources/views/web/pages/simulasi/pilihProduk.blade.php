@extends('web.component.main')
@include('web.component.title_jumbotron')
@section('title','Simulasi Pilih Produk')
@section('container')
<style>
    .list-group-item.active {
        background: linear-gradient(106deg, rgba(41, 85, 155, 0.5) 10.89%, #29559B 100%);

    }

    #konten {
        background-image: url('/assets/img/batik3.png');
    }

    body {
        background-color: #e5e5e5;
    }
</style>
<section id="konten">
    <div class="container">
        <div class="row mx-4 pb-4">
            <div class="col-md-12">
                <div class="transparent-card">
                    <h1 style="margin-bottom: 3rem;">1. Pilih Produk</h1>
                    <div class="col-md-6 mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection