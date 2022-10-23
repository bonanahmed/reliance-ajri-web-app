@extends('cms.layout.main')
@section('container')

<main class="content">
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3">Update Slider Content</h1>

        <div class="col-lg-8">
            <form action="/c/slider/{{ $slider->id }}" method="post" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input name="title" value="{{ old('title',$slider->title)}}" type="text" class="form-control @error('title') is-invalid @enderror" id="title" aria-describedby="title">
                    @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <input id="description" type="hidden" name="description" value="{{ old('description',$slider->description) }}">
                    @error('description')
                    <p class="text-danger">
                        {{ $message }}
                    </p>
                    @enderror
                    <trix-editor input="description"></trix-editor>
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="hidden" name="oldImage" value="{{ $slider->image }}">
                    @if($slider->image)
                    <img src="{{ asset('storage/'.$slider->image) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
                    @endif
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
                    <input name="button" value="{{ old('button',$slider->button)}}" type="text" class="form-control @error('button') is-invalid @enderror" id="button" aria-describedby="button">
                    @error('button')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="button_link" class="form-label">Button Link</label>
                    <input placeholder="http://example.com" name="button_link" value="{{ old('button_link',$slider->button_link)}}" type="text" class="form-control @error('button_link') is-invalid @enderror" id="button_link" aria-describedby="button_link">
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