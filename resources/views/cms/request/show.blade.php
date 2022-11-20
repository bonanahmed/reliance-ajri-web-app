@extends('cms.layout.main')
@section('container')

<main class="content">
    <div class="container">
        <div class="row my-3">
            <div class="col-lg-12">
                <h1 class="mb-3">Form Request</h1>
                <a href="/c/request" class="btn btn-success">
                    <span data-feather="arrow-left"></span> List of Requests
                </a>
                <form action="/c/request/{{$form->id}}" class="d-inline" method="post">
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger button-submit"><span data-feather="trash-2"></span>Delete</button>
                </form>


            </div>
        </div>
        <div class="row">
            <form class="row g-3">
                <div class="col-md-6">
                    <label for="name" class="form-label">Nama</label>
                    <input disabled value="{{$form->name}}" type="text" class="form-control" id="name" placeholder="Masukan Nama">
                </div>
                <div class="col-md-6">
                    <label for="jenis" class="form-label">Jenis Usaha</label>
                    <input disabled value="{{$form->jenis_usaha}}" type="text" class="form-control" id="jenis" placeholder="Masukan Jenis Usaha">
                </div>
                <div class="col-md-6">
                    <label for="tl" class="form-label">Tanggal Lahir</label>
                    <input disabled value="{{$form->birth_date}}" type="text" class="form-control" id="tl" placeholder="Masukan Tanggal Lahir">
                </div>
                <div class="col-md-6">
                    <label for="tlp" class="form-label">Nomor Telepon</label>
                    <input disabled value="{{$form->phone}}" type="text" class="form-control" id="tlp" placeholder="Masukan Nomor Telepon">
                </div>
                <div class="col-md-6">
                    <label for="company" class="form-label">Nama Perusahaan</label>
                    <input disabled value="{{$form->company}}" type="text" class="form-control" id="company" placeholder="Masukan Nama Perusahaan">
                </div>
                <div class="col-md-6">
                    <label for="email" class="form-label">Email</label>
                    <input disabled value="{{$form->email}}" type="email" class="form-control" id="mail" placeholder="Masukan Email">
                </div>
                <div class="col-md-12">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input disabled value="{{$form->address}}" type="text" class="form-control" id="alamat" placeholder="Masukan Alamat">
                </div>
            </form>
        </div>
    </div>
</main>

@endsection