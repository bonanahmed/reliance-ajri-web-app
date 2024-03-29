@extends('cms.layout.main')
@section('container')

<main class="content">
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3">Create Content</h1>
        <div class="card flex-fill">
            @if(session()->has('error'))
            <div class="row p-3 rounded" style="background-color:#f7b4b0 ;">
                {{ session('error') }}
            </div>
            @endif
        </div>
        <div class="col-lg-8">
            <form action="/c/slider" method="post" enctype="multipart/form-data">
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
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="editor" name="description"></textarea>
                    <!-- <input id="description" type="hidden" name="description" value="{{ old('description') }}"> -->
                    @error('description')
                    <p class="text-danger">
                        {{ $message }}
                    </p>
                    @enderror
                    <!-- <trix-editor input="description" class="trix-background"></trix-editor> -->
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <img class="img-preview img-fluid mb-3 col-sm-5">
                    <input name="image" id="image" class="form-control @error('image') is-invalid @enderror" type="file" onchange="previewImage()">
                    @error('image')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="button" class="form-label">Button</label>
                    <input name="button" value="{{ old('button')}}" type="text" class="form-control @error('button') is-invalid @enderror" id="button" aria-describedby="button">
                    @error('button')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="button_link" class="form-label">Button Link</label>
                    <input placeholder="http://example.com" name="button_link" value="{{ old('button_link')}}" type="text" class="form-control @error('button_link') is-invalid @enderror" id="button_link" aria-describedby="button_link">
                    @error('button_link')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>

    </div>
</main>
<script>
    function previewImage() {
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader()
        oFReader.readAsDataURL(image.files[0]);
        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }
</script>

@endsection