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
        <h1 class="h3 mb-3">Prosedur Klaim Editor</h1>

        <div class="col-lg-8">
            <form action="/c/prosedur" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="value" class="form-label">Title</label>
                    <input name="value" value="{{ old('value',$variabel->prosedur_klaim->value ?? '')}}" type="text" class="form-control @error('value') is-invalid @enderror" id="value" aria-describedby="value">
                    @error('value')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    @if(isset($variabel->prosedur_klaim->image))
                    <img src="{{ asset('storage/'.$variabel->prosedur_klaim->image) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
                    <input type="hidden" name="oldImage" value="{{$variabel->prosedur_klaim->image}}">
                    <input type="submit" name="image_destroy" class="btn btn-danger mb-3" value="Remove Image">
                    @endif
                    <img class="img-preview img-fluid mb-3 col-sm-5">
                    <input @if(!$variabel->prosedur_klaim->image) required @endif name="image" id="image" class="form-control @error('image') is-invalid @enderror" type="file" onchange="previewImage()">
                    @error('image')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="content" class="form-label">Body</label>
                    <textarea class="form-control" id="editor" name="content">{!! $variabel->prosedur_klaim->content ?? '' !!}</textarea>
                    <!-- <input id="content" type="hidden" name="content" value="{{ old('content',$variabel->prosedur_klaim->content ?? '') }}"> -->
                    @error('content')
                    <p class="text-danger">
                        {{ $message }}
                    </p>
                    @enderror
                    <!-- <trix-editor input="content"></trix-editor> -->
                </div>

                <button type="submit" class="btn btn-primary">Save</button>
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