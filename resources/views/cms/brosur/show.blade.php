@extends('cms.layout.main')
@section('container')

<main class="content">
    <div class="container">
        <div class="row my-3">
            <div class="col-lg-12">
                <h1 class="mb-3">{{$brosur->title}}</h1>
                <a href="/c/brosur" class="btn btn-success">
                    <span data-feather="arrow-left"></span> List Brosur
                </a>
                <a href="/c/brosur/{{$brosur->slug}}/edit" class="btn btn-warning">
                    <span data-feather="edit-2"></span>Edit
                </a>
                <form action="/c/brosur/{{$brosur->slug}}" class="d-inline" method="post">
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger button-submit"><span data-feather="trash-2"></span>Delete</button>
                </form>


            </div>
        </div>
        <div class="row my-3">
            <div class="col-md-6">
                @if($brosur->image)
                <div style="max-height: 350px;overflow:hidden">
                    <img src="{{ asset('storage/'.$brosur->image) }}" alt="{{ $brosur->title }}" class="img-fluid mt-3">
                </div>
                @endif
            </div>
        </div>
        <div class="row">
            <article class="ck-content my-3 fs-5">
                {!! $brosur->body !!}
            </article>
        </div>
    </div>
</main>

@endsection