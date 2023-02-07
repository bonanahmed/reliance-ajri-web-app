@extends('cms.layout.main')
@section('container')
<style>

</style>
<main class="content">
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3">Create Laporan Keuangan</h1>

        <div class="col-lg-8">
            <form action="/c/keuangan" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input required name="title" value="{{ old('title')}}" type="text" class="form-control @error('title') is-invalid @enderror" id="title" aria-describedby="title">
                    @error('title')
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
                <!-- <button type="button" class="btn btn-success mb-3" id="addFieldBtn">Tambah Link</button> -->

                <div id="additionalFields"></div>
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
    $(document).ready(function() {
        $("#addFieldBtn").click(function() {
            var newField = '<div class="input-group mb-3">' +
                '<input name="link_names[]" type="text" class="form-control" placeholder="Link Name" aria-label="Link name" aria-describedby="button-addon2">' +
                '<textarea placeholder="URL" name="links[]" class="form-control"></textarea>' +
                '<button class="btn btn-danger removeFieldBtn" type="button" id="button-addon2">Remove Link</button></div>';
            $("#additionalFields").append(newField);
        });

        $("#additionalFields").on("click", ".removeFieldBtn", function() {
            $(this).parent().remove();
        });
    });
</script>

@endsection