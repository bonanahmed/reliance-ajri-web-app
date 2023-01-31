@extends('cms.layout.main')
@section('container')

<main class="content">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-12 d-flex">
                <div class="card flex-fill">
                    @if(session()->has('error'))
                    <div class="row p-3 rounded" style="background-color:#cbf5d9 ;">
                        {{ session('error') }}
                    </div>
                    @endif
                </div>
            </div>
        </div>
        <h1 class="h3 mb-3">Edit Banner</h1>

        <div class="col-lg-8">
            <form action="/c/banner/{{ $banner->id }}" method="post" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input name="name" value="{{ old('name',$banner->name)}}" type="text" class="form-control @error('name') is-invalid @enderror" id="name" aria-describedby="name">
                    @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Image Banner</label>
                    <input type="hidden" name="oldImage" value="{{ $banner->image }}">
                    @if($banner->image)
                    <img src="{{ asset('storage/'.$banner->image) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
                    <input type="submit" name="image_destroy" class="btn btn-danger mb-3" value="Remove Image">
                    @endif
                    <img class="img-preview img-fluid mb-3 col-sm-5">
                    <input @if(!$banner->image) required @endif name="image" id="image" class="form-control @error('image') is-invalid @enderror" type="file" onchange="previewImage()">
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