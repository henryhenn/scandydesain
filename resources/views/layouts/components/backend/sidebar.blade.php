<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{route('dashboard')}}" class="app-brand-link">
            <span class="app-brand-text demo menu-text fw-bolder ms-2">Scandy Desain</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        @role('Admin')
        <li class="menu-item {{request()->routeIs('dashboard')? 'active' : ''}}">
            <a href="{{route('dashboard')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>

        <!-- Layouts -->
        <li class="menu-item {{request()->routeIs('produk.*') ? 'active' : ''}}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-layout"></i>
                <div data-i18n="Layouts">Produk</div>
            </a>

            <ul class="menu-sub">
                <li class="menu-item {{request()->routeIs('produk.create') ? 'active' : ''}}">
                    <a href="{{route('produk.create')}}" class="menu-link">
                        <div data-i18n="Without menu">Tambah Produk Baru</div>
                    </a>
                </li>
                <li class="menu-item {{request()->routeIs('produk.index') ? 'active' : ''}}">
                    <a href="{{route('produk.index')}}" class="menu-link">
                        <div data-i18n="Without navbar">Daftar Semua Produk</div>
                    </a>
                </li>
            </ul>
        </li>

        <li class="menu-item {{request()->routeIs('produk-review.*')? 'active' : ''}}">
            <a href="{{route('produk-review.index')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-star"></i>
                <div data-i18n="Analytics">Review Produk</div>
            </a>
        </li>

        <li class="menu-item {{request()->routeIs('orders.*')? 'active' : ''}}">
            <a href="{{route('orders.index')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-dollar"></i>
                <div data-i18n="Analytics">List Order Produk</div>
            </a>
        </li>
        @endrole

        <li class="menu-item {{request()->routeIs('profile*')? 'active' : ''}}">
            <a href="{{route('profile')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user"></i>
                <div data-i18n="Analytics">Profil Saya</div>
            </a>
        </li>

        @role('User')
        <li class="menu-item">
            <a href="{{route('profile')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-dollar"></i>
                <div data-i18n="Analytics">Order Saya</div>
            </a>
        </li>

        <li class="menu-item">
            <a class="menu-link" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <i class="bx bx-power-off me-2"></i>
                <span class="align-middle">Log Out</span>
            </a>
        </li>
        @endrole
    </ul>
</aside>
