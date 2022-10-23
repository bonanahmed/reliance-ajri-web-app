<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="/c">
            <span class="align-middle">Reliance</span>
        </a>

        <ul class="sidebar-nav">
            @can('super')
            <li class="sidebar-header">
                Admin Panel
            </li>
            <li class="sidebar-item {{ Request::is('c/variabel') ? 'active' : '' }}">
                <a class="sidebar-link" href="/c/variabel">
                    <i class="align-middle" data-feather="database"></i> <span class="align-middle">Variabel</span>
                </a>
            </li>
            <li class="sidebar-item {{ Request::is('c/user') ? 'active' : '' }}">
                <a class="sidebar-link" href="/c/user">
                    <i class="align-middle" data-feather="database"></i> <span class="align-middle">Admin Users</span>
                </a>
            </li>
            @endcan
            <li class="sidebar-header">
                Pages
            </li>

            <li class="sidebar-item {{ Request::is('dashboard') ? 'active' : '' }}">
                <a class="sidebar-link" href="/c">
                    <i class="align-middle" data-feather="sidebar"></i> <span class="align-middle">Dashboard</span>
                </a>
            </li>

            <li class="sidebar-item {{ Request::is('c/slider') ? 'active' : '' }}">
                <a class="sidebar-link" href="/c/slider">
                    <i class="align-middle" data-feather="database"></i> <span class="align-middle">Homepage Slider</span>
                </a>
            </li>

            <li class="sidebar-item {{ Request::is('c/kategori') ? 'active' : '' }}">
                <a class="sidebar-link" href="/c/kategori">
                    <i class="align-middle" data-feather="database"></i> <span class="align-middle">Kategori News</span>
                </a>
            </li>

            <li class="sidebar-item {{ Request::is('c/news') ? 'active' : '' }}">
                <a class="sidebar-link" href="/c/news">
                    <i class="align-middle" data-feather="database"></i> <span class="align-middle">News</span>
                </a>
            </li>

            <li class="sidebar-item {{ Request::is('c/about') ? 'active' : '' }}">
                <a class="sidebar-link" href="/c/about">
                    <i class="align-middle" data-feather="database"></i> <span class="align-middle">About Us</span>
                </a>
            </li>

            <li class="sidebar-item {{ Request::is('c/mitra') ? 'active' : '' }}">
                <a class="sidebar-link" href="/c/mitra">
                    <i class="align-middle" data-feather="database"></i> <span class="align-middle">Mitra</span>
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
            <li class="sidebar-item {{ Request::is('c/produk/kumpulan') ? 'active' : '' }}">
                <a class="sidebar-link" href="/c/produk/kumpulan">
                    <i class="align-middle" data-feather="database"></i> <span class="align-middle">Produk Kumpulan</span>
                </a>
            </li>
            <li class="sidebar-item {{ Request::is('c/galeri') ? 'active' : '' }}">
                <a class="sidebar-link" href="/c/galeri">
                    <i class="align-middle" data-feather="database"></i> <span class="align-middle">Galeri</span>
                </a>
            </li>

            <!-- 
            <li class="sidebar-item">
                <a class="sidebar-link" href="pages-sign-in.html">
                    <i class="align-middle" data-feather="log-in"></i> <span class="align-middle">Sign In</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="pages-sign-up.html">
                    <i class="align-middle" data-feather="user-plus"></i> <span class="align-middle">Sign Up</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="pages-blank.html">
                    <i class="align-middle" data-feather="book"></i> <span class="align-middle">Blank</span>
                </a>
            </li>

            <li class="sidebar-header">
                Tools & Components
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="ui-buttons.html">
                    <i class="align-middle" data-feather="square"></i> <span class="align-middle">Buttons</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="ui-forms.html">
                    <i class="align-middle" data-feather="check-square"></i> <span class="align-middle">Forms</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="ui-cards.html">
                    <i class="align-middle" data-feather="grid"></i> <span class="align-middle">Cards</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="ui-typography.html">
                    <i class="align-middle" data-feather="align-left"></i> <span class="align-middle">Typography</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="icons-feather.html">
                    <i class="align-middle" data-feather="coffee"></i> <span class="align-middle">Icons</span>
                </a>
            </li>

            <li class="sidebar-header">
                Plugins & Addons
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="charts-chartjs.html">
                    <i class="align-middle" data-feather="bar-chart-2"></i> <span class="align-middle">Charts</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="maps-google.html">
                    <i class="align-middle" data-feather="map"></i> <span class="align-middle">Maps</span>
                </a>
            </li> -->
        </ul>
    </div>
</nav>