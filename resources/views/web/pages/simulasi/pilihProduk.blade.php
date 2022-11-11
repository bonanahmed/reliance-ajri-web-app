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

    .btn {
        color: #e5e5e5;
        background-color: #29559B;
        border-radius: 8px;
    }

    .btn:hover,
    .btn:focus,
    .btn:active,
    .btn.active,
    .open>.dropdown-toggle.btn {
        color: #fff;
        /*set the color you want here*/
    }
</style>
<section id="konten">
    <div class="container py-5">
        <div class="row mx-4">
            <div class="col-md-12">
                <div class="transparent-card">
                    <h1 style="margin-bottom: 3rem;">Pilih Produk</h1>
                    <div class="col-md-5 mb-3">
                        <form action="/simulasi/produk" method="get">
                            <label for="exampleFormControlInput1" class="form-label">Silahkan Pilih Produk</label>
                            <select name="type" class="form-select mb-3" aria-label="Default select example">
                                <option value="karyawan" selected>Proteksi Karyawan</option>
                                <option value="keluarga">Proteksi Keluarga</option>
                                <option value="umkm">Proteksi UMKM</option>
                            </select>
                            <button type="submit" class="btn mb-3 py-2 px-4">Lanjut</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection