<!-- /*
* Template Name: Property
* Template Author: Untree.co
* Template URI: https://untree.co/
* License: https://creativecommons.org/licenses/by/3.0/
*/ -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="author" content="Untree.co"/>
    <link rel="shortcut icon" href="{{asset('template/frontend/favicon.png')}}"/>

    <meta name="description" content=""/>
    <meta name="keywords" content="desain, design, scandydesain"/>

    <link rel="preconnect" href="https://fonts.googleapis.com"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
    <link
        href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;500;600;700&display=swap"
        rel="stylesheet"
    />

    <link rel="stylesheet" href="{{asset('template/frontend/fonts/icomoon/style.css')}}"/>
    <link rel="stylesheet" href="{{asset('template/frontend/fonts/flaticon/font/flaticon.css')}}"/>

    <link rel="stylesheet" href="{{asset('template/frontend/css/tiny-slider.css')}}"/>
    <link rel="stylesheet" href="{{asset('template/frontend/css/aos.css')}}"/>
    <link rel="stylesheet" href="{{asset('template/frontend/css/style.css')}}"/>

    <title>
        @yield('title') | Scandy Desain
    </title>
</head>
<body>
<div class="site-mobile-menu site-navbar-target">
    <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close">
            <span class="icofont-close js-menu-toggle"></span>
        </div>
    </div>
    <div class="site-mobile-menu-body"></div>
</div>

<nav class="site-nav">
    <div class="container">
        <div class="menu-bg-wrap">
            @include('layouts.components.frontend.navbar')
        </div>
    </div>
</nav>

@yield('content')

<div class="site-footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="widget">
                    <h3>Contact</h3>
                    <address>Indonesia</address>
                </div>
                <!-- /.widget -->
            </div>
            <div class="col-lg-4">
                <div class="widget">
                    <h3>Links</h3>
                    <ul class="list-unstyled links">
                        <li><a href="#">Our Vision</a></li>
                        <li><a href="#">About us</a></li>
                        <li><a href="#">Contact us</a></li>
                    </ul>

                    <ul class="list-unstyled social">
                        <li>
                            <a href="#"><span class="icon-instagram"></span></a>
                        </li>
                        <li>
                            <a href="#"><span class="icon-twitter"></span></a>
                        </li>
                        <li>
                            <a href="#"><span class="icon-facebook"></span></a>
                        </li>
                        <li>
                            <a href="#"><span class="icon-linkedin"></span></a>
                        </li>
                        <li>
                            <a href="#"><span class="icon-pinterest"></span></a>
                        </li>
                        <li>
                            <a href="#"><span class="icon-dribbble"></span></a>
                        </li>
                    </ul>
                </div>
                <!-- /.widget -->
            </div>
            <!-- /.col-lg-4 -->
        </div>
        <!-- /.row -->

        <div class="row mt-5">
            <div class="col-12 text-center">
                <!--
                  **==========
                  NOTE:
                  Please don't remove this copyright link unless you buy the license here https://untree.co/license/
                  **==========
                -->

                <p>
                    Copyright &copy;
                    <script>
                        document.write(new Date().getFullYear());
                    </script>
                    . All Rights Reserved.
                    <!-- License information: https://untree.co/license/ -->
                </p>
            </div>
        </div>
    </div>
    <!-- /.container -->
</div>
<!-- /.site-footer -->

<!-- Preloader -->
<div id="overlayer"></div>
<div class="loader">
    <div class="spinner-border" role="status">
        <span class="visually-hidden">Loading...</span>
    </div>
</div>

<div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Konfirmasi</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h6>Apakah Anda Yakin Ingin Logout?</h6>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <form action="{{route('logout')}}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-danger">Yakin</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://kit.fontawesome.com/27ce9fb29a.js" crossorigin="anonymous"></script>

<script src="{{asset('template/frontend/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('template/frontend/js/tiny-slider.js')}}"></script>
<script src="{{asset('template/frontend/js/aos.js')}}"></script>
<script src="{{asset('template/frontend/js/navbar.js')}}"></script>
<script src="{{asset('template/frontend/js/counter.js')}}"></script>
<script src="{{asset('template/frontend/js/custom.js')}}"></script>
</body>
</html>
