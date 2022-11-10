@extends('web.component.main')
@include('web.component.title_jumbotron')
@section('title','Simulasi Proteksi Karyawan')
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
                <div class="transparent-card">
                    <h1 style="margin-bottom: 3rem;">2. Proteksi Karyawan</h1>
                    <p>Reliance Proteksi Karyawan merupakan program asuransi jiwa berjangka dengan masa perlindungan per tahun yang memberikan perlindungan maksimal untuk para karyawan. Produk ini cocok bagi Perusahaan untuk meringankan beban para karyawannya ketika terjadi hal yang tidak diinginkan. Bila ada karyawan yang meninggal dunia karena sakit atau kecelakaan akan mendapatkan uang pertanggungan.</p>
                    <div class="col-md-5 mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Silahkan Pilih Produk</label>
                        <select id="produk" class="form-select mb-3" aria-label="Default select example">
                            <option selected>Reliance Term Life</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>

                        <label for="peserta" class="form-label">Peserta</label>
                        <input type="text" class="form-control mb-3" id="peserta" placeholder="Masukan Jumlah Peserta yang diinginkan (minimal 50)">

                        <label for="peserta" class="form-label">Premi</label>
                        <input type="text" class="form-control mb-3" id="peserta" placeholder="Total Premi" disabled>

                        <a href="/simulasi/produk" class="btn btn-outline-primary mr-1 mb-3 py-2 px-4">Kembali</a>
                        <a href="/simulasi/karyawan" class="btn btn-darkblue mb-3 py-2 px-4">Submit</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection