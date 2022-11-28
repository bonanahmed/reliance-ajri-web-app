@extends('web.component.main')
@section('description',Str::words(strip_tags(html_entity_decode($brosur->body ?? '')),15))
@section('keywords',$brosur->meta_keywords)
@section('canonical',Request::fullUrl())
@section('title',$brosur->title)
@section('container')
<section id="konten" class="m-5">
    <div class="container py-5 mt-5">
        <div class="row">
            <div class="col-md">
                <h1>{{ $brosur->title }}</h1>
                @if($brosur->image)
                <img class="img-fluid rounded-2" src="{{ asset('storage/'.$brosur->image) }}" alt="">
                @endif
                <div class="ck-content mt-3">
                    {!! $brosur->body !!}
                </div>
                <div class="row">
                    <div class="col-md-12">
                        @if($brosur->files->count() > 0)
                        <div class="container">
                            <div class="row">
                                <table class="table table-borderless">
                                    <tbody>
                                        @foreach($brosur->files as $file)
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
                </div>
            </div>
        </div>
    </div>
</section>
@endsection