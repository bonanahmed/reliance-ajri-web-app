@extends('web.component.main')
@include('web.component.title_jumbotron')
@section('title', 'FAQ Klaim')
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
                <h1 class="text-center mb-5">{{ $variabel->faq->value ?? 'faq[value]' }}</h1>
                @if(isset($variabel->faq->image))
                <img class="img-fluid" src="{{ asset('storage/'.$variabel->faq->image) }}" alt="$variabel->faq->value">
                @endif
                <div class="ck-content px-3">
                    {!! $variabel->faq->content ?? 'faq[content]' !!}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection