<!doctype html>
<html class="no-js" lang="zxx">

<!-- Mirrored from html.hixstudio.net/shofy-prv/shofy/index-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 24 Oct 2023 16:00:02 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Shofy Shop</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/img/logo/favicon.png')}}">

    <!-- CSS here -->
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/swiper-bundle.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/slick.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/font-awesome-pro.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/flaticon_shofy.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/spacing.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/main.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/register.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/modal.css')}}">

    <!-- CaptCha -->
{{--    <script src="https://www.google.com/recaptcha/api.js" async defer></script>--}}

    <!-- Bao gồm SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">

    <!-- Bao gồm SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <!-- Modal -->
    <!-- Bao gồm Bootstrap CSS và JS -->
{{--    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"></script>--}}
{{--    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>--}}




</head>

<body>
    <!--[if lte IE 9]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
<![endif]-->


    <!-- pre loader area start -->
    <div id="loading">
        <div id="loading-center">
            <div id="loading-center-absolute">
                <!-- loading content here -->
                <div class="tp-preloader-content">
                    <div class="tp-preloader-logo">
                        <div class="tp-preloader-circle">
                            <svg width="190" height="190" viewBox="0 0 380 380" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle stroke="#D9D9D9" cx="190" cy="190" r="180" stroke-width="6" stroke-linecap="round"></circle>
                                <circle stroke="red" cx="190" cy="190" r="180" stroke-width="6" stroke-linecap="round"></circle>
                            </svg>
                        </div>
                        <img src="{{asset('assets/img/logo/preloader/preloader-icon.svg')}}" alt="">
                    </div>
                    <h4 class="tp-preloader-title">Shofy Shop</h4>
                    <!-- <p class="tp-preloader-subtitle">Loading</p> -->
                </div>
            </div>
        </div>
    </div>
    <!-- pre loader area end -->

    <!-- back to top start -->
    <div class="back-to-top-wrapper">
        <button id="back_to_top" type="button" class="back-to-top-btn">
            <svg width="12" height="7" viewBox="0 0 12 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M11 6L6 1L1 6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
        </button>
    </div>
    <!-- back to top end -->

    <!-- offcanvas area start -->
    <div class="offcanvas__area offcanvas__style-darkRed">
        <div class="offcanvas__wrapper">
            <div class="offcanvas__close">
                <button class="offcanvas__close-btn offcanvas-close-btn">
                    <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M11 1L1 11" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M1 1L11 11" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>
            </div>
            <div class="offcanvas__content">
                <div class="offcanvas__top mb-70 d-flex justify-content-between align-items-center">
                    <div class="offcanvas__logo logo">
                        <a href="{{ route('homepage') }}">
                            <img src="{{asset('assets/img/logo/logo.svg')}}" alt="logo">
                        </a>
                    </div>
                </div>
                <div class="tp-main-menu-mobile fix mb-40"></div>

                <div class="offcanvas__contact align-items-center d-none">
                    <div class="offcanvas__contact-icon mr-20">
                        <span>
                            <img src="{{asset('assets/img/icon/contact.png')}}" alt="">
                        </span>
                    </div>
                    <div class="offcanvas__contact-content">
                        <h3 class="offcanvas__contact-title">
                            <a href="tel:098-852-987">004524865</a>
                        </h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="body-overlay"></div>
    <!-- offcanvas area end -->

    <!-- mobile menu area start -->
    <div id="tp-bottom-menu-sticky" class="tp-mobile-menu d-lg-none">
        <div class="container">
            <div class="row row-cols-5">
                <div class="col">
                    <div class="tp-mobile-item text-center">
                        <a href="#" class="tp-mobile-item-btn">
                            <i class="flaticon-store"></i>
                            <span>Cửa hàng</span>
                        </a>
                    </div>
                </div>
                <div class="col">
                    <div class="tp-mobile-item text-center">
                        <button class="tp-mobile-item-btn tp-search-open-btn">
                            <i class="flaticon-search-1"></i>
                            <span>Tìm kiếm</span>
                        </button>
                    </div>
                </div>
                <div class="col">
                    <div class="tp-mobile-item text-center">
                        <a href="#" class="tp-mobile-item-btn">
                            <i class="flaticon-love"></i>
                            <span>Wishlist</span>
                        </a>
                    </div>
                </div>
                <div class="col">
                    <div class="tp-mobile-item text-center">
                        <a href="{{ route('profilePage') }}" class="tp-mobile-item-btn">
                            <i class="flaticon-user"></i>
                            <span>Tài khoản</span>
                        </a>
                    </div>
                </div>
                <div class="col">
                    <div class="tp-mobile-item text-center">
                        <button class="tp-mobile-item-btn tp-offcanvas-open-btn">
                            <i class="flaticon-menu-1"></i>
                            <span>Menu</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- mobile menu area end -->


    <!-- search area start -->
    <section class="tp-search-area tp-search-style-secondary">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="tp-search-form">
                        <div class="tp-search-close text-center mb-20">
                            <button class="tp-search-close-btn tp-search-close-btn"></button>
                        </div>
                        <form action="#">
                            <div class="tp-search-input mb-10">
                                <input type="text" placeholder="Tìm kiếm sản phẩm...">
                                <button type="submit"><i class="flaticon-search-1"></i></button>
                            </div>
                            <div class="tp-search-category">
                                <span>Tìm theo: </span>
                                <a href="#">Category 1, </a>
                                <a href="#">Category 2, </a>
                                <a href="#">Category 3, </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- search area end -->

    <!-- header area start -->
    {{--header--}}
    {{View::make('layout/client/header')}}
    <!-- header area end -->

    @yield('content')


    <!-- footer area start -->
    {{View::make('layout/client/footer')}}
    <!-- footer area end -->



    <!-- JS here -->
{{--    <script src="{{asset('assets/js/vendor/jquery.js')}}"></script>--}}
{{--    <script src="{{asset('assets/js/vendor/waypoints.js')}}"></script>--}}
{{--    <script src="{{asset('assets/js/bootstrap-bundle.js')}}"></script>--}}
{{--    <script src="{{asset('assets/js/meanmenu.js')}}"></script>--}}
{{--    <script src="{{asset('assets/js/swiper-bundle.js')}}"></script>--}}
{{--    <script src="{{asset('assets/js/slick.js')}}"></script>--}}
{{--    <script src="{{asset('assets/js/range-slider.js')}}"></script>--}}
{{--    <script src="{{asset('assets/js/magnific-popup.js')}}"></script>--}}
{{--    <script src="{{asset('assets/js/nice-select.js')}}"></script>--}}
{{--    <script src="{{asset('assets/js/purecounter.js')}}"></script>--}}
{{--    <script src="{{asset('assets/js/countdown.js')}}"></script>--}}
{{--    <script src="{{asset('assets/js/wow.js')}}"></script>--}}
{{--    <script src="{{asset('assets/js/isotope-pkgd.js')}}"></script>--}}
{{--    <script src="{{asset('assets/js/imagesloaded-pkgd.js')}}"></script>--}}
{{--    <script src="{{asset('assets/js/ajax-form.js')}}"></script>--}}
{{--    <script src="{{asset('assets/js/main.js')}}"></script>--}}
{{--    <script src="{{asset('assets/js/register.js')}}"></script>--}}
{{--    <script src="{{ asset('js/register.js') }}"></script>--}}
    <!-- JS here -->
    <script src="{{asset('assets/js/vendor/jquery.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{asset('assets/js/vendor/waypoints.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap-bundle.js')}}"></script>
    <script src="{{asset('assets/js/meanmenu.js')}}"></script>
    <script src="{{asset('assets/js/swiper-bundle.js')}}"></script>
    <script src="{{asset('assets/js/slick.js')}}"></script>
    <script src="{{asset('assets/js/range-slider.js')}}"></script>
    <script src="{{asset('assets/js/magnific-popup.js')}}"></script>
    <script src="{{asset('assets/js/nice-select.js')}}"></script>
    <script src="{{asset('assets/js/purecounter.js')}}"></script>
    <script src="{{asset('assets/js/countdown.js')}}"></script>
    <script src="{{asset('assets/js/wow.js')}}"></script>
    <script src="{{asset('assets/js/isotope-pkgd.js')}}"></script>
    <script src="{{asset('assets/js/imagesloaded-pkgd.js')}}"></script>
    <script src="{{asset('assets/js/ajax-form.js')}}"></script>
    <script src="{{asset('assets/js/main.js')}}"></script>
    <script src="{{asset('assets/js/common.js')}}"></script>
    <script src="{{asset('assets/js/cart.js')}}"></script>
    <script src="{{asset('assets/js/wishlist.js')}}"></script>
    @yield('scripts')
</body>

</html>
