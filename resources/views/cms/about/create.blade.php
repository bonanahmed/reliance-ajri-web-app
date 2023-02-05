@extends('cms.layout.main')
@section('container')
<style>

</style>
<main class="content">
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3">Create News</h1>

        <div class="col-lg-8">
            <form action="/c/about" method="post" enctype="multipart/form-data">
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
                    <label for="type" class="form-label">Type Post</label>
                    <select class="form-select" aria-label="type" name="type">
                        <option value="paragraf">Paragraf</option>
                        <option value="accordion">Accordion</option>
                    </select>
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
                    <label for="alt" class="form-label">Alt Image</label>
                    <input value="{{ old('alt')}}" name="alt" type="text" class="form-control @error('alt') is-invalid @enderror" id="alt" aria-describedby="alt">
                    @error('alt')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="title" class="form-label">Body</label>
                    <textarea class="form-control" id="editor" name="body"></textarea>
                    @error('body')
                    <p class="text-danger">
                        {{ $message }}
                    </p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="meta_keywords" class="form-label">Keywords</label>
                    <input data-role="tagsinput" value="{{ old('meta_keywords')}}" name="meta_keywords" type="text" class="form-control @error('meta_keywords') is-invalid @enderror multi-tag" id="meta_keywords" aria-describedby="meta_keywords">
                    @error('meta_keywords')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="file" class="form-label">Attachment</label>
                    <input name="file[]" type="file" class="form-control @error('file') is-invalid @enderror" id="file" aria-describedby="file" multiple="true">
                    @error('file')
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
    const title = document.querySelector('#title')
    const slug = document.querySelector('#slug')
    title.addEventListener('change', function() {
        fetch('/c/about/checkSlug?title=' + title.value).then(resp => resp.json()).then(data => slug.value = data.slug)
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