@extends('cms.layout.main')
@section('container')

<main class="content">
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3">Create Produk</h1>

        <div class="col-lg-8">
            <form action="/c/produk/individu" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Title Section Top</label>
                    <input name="produk_title_sec1" value="{{ old('produk_title_sec1',$variabel->produk_title_sec1->value ?? '')}}" type="text" class="form-control @error('produk_title_sec1') is-invalid @enderror" id="produk_title_sec1" aria-describedby="produk_title_sec1">
                    @error('produk_title_sec1')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="title" class="form-label">Description Section Top</label>
                    <input id="produk_desc_sec1" type="hidden" name="produk_desc_sec1" value="{{ old('produk_desc_sec1',$variabel->produk_desc_sec1->content ?? '') }}">
                    @error('produk_desc_sec1')
                    <p class="text-danger">
                        {{ $message }}
                    </p>
                    @enderror
                    <trix-editor input="produk_desc_sec1"></trix-editor>
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
                    <label for="title" class="form-label">Title Section Bottom</label>
                    <input name="produk_title_sec2" value="{{ old('produk_title_sec2')}}" type="text" class="form-control @error('produk_title_sec2') is-invalid @enderror" id="produk_title_sec2" aria-describedby="produk_title_sec2">
                    @error('produk_title_sec2')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="title" class="form-label">Description Section Bottom</label>
                    <input id="produk_desc_sec2" type="hidden" name="produk_desc_sec2" value="{{ old('produk_desc_sec2') }}">
                    @error('produk_desc_sec2')
                    <p class="text-danger">
                        {{ $message }}
                    </p>
                    @enderror
                    <trix-editor input="produk_desc_sec2"></trix-editor>
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