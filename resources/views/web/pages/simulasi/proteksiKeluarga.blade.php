@extends('web.component.main')
@section('description',Str::words(strip_tags(html_entity_decode($variabel->description_proteksi_keluarga->content ?? '')),15))
@section('keywords',$variabel->keyword_proteksi_keluarga->value ?? '')
@section('canonical',Request::fullUrl())
@section('title','Simulasi Proteksi Keluarga')
@section('container')
@include('web.component.title_jumbotron')
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

    .info-feedback {
        margin-top: 0;
    }
</style>
<section id="konten">
    <div class="container py-5">
        <div class="row mx-4">
            <div class="col-md-12">
                <div class="transparent-card">
                    <h1 style="margin-bottom: 3rem;">Proteksi Keluarga</h1>
                    <p>Reliance Proteksi Keluarga merupakan program asuransi jiwa berjangka dengan masa perlindungan per tahun yang membantu masyarakat ketika salah satu anggota keluarga meninggal dunia karena sakit atau kecelakaan akan mendapatkan uang pertanggungan.</p>
                    <div class="col-md-5 mb-3">
                        <label for="plan" class="form-label">Silahkan Pilih Plan</label>
                        <select id="plan" class="form-select mb-3" aria-label="Default select example">
                            <option value="A1" selected>Plan A1(2 Peserta)</option>
                            <option value="A2">Plan A1-2(2 Peserta)</option>
                        </select>

                        <label for="jumlah_plan" class="form-label">Jumlah Plan</label>
                        <select id="jumlah_plan" class="form-select mb-3" aria-label="Default select example">
                            <option value="A1" selected>Plan A1(2 Peserta)</option>
                            <option value="A2">Plan A1-2(2 Peserta)</option>
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