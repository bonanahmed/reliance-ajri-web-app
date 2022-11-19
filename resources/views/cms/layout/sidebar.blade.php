<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="/c">
            <span class="align-middle">Reliance</span>
        </a>

        <ul class="sidebar-nav pb-5">
            @can('super')
            <li class="sidebar-header">
                Admin Panel
            </li>
            <li class="sidebar-item {{ Request::is('c/user') ? 'active' : '' }}">
                <a class="sidebar-link" href="/c/user">
                    <i class="align-middle" data-feather="database"></i> <span class="align-middle">Admin Users</span>
                </a>
            </li>
            <li class="sidebar-item {{ Request::is('c/variabel') ? 'active' : '' }}">
                <a class="sidebar-link" href="/c/variabel">
                    <i class="align-middle" data-feather="database"></i> <span class="align-middle">Variabel</span>
                </a>
            </li>

            @endcan
            <li class="sidebar-header">
                Pages
            </li>

            <li class="sidebar-item {{ Request::is('c/about*') ? 'active' : '' }}">
                <a class="sidebar-link" href="/c/about">
                    <i class="align-middle" data-feather="database"></i> <span class="align-middle">About Us</span>
                </a>
            </li>

            <li class="sidebar-item {{ Request::is('c/faq*') ? 'active' : '' }}">
                <a class="sidebar-link" href="/c/faq">
                    <i class="align-middle" data-feather="database"></i> <span class="align-middle">FAQ</span>
                </a>
            </li>

            <li class="sidebar-item {{ Request::is('c/galeri*') ? 'active' : '' }}">
                <a class="sidebar-link" href="/c/galeri">
                    <i class="align-middle" data-feather="database"></i> <span class="align-middle">Galeri</span>
                </a>
            </li>


            <li class="sidebar-item {{ Request::is('c/slider*') ? 'active' : '' }}">
                <a class="sidebar-link" href="/c/slider">
                    <i class="align-middle" data-feather="database"></i> <span class="align-middle">Homepage Slider</span>
                </a>
            </li>

            <li class="sidebar-item {{ Request::is('c/kategori*') ? 'active' : '' }}">
                <a class="sidebar-link" href="/c/kategori">
                    <i class="align-middle" data-feather="database"></i> <span class="align-middle">Kategori News</span>
                </a>
            </li>

            <li class="sidebar-item {{ Request::is('c/mitra*') ? 'active' : '' }}">
                <a class="sidebar-link" href="/c/mitra">
                    <i class="align-middle" data-feather="database"></i> <span class="align-middle">Mitra</span>
                </a>
            </li>

            <li class="sidebar-item {{ Request::is('c/news*') ? 'active' : '' }}">
                <a class="sidebar-link" href="/c/news">
                    <i class="align-middle" data-feather="database"></i> <span class="align-middle">News</span>
                </a>
            </li>
            <li class="sidebar-item {{ Request::is('c/prosedur') ? 'active' : '' }}">
                <a class="sidebar-link" href="/c/prosedur">
                    <i class="align-middle" data-feather="database"></i> <span class="align-middle">Prosedur Klaim</span>
                </a>
            </li>
            <li class="sidebar-item {{ Request::is('c/produk/individu/top') ? 'active' : '' }}">
                <a class="sidebar-link" href="/c/produk/individu/top">
                    <i class="align-middle" data-feather="database"></i> <span class="align-middle">Produk Section Top</span>
                </a>
            </li>
            <li class="sidebar-item {{ Request::is('c/produk/individu/bot') ? 'active' : '' }}">
                <a class="sidebar-link" href="/c/produk/individu/bot">
                    <i class="align-middle" data-feather="database"></i> <span class="align-middle">Produk Section Bottom</span>
                </a>
            </li>
            <li class="sidebar-item {{ Request::is('c/produk/individu/table') ? 'active' : '' }}">
                <a class="sidebar-link" href="/c/produk/individu/table">
                    <i class="align-middle" data-feather="database"></i> <span class="align-middle">Produk Individu Table</span>
                </a>
            </li>
            <li class="sidebar-item {{ Request::is('c/produk/individu/diagram') ? 'active' : '' }}">
                <a class="sidebar-link" href="/c/produk/individu/diagram">
                    <i class="align-middle" data-feather="database"></i> <span class="align-middle">Produk Individu Diagram</span>
                </a>
            </li>
            <li class="sidebar-item {{ Request::is('c/produk/individu/syarat') ? 'active' : '' }}">
                <a class="sidebar-link" href="/c/produk/individu/syarat">
                    <i class="align-middle" data-feather="database"></i> <span class="align-middle">Syarat Kepesertaan</span>
                </a>
            </li>
            <li class="sidebar-item {{ Request::is('c/produk/kumpulan') ? 'active' : '' }}">
                <a class="sidebar-link" href="/c/produk/kumpulan">
                    <i class="align-middle" data-feather="database"></i> <span class="align-middle">Produk Kumpulan</span>
                </a>
            </li>

            <li class="sidebar-header">
                Form Web
            </li>

            <li class="sidebar-item {{ Request::is('c/request*') ? 'active' : '' }}">
                <a class="sidebar-link" href="/c/request">
                    <i class="align-middle" data-feather="database"></i> <span class="align-middle">Request</span>
                </a>
            </li>


        </ul>
    </div>
</nav>