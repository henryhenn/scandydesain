<div class="site-navigation">
    <a href="{{route('home')}}" class="logo m-0 float-start">Scandy Desain</a>

    <ul
        class="js-clone-nav d-none d-lg-inline-block text-start site-menu float-end"
    >
        <li class="{{request()->routeIs('home') ? 'active' : ''}}"><a href="{{route('home')}}"><i
                    class="fa-solid fa-house"></i> Home</a></li>

        <li class="{{request()->routeIs('desain.*') ? 'active' : ''}}"><a href="{{route('desain.index')}}"><i
                    class="fa-solid fa-paint-roller"></i> Desain</a></li>

        @auth
            <li><a href="https://api.whatsapp.com/send?phone=628573058692" target="_blank"><i
                        class="fa-brands fa-whatsapp"></i> Contact Us</a></li>
            @role('Admin')
            <li class="{{request()->routeIs('dashboard') ? 'active' : ''}}"><a href="{{route('dashboard')}}"><i
                        class="fa-solid fa-arrow-right-to-bracket"></i> Dashboard</a></li>
            @endrole
            @role('User')
            <li>
                <a href="{{route('profile')}}"><i
                        class="fa-solid fa-user"></i> Profil Saya
                </a>
            </li>
            <li>
                <a href="{{route('wishlist.index')}}" class="{{request()->routeIs('wishlist.*') ? 'active' : ''}}"><i
                        class="fa-solid fa-cart-shopping"></i> Wishlist Saya
                </a>
            </li>
            <li>
                <a href="#logoutModal" data-bs-toggle="modal" data-bs-target="#logoutModal"><i
                        class="fa-solid fa-right-from-bracket"></i> Logout
                </a>
            </li>
            @endrole

        @else
            <li class="{{request()->routeIs('login') ? 'active' : ''}}"><a href="{{route('login')}}"><i
                        class="fa-solid fa-arrow-right-to-bracket"></i> Login</a>
            </li>
        @endauth

        <li class="has-children">
            <a href="">Follow Us</a>
            <ul class="dropdown">
                <li><a href="#">Instagram</a></li>
                <li><a href="#">Facebook</a></li>
            </ul>
        </li>
    </ul>

    <a
        href="#"
        class="burger light me-auto float-end mt-1 site-menu-toggle js-menu-toggle d-inline-block d-lg-none"
        data-toggle="collapse"
        data-target="#main-navbar"
    >
        <span></span>
    </a>
</div>
