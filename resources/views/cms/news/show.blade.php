@extends('cms.layout.main')
@section('container')

<main class="content">
    <div class="container">
        <div class="row my-3">
            <div class="col-lg-12">
                <h1 class="mb-3">{{$news->title}}</h1>
                <a href="/c/news" class="btn btn-success">
                    <span data-feather="arrow-left"></span> List News
                </a>
                <a href="/c/news/{{$news->slug}}/edit" class="btn btn-warning">
                    <span data-feather="edit-2"></span>Edit
                </a>
                <form action="/c/news/{{$news->slug}}" class="d-inline" method="post">
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger button-submit"><span data-feather="trash-2"></span>Delete</button>
                </form>


            </div>
        </div>
        <div class="row my-3">
            <div class="col-md-6">
                @if($news->image)
                <div style="max-height: 350px;overflow:hidden">
                    <img src="{{ asset('storage/'.$news->image) }}" alt="{{ $news->title }}" class="img-fluid mt-3">
                </div>
                @endif
            </div>
        </div>
        <div class="row">
            <article class="my-3 fs-5">
                {!! $news->body !!}
            </article>
        </div>
    </div>
</main>

@endsection