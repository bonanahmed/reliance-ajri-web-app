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
        <div class="row">
            @foreach($galeri->images as $image)
            <div class="col-md-2">
                <!-- <img src="{{ asset('storage/'.$image->image) }}" class="img-thumbnail" style="margin:5px;width: 200px; /* You can set the dimensions to whatever you want */
    height: 200px;
    object-fit: contain;" alt=""> -->
                <div class="image-area">
                    <!-- <img src="{{ asset('storage/'.$image->image) }}" class="img-thumbnail" alt="Preview">
                    <a class="remove-image" href="#" style="display: inline;">&#215;</a> -->

                    <a href="{{ asset('storage/'.$image->image) }}" target="_blank">
                        <img src="{{ asset('storage/'.$image->image) }}" class="img-thumbnail" alt="Preview">
                    </a>
                    <!-- <img src="{{ asset('storage/'.$image->image) }}" class="img-thumbnail" alt="Preview"> -->


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