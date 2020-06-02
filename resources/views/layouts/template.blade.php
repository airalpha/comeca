<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>COMECA</title>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('template/img/core-img/favicon.ico') }}">

    <link rel="stylesheet" href="/css/app.css">
    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="{{ asset("template/style.css") }}">

    <style>
        /**
         * The CSS shown here will not be introduced in the Quickstart guide, but shows
         * how you can use CSS to style your Element's container.
         */
        .StripeElement {
            width: 100%;
            height: 46px;
            border: 1px solid #ebebeb;
            background-color: #f5f5f5;
            font-size: 14px;

            box-sizing: border-box;

            padding: 10px 12px;
            -webkit-transition: box-shadow 150ms ease;
            transition: box-shadow 150ms ease;
        }

        .StripeElement--focus {
            box-shadow: 0 1px 3px 0 #cfd7df;
        }

        .StripeElement--invalid {
            border-color: #fa755a;
        }

        .StripeElement--webkit-autofill {
            background-color: #fefde5 !important;
        }

        #card-errors {
            color: #fa755a;
        }
    </style>

    @yield('extra-script')

</head>

<body>

<!-- Preloader -->
<div class="preloader d-flex align-items-center justify-content-center">
    <div class="preloader-circle"></div>
    <div class="preloader-img">
        <img src="{{ asset("template/img/core-img/leaf.png") }}" alt="">
    </div>
</div>

<!-- ##### Header Area Start ##### -->
<header class="header-area">

    <!-- ***** Top Header Area ***** -->
    <div class="top-header-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="top-header-content d-flex align-items-center justify-content-between">
                        <!-- Top Header Content -->
                        <div class="top-header-meta">
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="infodeercreative@gmail.com"><i class="fa fa-envelope-o" aria-hidden="true"></i> <span>Email: comeca@gmail.com</span></a>
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="+1 234 122 122"><i class="fa fa-phone" aria-hidden="true"></i> <span>Tel: +237 697 456 833</span></a>
                        </div>

                        <!-- Top Header Content -->
                        <div class="top-header-meta d-flex">
                            <!-- Language Dropdown -->
                            <div class="language-dropdown">
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle mr-30" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Language</button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#">Francais</a>
                                        <a class="dropdown-item" href="#">USA</a>
                                    </div>
                                </div>
                            </div>
                            <!-- Login -->
                            <div class="login">
                                <a href="{{ route('login') }}"><i class="fa fa-user" aria-hidden="true"></i> <span>Login</span></a>
                            </div>
                            <!-- Cart -->
                            <div class="cart">
                                <a href="{{ route('cart.view') }}"><i class="fa fa-shopping-cart" aria-hidden="true"></i> <span>Cart <span class="cart-quantity">({{ Cart::count() }})</span></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ***** Navbar Area ***** -->
    <div class="alazea-main-menu">
        <div class="classy-nav-container breakpoint-off">
            <div class="container">
                <!-- Menu -->
                <nav class="classy-navbar justify-content-between" id="alazeaNav">

                    <!-- Nav Brand -->
                    <a href="/" class="nav-brand"><img src="{{ asset("template/img/core-img/comeca.png") }}" alt=""></a>

                    <!-- Navbar Toggler -->
                    <div class="classy-navbar-toggler">
                        <span class="navbarToggler"><span></span><span></span><span></span></span>
                    </div>

                    <!-- Menu -->
                    <div class="classy-menu">

                        <!-- Close Button -->
                        <div class="classycloseIcon">
                            <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                        </div>

                        <!-- Navbar Start -->
                        <div class="classynav">
                            <ul>
                                <li><a href="/"><i class="fa fa-home"></i> &nbsp; Home</a></li>
                                <li><a href="{{ route('about') }}"><i class="fa fa-info"></i> &nbsp; Apropos</a></li>
                                <li><a href="{{ route('shop') }}"><i class="fa fa-shopping-bag"></i> &nbsp; Boutique</a></li>
                                <li><a href="{{ route('producers') }}"><i class="fa fa-users"></i> &nbsp; Producteurs</a></li>
                                <li><a href="{{ route('contact') }}"><i class="fa fa-address-book"></i>&nbsp; Contact</a></li>
                                <!-- <li><a href="route('cart.index')"><i class="fa fa-shopping-cart"></i> &nbsp; <span class="cart-quantity">{{ Cart::count() }}</span></a></li> -->
                            </ul>
                            <!-- Search Icon -->
                            <div id="searchIcon">
                                <i class="fa fa-search" aria-hidden="true"></i>
                            </div>

                        </div>
                        <!-- Navbar End -->
                    </div>
                </nav>

                <!-- Search Form -->
                <div class="search-form">
                    <form action="#" method="get">
                        <input type="search" name="search" id="search" placeholder="Type keywords &amp; press enter...">
                        <button type="submit" class="d-none"></button>
                    </form>
                    <!-- Close Icon -->
                    <div class="closeIcon"><i class="fa fa-times" aria-hidden="true"></i></div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- ##### Header Area End ##### -->

<div id="app">
    @yield('content')
    <vue-progress-bar></vue-progress-bar>
</div>
<!-- ##### Footer Area Start ##### -->
<footer class="footer-area bg-img" style="background-image: url({{ asset("template/img/bg-img/3.jpg") }});">
    <!-- Main Footer Area -->
    <div class="main-footer-area">
        <div class="container">
            <div class="row">

                <!-- Single Footer Widget -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-footer-widget">
                        <div class="footer-logo mb-30">
                            <a href="#"><img src="{{ asset("template/img/core-img/leaf.png") }}" alt="" width="50" height="50"></a>
                        </div>
                        <p>Comeca, plateforme pour connecter les producteurs et consomatteur de PFNL</p>
                        <div class="social-info">
                            <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Single Footer Widget -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-footer-widget">
                        <div class="widget-title">
                            <h5>LIENS RAPIDES</h5>
                        </div>
                        <nav class="widget-nav">
                            <ul>
                                <li><a href="{{ route('producers') }}">Producteurs</a></li>
                                <li><a href="{{ route('shop') }}">Boutique</a></li>
                                <li><a href="/contact">Contact</a></li>
                                <li><a href="{{ route('about') }}">L'equipe</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>

                <!-- Single Footer Widget -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-footer-widget">
                        <div class="widget-title">
                            <h5>MEILLEURS VENTES</h5>
                        </div>

                        <!-- Single Best Seller Products -->
                        <div class="single-best-seller-product d-flex align-items-center">
                            <div class="product-thumbnail">
                                <a href="{{ route('shop-detail', ['slug' => $latestProduct->slug]) }}">
                                    <img src="{{ $latestProduct->images->first()->path }}" alt="">
                                </a>
                            </div>
                            <div class="product-info">
                                <a href="{{ route('shop-detail', ['slug' => $latestProduct->slug]) }}">{{ $latestProduct->name }}</a>
                                <p>{{ $latestProduct->price }} FCFA</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Single Footer Widget -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-footer-widget">
                        <div class="widget-title">
                            <h5>CONTACT</h5>
                        </div>

                        <div class="contact-information">
                            <p><span>Address:</span> Bandjoun, Dja</p>
                            <p><span>Phone:</span> +237 697 456 833</p>
                            <p><span>Email:</span> comeca@gmail.com</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer Bottom Area -->
    <div class="footer-bottom-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="border-line"></div>
                </div>
                <!-- Copywrite Text -->
                <div class="col-12 col-md-6">
                    <div class="copywrite-text">
                        <p>&copy; <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="" target="_blank">Comeca</a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </p>
                    </div>
                </div>
                <!-- Footer Nav -->
                <div class="col-12 col-md-6">
                    <div class="footer-nav">
                        <nav>
                            <ul>
                                <li><a href="#">Accueil</a></li>
                                <li><a href="{{ route('about') }}">Apropos</a></li>
                                <li><a href="{{ route('shop') }}">Boutique</a></li>
                                <li><a href="{{ route('producers') }}">Producteurs</a></li>
                                <li><a href="/contact">Contact</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- ##### Footer Area End ##### -->

@routes
<script src="/js/app.js"></script>
<!-- ##### All Javascript Files ##### -->
<!-- jQuery-2.2.4 js -->
<script src="{{ asset("template/js/jquery/jquery-2.2.4.min.js") }}"></script>
<!-- Popper js -->
<script src="{{ asset("template/js/bootstrap/popper.min.js") }}"></script>
<!-- Bootstrap js -->
<script src=" {{ asset("template/js/bootstrap/bootstrap.min.js") }}"></script>
<!-- All Plugins js -->
<script src="{{ asset("template/js/plugins/plugins.js") }}"></script>
<!-- Active js -->
<script src="{{ asset("template/js/active.js") }}"></script>
@yield('extra-js')
</body>
<script>
    @if(session()->has('success'))
    Swal.fire(
        "Merci !",
        "{{ session()->get('success') }}",
        "success"
    );
    @endif
    @if(session()->has('error'))
    Swal.fire(
        "Oups !",
        "{{ session()->get('error') }}",
        "error"
    );
    @endif
</script>
</html>
