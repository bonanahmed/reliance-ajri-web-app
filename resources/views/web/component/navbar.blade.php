<div class="container-fluid">
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <div class="container">
        <a class="navbar-brand" href="/">
            @if(!isset(Request::get('variabel')->navbar_logo->image))
            <img src="{{ asset('assets/img/logo-1.png') }}" alt="" height="30">
            @else
            <img src="{{ asset('storage/'.Request::get('variabel')->navbar_logo->image) }}" alt="Reliance Logo" height="30">
            @endif
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0 navbar-custom">
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
                    <a class="nav-link {{ Request::is('klaim/*') ? 'active' : '' }}" href="/klaim/prosedur">Klaim</a>
                </li>
                <li class="nav-item mx-3">
                    <a class="nav-link {{ Request::is('galeri*') ? 'active' : '' }}" href="/galeri">Gallery</a>
                </li>
                <li class="nav-item mx-3">
                    <a class="nav-link {{ Request::is('news*') ? 'active' : '' }}" href="/news">Berita</a>
                </li>
            </ul>
            <!-- <form class="d-flex justify-content-center" style="margin-bottom: 0px;margin-right:7px">
                <div class="input-group rounded">
                    <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                    <span class="input-group-text border-0" id="search-addon">
                        <i class="fas fa-search"></i>
                    </span>
                </div>
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">

            </form> -->
            <button class="btn btn-blue px-3" type="submit">Login/Claim</button>
        </div>
    </div>
</nav>
</div>


<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel" style="max-width:300px">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasExampleLabel">Offcanvas</h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <div>
      Some text as placeholder. In real life you can have the elements you have chosen. Like, text, images, lists, etc.
    </div>
    <div class="dropdown mt-3">
      <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown">
        Dropdown button
      </button>
      <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <li><a class="dropdown-item" href="#">Action</a></li>
        <li><a class="dropdown-item" href="#">Another action</a></li>
        <li><a class="dropdown-item" href="#">Something else here</a></li>
      </ul>
    </div>
  </div>
</div>