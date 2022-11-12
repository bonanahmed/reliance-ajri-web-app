@extends('web.component.main')
@include('web.component.title_jumbotron')
@section('title','Form Request')
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

    .btn-darkblue {
        color: #e5e5e5;
        background-color: #29559B;
        border-radius: 8px;
    }

    .btn-darkblue:hover,
    .btn-darkblue:focus,
    .btn-darkblue:active,
    .btn-darkblue.active,
    .open>.dropdown-toggle.btn-darkblue {
        color: #fff;
        /*set the color you want here*/
    }
</style>
<section id="konten">
    <div class="container">
        <div class="row mx-4">
            <div class="col-md-12">
                <div class="transparent-card mb-5">
                    <form class="row g-3">
                        <div class="col-md-6">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="name" placeholder="Masukan Nama">
                        </div>
                        <div class="col-md-6">
                            <label for="jenis" class="form-label">Jenis Usaha</label>
                            <input type="text" class="form-control" id="jenis" placeholder="Masukan Jenis Usaha">
                        </div>
                        <div class="col-md-6">
                            <label for="tl" class="form-label">Tanggal Lahir</label>
                            <input type="text" class="form-control" id="tl" placeholder="Masukan Tanggal Lahir">
                        </div>
                        <div class="col-md-6">
                            <label for="tlp" class="form-label">Nomor Telepon</label>
                            <input type="text" class="form-control" id="tlp" placeholder="Masukan Nomor Telepon">
                        </div>
                        <div class="col-md-6">
                            <label for="company" class="form-label">Nama Perusahaan</label>
                            <input type="text" class="form-control" id="company" placeholder="Masukan Nama Perusahaan">
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="mail" placeholder="Masukan Email">
                        </div>
                        <div class="col-md-12">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input type="text" class="form-control" id="alamat" placeholder="Masukan Alamat">
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-danger">Kirim</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection