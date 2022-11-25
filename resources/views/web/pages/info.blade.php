@extends('web.component.main')
@section('title','Info Klaim')
@section('description',Str::words(strip_tags(html_entity_decode($variabel->info_klaim->content ?? '')),15))
@section('keywords',$variabel->keyword_klaim_info->value ?? '')
@section('canonical',Request::fullUrl())
@section('container')
<style>
    .list-group-item.active {
        background: linear-gradient(106deg, rgba(41, 85, 155, 0.5) 10.89%, #29559B 100%);

    }
</style>
@include('web.component.title_jumbotron')
<section id="konten" class="m-5">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                @include('web.component.klaimMenu')
            </div>
            <div class="col-md-8">
                <h1 class="text-center mb-5">{{ $variabel->info_klaim->value ?? 'info_klaim[value]' }}</h1>
                @if(isset($variabel->info_klaim->image))
                <img class="img-fluid" src="{{ asset('storage/'.$variabel->info_klaim->image) }}" alt="$variabel->info_klaim->value">
                @endif
                <p class="mt-5">
                    {!! $variabel->info_klaim->content ?? 'info_klaim[content]' !!}
                </p>
                <form class="row g-3">
                    <div class="col-md-6">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="name" placeholder="Masukan Nama">
                    </div>
                    <div class="col-md-6">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="Masukan Email">
                    </div>
                    <div class="col-12">
                        <label for="subjek" class="form-label">Subjek</label>
                        <input type="text" class="form-control" id="subjek" placeholder="Masukan Subjek">
                    </div>
                    <div class="col-12">
                        <label for="pesan" class="form-label">Pesan Kamu</label>
                        <textarea placeholder="Masukan Pesan Kamu" class="form-control" id="pesan" name="pesan" rows="3"></textarea>
                    </div>
                    <div class="col-lg-3">
                        <label for="captcha" class="form-label">Captcha</label>
                        <input type="text" class="form-control" id="captcha" placeholder="Masukan Captcha">
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-danger">Kirim</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection