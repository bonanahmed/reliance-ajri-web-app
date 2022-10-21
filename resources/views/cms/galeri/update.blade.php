@extends('cms.layout.main')
@section('container')

<main class="content">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-12 d-flex">
                <div class="card flex-fill">
                    @if(session()->has('success'))
                    <div class="row p-3 rounded" style="background-color:#cbf5d9 ;">
                        {{ session('success') }}
                    </div>
                    @endif
                </div>
            </div>
        </div>
        <h1 class="h3 mb-3">Edit Galeri</h1>

        <div class="row mb-5">
            <div class="col-lg-8">
                <form action="/c/galeri/{{ $galeri->id }}" method="post" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input name="title" value="{{ old('title',$galeri->title)}}" type="text" class="form-control @error('title') is-invalid @enderror" id="title" aria-describedby="title">
                        @error('title')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="slug" class="form-label">Slug</label>
                        <input value="{{ old('slug',$galeri->slug)}}" name="slug" type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" aria-describedby="slug">
                        @error('slug')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">description</label>
                        <input id="description" type="hidden" name="description" value="{{ old('description',$galeri->description) }}">
                        @error('description')
                        <p class="text-danger">
                            {{ $message }}
                        </p>
                        @enderror
                        <trix-editor input="description"></trix-editor>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">image</label>
                        <input name="image[]" type="file" class="form-control @error('image') is-invalid @enderror" id="image" aria-describedby="image" multiple="true">
                        @error('image')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
        <div class="container">
            <div class="row">
                @foreach($galeri->images as $image)
                <div class="col-md-2">
                    <div class="image-area">
                        <a href="{{ asset('storage/'.$image->image) }}" target="_blank">
                            <img src="{{ asset('storage/'.$image->image) }}" class="img-thumbnail" alt="Preview">
                        </a>
                        <form action="/c/image/{{$image->id}}/delete" class="d-inline" method="post">
                            @method('delete')
                            @csrf
                            <a class="remove-image button-image-remove" href="javascript:;" style="display: inline;">&#215;</a>
                        </form>
                    </div>

                </div>
                @endforeach
            </div>
        </div>

    </div>
</main>
<script>
    const title = document.querySelector('#title')
    const slug = document.querySelector('#slug')
    title.addEventListener('change', function() {
        fetch('/c/galeri/checkSlug?title=' + title.value).then(resp => resp.json()).then(data => slug.value = data.slug)
    })

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