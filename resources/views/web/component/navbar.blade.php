<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <div class="container">
        <a class="navbar-brand" href="/">
            @if(!isset(Request::get('variabel')->navbar_logo->image))
            <img src="{{ asset('assets/img/logo-1.png') }}" alt="" height="30">
            @else
            <img src="{{ asset('storage/'.Request::get('variabel')->navbar_logo->image) }}" alt="Reliance Logo" height="30">
            @endif
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                <li class="nav-item mx-1">
                    <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" aria-current="page" href="/">Beranda</a>
                </li>
                <li class="nav-item mx-3">
                    <a class="nav-link {{ Request::is('about/*') ? 'active' : '' }}" href="/about/{{ Request::get('about') ? Request::get('about')->slug : '' }}">Tentang Kami</a>
                </li>
                <li class="nav-item mx-3">
                    <a class="nav-link {{ Request::is('produk/*') ? 'active' : '' }}" href="/produk/kumpulan/{{ Request::get('produk') ? Request::get('produk')->slug : '' }}">Produk</a>
                </li>
                <li class="nav-item mx-3">
                    <a class="nav-link {{ Request::is('mitra/*') ? 'active' : '' }}" href="/mitra/klien">Mitra</a>
                </li>
                <li class="nav-item mx-3">
                    <a class="nav-link" href="#">Klaim</a>
                </li>
                <li class="nav-item mx-3">
                    <a class="nav-link {{ Request::is('galeri/*') ? 'active' : '' }}" href="/galeri">Gallery</a>
                </li>
                <li class="nav-item mx-3">
                    <a class="nav-link {{ Request::is('news/*') ? 'active' : '' }}" href="/news">Berita</a>
                </li>
            </ul>
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>