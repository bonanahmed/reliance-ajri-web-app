@extends('web.component.main')
@section('title', $about->title)
@section('description',$about->meta_description)
@section('keywords',$about->meta_keywords)
@section('meta_title',$about->meta_title)
@section('canonical',Request::fullUrl())
@section('container')

<style>
    .list-group-item.active {
        background: linear-gradient(106deg, rgba(41, 85, 155, 0.5) 10.89%, #29559B 100%);
    }
</style>
@include('web.component.about_jumbotron')
<section id="konten" class="m-5">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-xs-12">
                @include('web.component.about_list_menu')
            </div>
            <div class="col-md-8 col-xs-12">
                <h1 class="text-center mb-3 resp-title">{{ $about->title }}</h1>
                <div class="text-center">
                    @if($about->image)
                    <img class="img-fluid mb-5" src="{{ asset('storage/'.$about->image) }}" alt="{{ $about->title }}">
                    @endif
                </div>
                <div class="ck-content px-3">
                    {!! $about->body !!}
                </div>
                <!-- <div class="row">
                    <div class="col-md-12">
                        @if($about->files->count() > 0)
                        <div class="container">
                            <div class="row">
                                <table class="table table-borderless">
                                    <tbody>
                                        @foreach($about->files as $file)
                                        <tr>
                                            <td><a href="{{ asset('storage/'.$file->file) }}" target="_blank">{{
                                                    $file->filename }}</a></td>

                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        @endif
                    </div>
                </div> -->
            </div>
        </div>

    </div>
</section>
@endsection