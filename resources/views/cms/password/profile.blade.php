@extends('cms.layout.main')
@section('container')

<main class="content">
    <div class="container-fluid p-0">
        @if(session()->has('success'))
        <div class="row p-3 rounded" style="background-color:#cbf5d9 ;">
            {{ session('success') }}
        </div>
        @endif
        @if(session()->has('error'))
        <div class="row p-3 rounded" style="background-color:#f09eac ;">
            {{ session('error') }}
        </div>
        @endif
        <h1 class="h3 mb-3">Profile</h1>

        <div class="col-lg-8">
            <form action="/c/user/profile" method="post" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input name="name" value="{{ old('name',$user->name)}}" type="text" class="form-control @error('name') is-invalid @enderror" id="name" aria-describedby="name">
                    @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input name="email" value="{{ old('email',$user->email)}}" type="text" class="form-control @error('email') is-invalid @enderror" id="email" aria-describedby="email">
                    @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="old_password" class="form-label">Old Password</label>
                    <input name="password" type="password" class="form-control @error('old_password') is-invalid @enderror" id="old_password" aria-describedby="old_password">
                    @error('old_password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="new_password" class="form-label">New Password</label>
                    <input name="new_password" type="new_password" class="form-control @error('new_password') is-invalid @enderror" id="new_password" aria-describedby="new_password">
                    @error('new_password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="new_password_confirmation" class="form-label">Re-type New Password</label>
                    <input name="new_password_confirmation" type="password" class="form-control @error('new_password_confirmation') is-invalid @enderror" id="new_password_confirmation" aria-describedby="new_password_confirmation">
                    @error('new_password_confirmation')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Update Profile</button>
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