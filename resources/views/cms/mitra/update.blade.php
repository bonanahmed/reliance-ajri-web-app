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
        <h1 class="h3 mb-3">Edit Mitra</h1>

        <div class="col-lg-8">
            <form action="/c/mitra/{{ $mitra->id }}" method="post" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input name="name" value="{{ old('name',$mitra->name)}}" type="text" class="form-control @error('name') is-invalid @enderror" id="name" aria-describedby="name">
                    @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Type</label>
                    <select class="form-select" aria-label="type" name="type">
                        <option value="client" {{ $mitra->type == 'client' ? 'selected' : '' }}>Klien</option>
                        <option value="rekanan" {{ $mitra->type == 'rekanan' ? 'selected' : '' }}>Rekanan</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Mitra Logo</label>
                    <input type="hidden" name="oldImage" value="{{ $mitra->image }}">
                    @if($mitra->image)
                    <img src="{{ asset('storage/'.$mitra->image) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
                    @endif
                    <img class="img-preview img-fluid mb-3 col-sm-5">
                    <input @if(!$mitra->image) required @endif name="image" id="image" class="form-control @error('image') is-invalid @enderror" type="file" onchange="previewImage()">
                    @error('image')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="tl" class="form-label">Join Date</label>
                    <input name="tanggal_kerjasama" value="{{ old('tanggal_kerjasama',$mitra->tanggal_kerjasama)}}" type="date" class="form-control @error('tanggal_kerjasama') is-invalid @enderror" id="tl" placeholder="Masukan Tanggal Lahir">
                    @error('tanggal_kerjasama')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <input id="description" type="hidden" name="description" value="{{ old('description',$mitra->description) }}">
                    @error('description')
                    <p class="text-danger">
                        {{ $message }}
                    </p>
                    @enderror
                    <trix-editor input="description" class="trix-background"></trix-editor>
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