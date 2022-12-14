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
                    <button onclick="return confirm('Are you sure?')" class="btn btn-danger"><span data-feather="trash-2"></span>Delete</button>
                </form>
                @if($news->image)
                <div style="max-height: 350px;overflow:hidden">
                    <img src="{{ asset('storage/'.$news->image) }}" alt="{{ $news->title }}" class="img-fluid mt-3">

                </div>
                @else
                <img src="" alt="{{$news->title}}" class="img-fluid mt-3">
                @endif
                <article class="my-3 fs-5">
                    {!! $news->body !!}
                </article>
            </div>
        </div>
    </div>
</main>

@endsection