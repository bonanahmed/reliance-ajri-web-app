<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
    <meta name="author" content="AdminKit">
    <meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="{{ asset('assets/c/img/icons/icon-48x48.png') }}" />

    <link rel="canonical" href="https://demo-basic.adminkit.io/pages-sign-in.html" />

    <title>Sign In | Reliance </title>

    <link href="{{ asset('assets/c/css/app.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
    <main class="d-flex w-100">
        <div class="container d-flex flex-column">
            <div class="row vh-100">
                <div class="col-sm-10 col-md-6 col-lg-5 mx-auto d-table h-100">
                    <div class="d-table-cell align-middle">

                        <div class="text-center mt-4 mb-4">
                        <img src="{{ asset('assets/img/reliance_logo.png') }}" alt="Reliance Logo"
                        title="Reliance Logo" height="40">
                        </div>

                        @if(session()->has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="aler" aria-label="Close"></button>
                        </div>
                        @endif
                        @if(session()->has('loginError'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('loginError') }}
                            <button type="button" class="btn-close" data-bs-dismiss="aler" aria-label="Close"></button>
                        </div>
                        @endif

                        <div class="card">
                            <div class="card-body">
                                <div class="m-sm-4">
                                    <form action="/c/login" method="post">
                                        @csrf
                                        <div class="mb-3">
                                            <label class="form-label">Email</label>

                                            <input value="{{old('email')}}" class="form-control @error('email') is-invalid @enderror form-control-lg" type="email" name="email" placeholder="Enter your email" autofocus required />
                                            @error('email')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Password</label>
                                            <input class="form-control form-control-lg" type="password" name="password" placeholder="Enter your password" required />

                                        </div>
                                        <div class="text-center mt-3">
                                            <!-- <a href="index.html" class="btn btn-lg btn-primary">Sign in</a> -->
                                            <button type="submit" class="btn btn-lg btn-primary" style="width:100%">Sign in</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="assets/c/js/app.js"></script>

</body>

</html>