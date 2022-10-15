@extends('cms.layout.main')
@section('container')

<main class="content">
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3">Create Produk</h1>

        <div class="col-lg-8">
            <form action="/c/produk" method="post" enctype="multipart/form-data">
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
<script>
    const title = document.querySelector('#title')
    const slug = document.querySelector('#slug')
    title.addEventListener('change', function() {
        fetch('/c/produk/checkSlug?title=' + title.value).then(resp => resp.json()).then(data => slug.value = data.slug)
    })

    // const attachment = new Trix.Attachment({
    //     content: '<iframe width="560" height="315" src="https://www.youtube.com/embed/_UbDeqPdUek" frameborder="0" allowfullscreen></iframe>'
    // });
    // document.querySelector('trix-editor').editor.insertAttachment(attachment);

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