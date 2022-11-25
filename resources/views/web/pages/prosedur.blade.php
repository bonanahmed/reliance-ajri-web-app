@extends('web.component.main')
@section('title','Prosedur Klaim')
@section('description',Str::words(strip_tags(html_entity_decode($variabel->prosedur_klaim->content ?? '')),15))
@section('keywords',$variabel->keyword_klaim_prosedur->value ?? '')
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
                <h1 class="text-center mb-5">{{ $variabel->prosedur_klaim->value ?? 'prosedur_klaim[value]' }}</h1>
                @if(isset($variabel->prosedur_klaim->image))
                <img class="img-fluid text-center" src="{{ asset('storage/'.$variabel->prosedur_klaim->image) }}" alt="$variabel->prosedur_klaim->value">
                @endif
                <div class="ck-content mt-5">
                    {!! $variabel->prosedur_klaim->content ?? 'prosedur_klaim[content]' !!}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection