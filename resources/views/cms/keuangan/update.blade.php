@extends('cms.layout.main')
@section('container')
<style>

</style>
<main class="content">
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3">Update Laporan Keuangan</h1>

        <div class="col-lg-8">
            <form action="/c/keuangan/{{ $keuangan->id }}" method="post" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input required name="title" value="{{ old('title',$keuangan->title)}}" type="text" class="form-control @error('title') is-invalid @enderror" id="title" aria-describedby="title">
                    @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="title" class="form-label">Body</label>
                    <textarea class="form-control" id="editor" name="body">{{ $keuangan->body }}</textarea>
                    @error('body')
                    <p class="text-danger">
                        {{ $message }}
                    </p>
                    @enderror
                </div>
                <!-- <div class="mb-3">
                    <label for="title" class="form-label">Link</label>
                    <input name="link_names[]" type="text" class="form-control" id="title" aria-describedby="title">
                    <input name="links[]" type="text" class="form-control" id="title" aria-describedby="title">
                </div> -->
                <button type="button" class="btn btn-success mb-3" id="addFieldBtn">Tambah Link</button>
                <!-- <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2">
                    <textarea class="form-control"></textarea>
                    <button class="btn btn-danger" type="button" id="button-addon2">Button</button>
                </div> -->

                <div id="additionalFields">
                    @foreach($keuangan->link as $link)
                    <div class="input-group mb-3">
                        <input value="{{ $link->name }}" name="link_names[]" type="text" class="form-control" placeholder="Link Name" aria-label="Link name" aria-describedby="button-addon2">
                        <textarea placeholder="URL" name="links[]" class="form-control">{{ $link->link }}</textarea>
                        <button class="btn btn-danger removeFieldBtn" type="button" id="button-addon2">Remove Link</button>
                    </div>
                    @endforeach
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
                <button type="submit" class="btn btn-primary">Save Change</button>
            </form>
        </div>
        @if($keuangan->files->count() > 0)
        <div class="container">
            <div class="row">
                <table class="table">
                    <thead>
                        <th>Filename</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach($keuangan->files as $file)
                        <tr>
                            <td><a href="{{ asset('storage/'.$file->file) }}" target="_blank">{{ $file->file }}</a></td>
                            <td>
                                <form action="/c/file_keuangan/{{$file->id}}/delete" class="d-inline" method="post">
                                    @method('delete')
                                    @csrf
                                    <button class="badge bg-danger border-0 button-submit"><span data-feather="trash-2"></span></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @endif
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