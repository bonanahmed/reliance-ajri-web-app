@extends('web.component.main')
@section('description','Reliance Form Request')
@section('canonical',Request::fullUrl())
@section('title','Form Request')
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
</style>
<section id="konten">
    <div class="container">
        <div class="row mx-4">
            <div class="col-md-12">
                <div class="transparent-card mb-5">
                    @if(session()->has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                    @endif

                    <form action="request" class="row g-3" method="post">
                        @csrf
                        <div class="col-md-6">
                            <label for="name" class="form-label">Nama</label>
                            <input name="name" value="{{ old('name')}}" type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Masukan Nama">
                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="jenis" class="form-label">Jenis Usaha</label>
                            <input name="jenis_usaha" type="text" value="{{ old('jenis_usaha')}}" class="form-control @error('jenis_usaha') is-invalid @enderror" id="jenis_usaha" placeholder="Masukan Jenis Usaha">
                            @error('jenis_usaha')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="tl" class="form-label">Tanggal Lahir</label>
                            <input name="birth_date" value="{{ old('birth_date')}}" type="date" class="form-control @error('birth_date') is-invalid @enderror" id="tl" placeholder="Masukan Tanggal Lahir">
                            @error('birth_date')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="phone" class="form-label">Nomor Telepon</label>
                            <input name="phone" type="text" value="{{ old('phone')}}" class="form-control @error('phone') is-invalid @enderror" id="phone" onkeypress="return onlyNumberKey(event)" placeholder="Masukan Nomor Telepon">
                            @error('phone')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="company" class="form-label">Nama Perusahaan</label>
                            <input name="company" type="text" value="{{ old('company')}}" class="form-control @error('company') is-invalid @enderror" id="company" placeholder="Masukan Nama Perusahaan">
                            @error('company')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="form-label">Email</label>
                            <input name="email" type="email" value="{{ old('email')}}" class="form-control @error('email') is-invalid @enderror" id="mail" placeholder="Masukan Email">
                            @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input name="address" type="text" value="{{ old('address')}}" class="form-control @error('address') is-invalid @enderror" id="alamat" placeholder="Masukan Alamat">
                            @error('address')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
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