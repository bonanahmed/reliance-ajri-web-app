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
                    <h1 style="margin-bottom: 3rem;">3. Proteksi UMKM</h1>
                    <p>Reliance Life berkomitmen memperluas akses keuangan di masyarakat dengan menghadirkan asuransi Proteksi UMKM (Usaha Mikro Kecil Menengah) guna memberi solusi bagi penduduk berpenghasilan rendah yang tidak mampu mengelola risiko. Apabila peserta meninggal dunia karena sakit atau kecelakaan akan mendapatkan uang pertanggungan.</p>
                    <div class="col-md-5 mb-3">
                        <label for="plan" class="form-label">Uang Pertanggunan</label>
                        <input type="text" class="form-control mb-3" id="plan" placeholder="Plan-A1(2 Peserta)">

                        <label for="pinjaman" class="form-label">Masa Pinjaman</label>
                        <select id="pinjaman" class="form-select mb-3" aria-label="Default select example">
                            <option selected>1 Bulan</option>
                            <option>2 Bulan</option>
                        </select>

                        <label for="peserta" class="form-label">Jumlah Peserta</label>
                        <select id="peserta" class="form-select mb-3" aria-label="Default select example">
                            <option selected>1 Bulan</option>
                            <option>2 Bulan</option>
                        </select>

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