@extends('cms.layout.main')
@section('container')

<main class="content">
    <div class="container">
        <div class="row my-3">
            <div class="col-lg-12">
                <h1 class="mb-3">{{$about->title}}</h1>
                <a href="/c/about" class="btn btn-success">
                    <span data-feather="arrow-left"></span> About Us List
                </a>
                <a href="/c/about/{{$about->slug}}/edit" class="btn btn-warning">
                    <span data-feather="edit-2"></span>Edit
                </a>
                <form action="/c/about/{{$about->slug}}" class="d-inline" method="post">
                    @method('delete')
                    @csrf
                    <button onclick="return confirm('Are you sure?')" class="btn btn-danger"><span data-feather="trash-2"></span>Delete</button>
                </form>


            </div>
        </div>
        <div class="row my-3">
            <div class="col-md-6">
                @if($about->image)
                <div style="max-height: 350px;overflow:hidden">
                    <img src="{{ asset('storage/'.$about->image) }}" alt="{{ $about->title }}" class="img-fluid mt-3">
                </div>
                @endif
            </div>
        </div>
        <div class="row">
            <article class="my-3 fs-5">
                {!! $about->body !!}
            </article>
        </div>
    </div>
</main>

@endsection