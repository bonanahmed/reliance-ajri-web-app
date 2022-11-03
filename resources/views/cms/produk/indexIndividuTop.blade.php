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
                    <!-- <div class="row p-3 rounded" style="background-color:#f5cbd0 ;">
                    A simple primary alert—check it out!
                </div> -->
                </div>
            </div>
        </div>
        <h1 class="h3 mb-3">Produk Top Content</h1>

        <div class="col-lg-8">
            <form action="/c/produk/individu/top" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="value" class="form-label">Title Section Top</label>
                    <input name="value" value="{{ old('value',$variabel->produk_individu_sec1->value ?? '')}}" type="text" class="form-control @error('value') is-invalid @enderror" id="value" aria-describedby="value">
                    @error('value')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="content" class="form-label">Description Section Top</label>
                    <input id="content" type="hidden" name="content" value="{{ old('content',$variabel->produk_individu_sec1->content ?? '') }}">
                    @error('content')
                    <p class="text-danger">
                        {{ $message }}
                    </p>
                    @enderror
                    <trix-editor input="content" class="trix-background"></trix-editor>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    @if(isset($variabel->produk_individu_sec1->image))
                    <img src="{{ asset('storage/'.$variabel->produk_individu_sec1->image) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
                    @endif
                    <img class="img-preview img-fluid mb-3 col-sm-5">
                    <input name="image" id="image" class="form-control @error('image') is-invalid @enderror" type="file" onchange="previewImage()">
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