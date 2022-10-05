@extends('cms.layout.main')
@section('container')

<main class="content">
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3">Create News</h1>

        <div class="col-lg-8">
            <form action="/c/news" method="post">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input name="title" value="{{ old('title')}}" type="text" class="form-control @error('title') is-invalid @enderror" id="title" aria-describedby="title">
                    @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="slug" class="form-label">Slug</label>
                    <input value="{{ old('slug')}}" name="slug" type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" aria-describedby="slug">
                    @error('slug')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="title" class="form-label">Body</label>
                    <input id="body" type="hidden" name="body" value="{{ old('body') }}">
                    @error('body')
                    <p class="text-danger">
                        {{ $message }}
                    </p>
                    @enderror
                    <trix-editor input="body"></trix-editor>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>

    </div>
</main>

@endsection