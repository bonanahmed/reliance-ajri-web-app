@extends('web.component.main')
@include('web.component.title_jumbotron')
@section('container')
<style>
    .list-group-item.active {
        background: linear-gradient(106deg, rgba(41, 85, 155, 0.5) 10.89%, #29559B 100%);

    }
</style>
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
            </div>
        </div>
    </div>
</section>
@endsection