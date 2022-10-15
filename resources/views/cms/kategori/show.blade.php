@extends('cms.layout.main')
@section('container')

<main class="content">
    <div class="container">
        <div class="row my-3">
            <div class="col-lg-12">
                <h1 class="mb-3">{{$kategori->title}}</h1>
                <a href="/c/kategori" class="btn btn-success">
                    <span data-feather="arrow-left"></span> List Kategori
                </a>
                <a href="/c/kategori/{{$kategori->id}}/edit" class="btn btn-warning">
                    <span data-feather="edit-2"></span>Edit
                </a>
                <form action="/c/kategori/{{$kategori->id}}" class="d-inline" method="post">
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger button-submit"><span data-feather="trash-2"></span>Delete</button>
                </form>
                <article class="my-3 fs-5">
                    <h4>Description</h4>
                    {{ $kategori->description }}
                </article>
            </div>
        </div>
    </div>
</main>

@endsection