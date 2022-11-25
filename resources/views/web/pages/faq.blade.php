@extends('web.component.main')
@section('title', 'FAQ Klaim')
@section('description',Str::words(strip_tags(html_entity_decode($variabel->faq->content ?? 'faq[content]')),15))
@section('canonical',Request::fullUrl())
@section('keywords',$variabel->keyword_klaim_faq->value ?? '')
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