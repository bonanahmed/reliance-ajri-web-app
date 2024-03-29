@extends('cms.layout.main')
@section('container')

<main class="content">
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3">Add Mitra</h1>

        <div class="col-lg-8">
            <form action="/c/mitra" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input name="name" value="{{ old('name')}}" type="text" class="form-control @error('name') is-invalid @enderror" id="name" aria-describedby="name">
                    @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Type</label>
                    <select class="form-select" aria-label="type" name="type">
                        <option value="client">Klien</option>
                        <option value="rekanan">Rekanan</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Mitra Logo</label>
                    <img class="img-preview img-fluid mb-3 col-sm-5">
                    <input name="image" id="image" class="form-control @error('image') is-invalid @enderror" type="file" onchange="previewImage()">
                    @error('image')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="join_date" class="form-label">Join Date</label>
                    <input name="tanggal_kerjasama" value="{{ old('tanggal_kerjasama')}}" type="date" class="form-control @error('tanggal_kerjasama') is-invalid @enderror" id="join_date" placeholder="Masukan Tanggal Lahir">
                    @error('tanggal_kerjasama')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="editor" name="description"></textarea>
                    <!-- <input id="description" type="hidden" name="description" value="{{ old('description') }}"> -->
                    @error('description')
                    <p class="text-danger">
                        {{ $message }}
                    </p>
                    @enderror
                    <!-- <trix-editor input="description" class="trix-background"></trix-editor> -->
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>

    </div>
</main>
<script>
    $(document).ready(function() {
        $('#datetimepicker').datepicker({
            viewMode: 'years'
        });
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