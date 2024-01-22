<!doctype html>
<html class="no-js" lang="zxx">

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

</head>

<body>
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

    <!-- cart mini area start -->
    <div class="cartmini__area cartmini__style-darkRed">
        <div class="cartmini__wrapper d-flex justify-content-between flex-column">
            <div class="cartmini__top-wrapper">
                <div class="cartmini__top p-relative">
                    <div class="cartmini__top-title">
                        <h4>Shopping cart</h4>
                    </div>
                    <div class="cartmini__close">
                        <button type="button" class="cartmini__close-btn cartmini-close-btn"><i class="fal fa-times"></i></button>
                    </div>
                </div>
                <div class="cartmini__shipping">
                    <p> Free Shipping for all orders over <span>$50</span></p>
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" data-width="70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
                <div class="cartmini__widget">
                    <div class="cartmini__widget-item">
                        <div class="cartmini__thumb">
                            <a href="product-details.html">
                                <img src="{{asset('assets/img/product/product-1.jpg')}}" alt="">
                            </a>
                        </div>
                        <div class="cartmini__content">
                            <h5 class="cartmini__title"><a href="product-details.html">Level Bolt Smart Lock</a></h5>
                            <div class="cartmini__price-wrapper">
                                <span class="cartmini__price">$46.00</span>
                                <span class="cartmini__quantity">x2</span>
                            </div>
                        </div>
                        <a href="#" class="cartmini__del"><i class="fa-regular fa-xmark"></i></a>
                    </div>
                </div>
                <!-- for wp -->
                <!-- if no item in cart -->
                <div class="cartmini__empty text-center d-none">
                    <img src="{{asset('assets/img/product/cartmini/empty-cart.png')}}" alt="">

                    <p>Your Cart is empty</p>
                    <a href="shop.html" class="tp-btn">Go to Shop</a>
                </div>
            </div>
            <div class="cartmini__checkout">
                <div class="cartmini__checkout-title mb-30">
                    <h4>Subtotal:</h4>
                    <span>$113.00</span>
                </div>
                <div class="cartmini__checkout-btn">
                    <a href="cart.html" class="tp-btn mb-10 w-100"> view cart</a>
                    <a href="checkout.html" class="tp-btn tp-btn-border w-100"> checkout</a>
                </div>
            </div>
        </div>
    </div>
    <!-- cart mini area end -->

    <!-- header area start -->
    <header>
        <div class="tp-header-area tp-header-style-darkRed tp-header-height">
            <!-- header top start  -->
            <div class="tp-header-top-2 p-relative z-index-11 tp-header-top-border d-none d-md-block">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <div class="tp-header-info d-flex align-items-center">
                                <div class="tp-header-info-item">
                                    <a href="#">
                                        <span>
                                            <svg width="8" height="15" viewBox="0 0 8 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M8 0H5.81818C4.85376 0 3.92883 0.383116 3.24688 1.06507C2.56493 1.74702 2.18182 2.67194 2.18182 3.63636V5.81818H0V8.72727H2.18182V14.5455H5.09091V8.72727H7.27273L8 5.81818H5.09091V3.63636C5.09091 3.44348 5.16753 3.25849 5.30392 3.1221C5.44031 2.98571 5.6253 2.90909 5.81818 2.90909H8V0Z" fill="currentColor" />
                                            </svg>
                                        </span> Fanpage
                                    </a>
                                </div>
                                <div class="tp-header-info-item">
                                    <a href="tel:402-763-282-46">
                                        <span>
                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M1.359 2.73916C1.59079 2.35465 2.86862 0.958795 3.7792 1.00093C4.05162 1.02426 4.29244 1.1883 4.4881 1.37943H4.48885C4.93737 1.81888 6.22423 3.47735 6.29648 3.8265C6.47483 4.68282 5.45362 5.17645 5.76593 6.03954C6.56213 7.98771 7.93402 9.35948 9.88313 10.1549C10.7455 10.4679 11.2392 9.44752 12.0956 9.62511C12.4448 9.6981 14.1042 10.9841 14.5429 11.4333V11.4333C14.7333 11.6282 14.8989 11.8698 14.9214 12.1422C14.9553 13.1016 13.4728 14.3966 13.1838 14.5621C12.502 15.0505 11.6125 15.0415 10.5281 14.5373C7.50206 13.2784 2.66618 8.53401 1.38384 5.39391C0.893174 4.31561 0.860062 3.42016 1.359 2.73916Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M9.84082 1.18318C12.5534 1.48434 14.6952 3.62393 15 6.3358" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M9.84082 3.77927C11.1378 4.03207 12.1511 5.04544 12.4039 6.34239" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </span> +(84) 123 456 789
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="tp-header-top-right tp-header-top-black d-flex align-items-center justify-content-end">
                                <div class="tp-header-top-menu d-flex align-items-center justify-content-end">
                                    @if (session()->has('userInfo'))
                                    <div class="tp-header-top-menu-item tp-header-setting">
                                        <span class="tp-header-setting-toggle" id="tp-header-setting-toggle">{{ session('userInfo.ten_nhan_vien') ?? session('userInfo.ten_khach_hang') }}</span>
                                        <ul>
                                            <li>
                                                <a href="{{ route('profilePage') }}">Thông tin tài khoản</a>
                                            </li>
                                            <li>
                                                <a href="#">Danh sách yêu thích</a>
                                            </li>
                                            <li>
                                                <a href="#" class="cartmini-open-btn">Giỏ hàng</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="tp-header-info-item">
                                        <span style="color: black;" class="tp-header-setting-toggle" id="tp-header-setting-toggle">
                                            <a href="{{ route('logout') }}">Đăng xuất</a>
                                        </span>
                                    </div>
                                    @else
                                    <div style="padding: 20px;">
                                        <span class="tp-header-setting-toggle" id="tp-header-setting-toggle"></span>
                                    </div>
                                    <div class="tp-header-info-item">
                                        <span style="color: black;" class="tp-header-setting-toggle" id="tp-header-setting-toggle">
                                            <a href="{{ route('loginPage') }}">Đăng nhập</a>
                                        </span>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- header bottom start -->
            <div id="header-sticky" class="tp-header-bottom-2 tp-header-sticky">
                <div class="container">
                    <div class="tp-mega-menu-wrapper p-relative">
                        <div class="row align-items-center">
                            <div class="col-xl-2 col-lg-5 col-md-5 col-sm-4 col-6">
                                <div class="logo">
                                    <a href="#">
                                        <img src="{{asset('assets/img/logo/logo.svg')}}" alt="logo">
                                    </a>
                                </div>
                            </div>
                            <div class="col-xl-5 d-none d-xl-block">
                                <div class="main-menu menu-style-2">
                                    <nav class="tp-main-menu-content">
                                        <ul>
                                            <li>
                                                <a href="{{ route('homepage') }}">Trang chủ</a>
                                            </li>
                                            <li class>
                                                <a href="{{ route('shop-list') }}">Sản phẩm</a>
                                            </li>
                                            <li><a href="coupon.html">Khuyến mại</a></li>
                                            <li>
                                                <a href="/news">Blog</a>
                                            </li>
                                            <li><a href="{{ route('client.feedback') }}">Liên hệ</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <div class="col-xl-5 col-lg-7 col-md-7 col-sm-8 col-6">
                                <div class="tp-header-bottom-right d-flex align-items-center justify-content-end pl-30">
                                    <div class="tp-header-search-2 d-none d-sm-block">
                                        <form action="#" id="searchBox">
                                            <input id="keyword" name="keyword" type="text" placeholder="Tìm kiếm sản phẩm...">
                                            <button type="submit">
                                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M9 17C13.4183 17 17 13.4183 17 9C17 4.58172 13.4183 1 9 1C4.58172 1 1 4.58172 1 9C1 13.4183 4.58172 17 9 17Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M18.9999 19L14.6499 14.65" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                    <div class="tp-header-action d-flex align-items-center ml-30">
                                        <div class="tp-header-action-item d-none d-lg-block">
                                            <a href="{{asset('/wishlist')}}" class="tp-header-action-btn">
                                                <svg width="22" height="20" viewBox="0 0 22 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M11.239 18.8538C13.4096 17.5179 15.4289 15.9456 17.2607 14.1652C18.5486 12.8829 19.529 11.3198 20.1269 9.59539C21.2029 6.25031 19.9461 2.42083 16.4289 1.28752C14.5804 0.692435 12.5616 1.03255 11.0039 2.20148C9.44567 1.03398 7.42754 0.693978 5.57894 1.28752C2.06175 2.42083 0.795919 6.25031 1.87187 9.59539C2.46978 11.3198 3.45021 12.8829 4.73806 14.1652C6.56988 15.9456 8.58917 17.5179 10.7598 18.8538L10.9949 19L11.239 18.8538Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M7.26062 5.05302C6.19531 5.39332 5.43839 6.34973 5.3438 7.47501" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                                <span class="tp-header-action-badge" id="wishlistSize"></span>
                                            </a>
                                        </div>
                                        <div class="tp-header-action-item">
                                            <a class="tp-header-action-btn cartmini-open-btn" href="{{asset('/carts')}}">
                                                <svg width="21" height="22" viewBox="0 0 21 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M6.48626 20.5H14.8341C17.9004 20.5 20.2528 19.3924 19.5847 14.9348L18.8066 8.89359C18.3947 6.66934 16.976 5.81808 15.7311 5.81808H5.55262C4.28946 5.81808 2.95308 6.73341 2.4771 8.89359L1.69907 14.9348C1.13157 18.889 3.4199 20.5 6.48626 20.5Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M6.34902 5.5984C6.34902 3.21232 8.28331 1.27803 10.6694 1.27803V1.27803C11.8184 1.27316 12.922 1.72619 13.7362 2.53695C14.5504 3.3477 15.0081 4.44939 15.0081 5.5984V5.5984" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M7.70365 10.1018H7.74942" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M13.5343 10.1018H13.5801" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                                <span class="tp-header-action-badge" id="cartSize"></span>
                                            </a>
                                        </div>
                                        <div class="tp-header-action-item tp-header-hamburger mr-20 d-xl-none">
                                            <button type="button" class="tp-offcanvas-open-btn">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="16" viewBox="0 0 30 16">
                                                    <rect x="10" width="20" height="2" fill="currentColor" />
                                                    <rect x="5" y="7" width="25" height="2" fill="currentColor" />
                                                    <rect x="10" y="14" width="20" height="2" fill="currentColor" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- header area end -->


    <main>
        <!-- breadcrumb area start -->
        <section class="breadcrumb__area include-bg pt-60 pb-50">
            <div class="container">
                <div class="row">
                    <div class="col-xxl-12">
                        <div class="breadcrumb__content p-relative z-index-1">
                            <h3 class="breadcrumb__title">Gian hàng</h3>
                            <div class="breadcrumb__list">
                                <span><a href="#">Trang chủ</a></span>
                                <span>Gian hàng</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- breadcrumb area end -->

        <!-- shop area start -->
        <section class="tp-shop-area pb-120">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-lg-4">
                        <div class="tp-shop-sidebar mr-10">
                            <!-- filter -->
                            <div class="tp-shop-widget mb-35">
                                <h3 class="tp-shop-widget-title no-border">Lọc theo giá</h3>

                                <div class="tp-shop-widget-content">
                                    <div class="tp-shop-widget-filter">
                                        <div id="slider-range" class="mb-10"></div>
                                        <div class="tp-shop-widget-filter-info d-flex align-items-center justify-content-between">
                                            <span class="input-range">
                                                <input type="text" id="amount" readonly style="font-size: small;">
                                            </span>
                                            <button class="tp-shop-widget-filter-btn" type="button">Xác nhận</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- categories -->
                            <div class="tp-shop-widget mb-50">
                                <h3 class="tp-shop-widget-title">Thể loại</h3>

                                <div class="tp-shop-widget-content">
                                    <div class="tp-shop-widget-categories">
                                        <ul id="category-list">
                                            @foreach ($countProductEachCategory as $category)
                                            <li class="category-item">
                                                <a data-category-id="{{ $category['ma_the_loai'] }}" data-category="{{ $category['ten_the_loai'] }}">
                                                    {{ $category['ten_the_loai'] }} <span>{{ $category['count'] }}</span>
                                                </a>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-8">
                        <div class="tp-shop-main-wrapper">
                            <div class="tp-shop-top mb-10">
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="tp-shop-top-left d-flex align-items-center ">
                                            <div class="tp-shop-top-tab tp-tab">
                                                <ul class="nav nav-tabs" id="productTab" role="tablist">
                                                    <li class="nav-item" role="presentation">
                                                        <button class="nav-link active" id="grid-tab" data-bs-toggle="tab" data-bs-target="#grid-tab-pane" type="button" role="tab" aria-controls="grid-tab-pane" aria-selected="true">
                                                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M16.3327 6.01341V2.98675C16.3327 2.04675 15.906 1.66675 14.846 1.66675H12.1527C11.0927 1.66675 10.666 2.04675 10.666 2.98675V6.00675C10.666 6.95341 11.0927 7.32675 12.1527 7.32675H14.846C15.906 7.33341 16.3327 6.95341 16.3327 6.01341Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                <path d="M16.3327 15.18V12.4867C16.3327 11.4267 15.906 11 14.846 11H12.1527C11.0927 11 10.666 11.4267 10.666 12.4867V15.18C10.666 16.24 11.0927 16.6667 12.1527 16.6667H14.846C15.906 16.6667 16.3327 16.24 16.3327 15.18Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                <path d="M7.33268 6.01341V2.98675C7.33268 2.04675 6.90602 1.66675 5.84602 1.66675H3.15268C2.09268 1.66675 1.66602 2.04675 1.66602 2.98675V6.00675C1.66602 6.95341 2.09268 7.32675 3.15268 7.32675H5.84602C6.90602 7.33341 7.33268 6.95341 7.33268 6.01341Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                <path d="M7.33268 15.18V12.4867C7.33268 11.4267 6.90602 11 5.84602 11H3.15268C2.09268 11 1.66602 11.4267 1.66602 12.4867V15.18C1.66602 16.24 2.09268 16.6667 3.15268 16.6667H5.84602C6.90602 16.6667 7.33268 16.24 7.33268 15.18Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                            </svg>
                                                        </button>
                                                    </li>
                                                    <li class="nav-item" role="presentation">
                                                        <button class="nav-link" id="list-tab" data-bs-toggle="tab" data-bs-target="#list-tab-pane" type="button" role="tab" aria-controls="list-tab-pane" aria-selected="false">
                                                            <svg width="16" height="15" viewBox="0 0 16 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M15 7.11108H1" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                                <path d="M15 1H1" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                                <path d="M15 13.2222H1" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                            </svg>
                                                        </button>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="tp-shop-top-result">
                                                <p id="countText" style="font-size: small;"></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="tp-shop-top-right d-sm-flex align-items-center justify-content-xl-end">
                                            <div class="tp-shop-top-select">
                                                <select id="sortOrderSelect">
                                                    <option value="default">Sắp xếp mặc định</option>
                                                    <option value="lowToHigh">Từ thấp đến cao</option>
                                                    <option value="highToLow">Từ cao đến thấp</option>
                                                </select>
                                            </div>
                                            <div class="tp-shop-top-filter">
                                                <button type="button" class="tp-filter-btn" id="resetFiltersBtn">
                                                    <span>
                                                        <svg width="16" height="15" viewBox="0 0 16 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M14.9998 3.45001H10.7998" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                                            <path d="M3.8 3.45001H1" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                                            <path d="M6.5999 5.9C7.953 5.9 9.0499 4.8031 9.0499 3.45C9.0499 2.0969 7.953 1 6.5999 1C5.2468 1 4.1499 2.0969 4.1499 3.45C4.1499 4.8031 5.2468 5.9 6.5999 5.9Z" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                                            <path d="M15.0002 11.15H12.2002" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                                            <path d="M5.2 11.15H1" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                                            <path d="M9.4002 13.6C10.7533 13.6 11.8502 12.5031 11.8502 11.15C11.8502 9.79691 10.7533 8.70001 9.4002 8.70001C8.0471 8.70001 6.9502 9.79691 6.9502 11.15C6.9502 12.5031 8.0471 13.6 9.4002 13.6Z" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        </svg>
                                                    </span>
                                                    Reset các bộ lọc
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-12" style="margin-bottom: 0px; margin-top: 2%; padding-left: 1%;" id="searchStatus">
                                        <p style="display:inline-block; margin-bottom:0px; font-weight: bold;">Từ khóa tìm kiếm: </p>
                                        <p style="display:inline-block; margin-bottom:0px;" id="searchKeyword">Trống</p>
                                    </div>
                                    <div class="col-xl-12" style="margin-bottom: 0px; margin-top: 0%; padding-left: 1%;" id="filterStatus">
                                        <p style="display:inline-block; font-weight: bold;">Bộ lọc hiện tại: </p>
                                        <p style="display:inline-block;" id="filterTheLoaiStatus"></p>
                                        <p style="display:inline-block;" id="filterPriceStatus"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="tp-shop-items-wrapper tp-shop-item-primary">
                                <div class="tab-content" id="productTabContent">
                                    <div class="tab-pane fade show active" id="grid-tab-pane" role="tabpanel" aria-labelledby="grid-tab" tabindex="0">
                                        <div class="row infinite-container" id="listProduct">
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="list-tab-pane" role="tabpanel" aria-labelledby="list-tab" tabindex="0">
                                        <div class="tp-shop-list-wrapper tp-shop-item-primary mb-70" id='listProduct2'>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tp-shop-pagination mt-20">
                                <div class="tp-pagination">
                                    <nav>
                                        <ul id="tp-navigation">
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- shop area end -->
    </main>



    <!-- footer area start -->
    <footer>
        <div class="tp-footer-area tp-footer-style-2" data-bg-color="footer-bg-white">
            <div class="tp-footer-top pt-95 pb-40">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-4 col-lg-3 col-md-4 col-sm-6">
                            <div class="tp-footer-widget footer-col-1 mb-50">
                                <div class="tp-footer-widget-content">
                                    <div class="tp-footer-logo">
                                        <a href="{{ route('homepage') }}">
                                            <img src="{{asset('assets/img/logo/logo.svg')}}" alt="logo">
                                        </a>
                                    </div>
                                    <p class="tp-footer-desc">Chúng tôi luôn muốn mang đến cho bạn những dịch vụ chuyên nghiệp, uy tín và chất lượng.</p>
                                    <div class="tp-footer-social">
                                        <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                                        <a href="#"><i class="fa-brands fa-twitter"></i></a>
                                        <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
                                        <a href="#"><i class="fa-brands fa-vimeo-v"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                            <div class="tp-footer-widget footer-col-2 mb-50">
                                <h4 class="tp-footer-widget-title">Tài khoản của tôi</h4>
                                <div class="tp-footer-widget-content">
                                    <ul>
                                        <li><a href="#">Danh sách yêu thích</a></li>
                                        <li><a href="#">Thông tin tài khoản</a></li>
                                        <li><a href="#">Lịch sử mua hàng</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                            <div class="tp-footer-widget footer-col-3 mb-50">
                                <h4 class="tp-footer-widget-title">Thông tin</h4>
                                <div class="tp-footer-widget-content">
                                    <ul>
                                        <li><a href="#">Câu chuyện</a></li>
                                        <li><a href="#">Sự nghiệp</a></li>
                                        <li><a href="#">Chính sách bảo mật</a></li>
                                        <li><a href="#">Điều khoản & điều kiện</a></li>
                                        <li><a href="#">Tin tức mới nhất</a></li>
                                        <li><a href="#">Liên hệ</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                            <div class="tp-footer-widget footer-col-4 mb-50">
                                <h4 class="tp-footer-widget-title">Nói với chúng tôi</h4>
                                <div class="tp-footer-widget-content">
                                    <div class="tp-footer-talk mb-20">
                                        <span>Có câu hỏi? Gọi chúng tôi ngay nào</span>
                                        <h4><a href="tel:670-413-90-762">+(884) 123 456 789</a></h4>
                                    </div>
                                    <div class="tp-footer-contact">
                                        <div class="tp-footer-contact-item d-flex align-items-start">
                                            <div class="tp-footer-contact-icon">
                                                <span>
                                                    <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M1 5C1 2.2 2.6 1 5 1H13C15.4 1 17 2.2 17 5V10.6C17 13.4 15.4 14.6 13 14.6H5" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                                        <path d="M13 5.40039L10.496 7.40039C9.672 8.05639 8.32 8.05639 7.496 7.40039L5 5.40039" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                                        <path d="M1 11.4004H5.8" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                                        <path d="M1 8.19922H3.4" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                                    </svg>
                                                </span>
                                            </div>
                                            <div class="tp-footer-contact-content">
                                                <p><a href="mailto:shofyshop.gr07.cnpm@gmail.com">shofyshop.gr07.cnpm@gmail.com</a></p>
                                            </div>
                                        </div>
                                        <div class="tp-footer-contact-item d-flex align-items-start">
                                            <div class="tp-footer-contact-icon">
                                                <span>
                                                    <svg width="17" height="20" viewBox="0 0 17 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M8.50001 10.9417C9.99877 10.9417 11.2138 9.72668 11.2138 8.22791C11.2138 6.72915 9.99877 5.51416 8.50001 5.51416C7.00124 5.51416 5.78625 6.72915 5.78625 8.22791C5.78625 9.72668 7.00124 10.9417 8.50001 10.9417Z" stroke="currentColor" stroke-width="1.5" />
                                                        <path d="M1.21115 6.64496C2.92464 -0.887449 14.0841 -0.878751 15.7889 6.65366C16.7891 11.0722 14.0406 14.8123 11.6313 17.126C9.88298 18.8134 7.11704 18.8134 5.36006 17.126C2.95943 14.8123 0.210885 11.0635 1.21115 6.64496Z" stroke="currentColor" stroke-width="1.5" />
                                                    </svg>
                                                </span>
                                            </div>
                                            <div class="tp-footer-contact-content">
                                                <p><a href="https://maps.app.goo.gl/1XjMane5n8xN2eUCA" target="_blank">Số 3 Cầu Giấy <br> Láng Thượng, Đống Đa, Hà Nội</a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tp-footer-bottom">
                <div class="container">
                    <div class="tp-footer-bottom-wrapper">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <div class="tp-footer-copyright">
                                    <p>© 2023 All Rights Reserved | <a href="">Group 07 - University of Transport and Communications</a>.</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="tp-footer-payment text-md-end">
                                    <p>
                                        <img src="{{asset('assets/img/footer/footer-pay-2.png')}}" alt="">
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer area end -->

    <!-- JS here -->
    <script src="{{asset('assets/js/vendor/jquery.js')}}"></script>
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

    <div id="getDataFilter" data-controller-data="{{ json_encode($dataFilter) }}"></div>

    <script>

    var dataFilter = JSON.parse(document.getElementById('getDataFilter').getAttribute('data-controller-data'));
    console.log(dataFilter);
    var count = dataFilter.count;
    var currentKeyword = dataFilter.keyword;
    var currentSortOrder = dataFilter.sortOrder;
    var currentCategory = dataFilter.category;
    var currentColor = dataFilter.color;
    var currentMinPrice = dataFilter.minPrice;
    var currentMaxPrice = dataFilter.maxPrice;
    var currentPageNumber = dataFilter.pageNumber;

    var currentCategoryName = dataFilter.categoryName;

    $(document).ready(function() {
        console.log(currentCategoryName);
        getAllRecordsWithFilter(currentKeyword, currentPageNumber, currentSortOrder, currentCategory, currentColor, currentMinPrice, currentMaxPrice);

        var strSearchKeyWord = (currentKeyword == null || currentKeyword == ``)  ? `Trống` : currentKeyword;
        var strFilterCategory;
        var strFilterPrice = ``;

        if (currentCategory == null || currentCategory == ``) {
            strFilterCategory = `Trống`;
        } else {
            strFilterCategory = currentCategoryName;
        }
        
        $('#searchKeyword').html(strSearchKeyWord);
        $('#filterTheLoaiStatus').html(strFilterCategory);
        $('#filterPriceStatus').html(strFilterPrice);

        getAllRecordsWithFilter(currentKeyword, currentPageNumber, currentSortOrder, currentCategory, currentColor, currentMinPrice, currentMaxPrice);

        $('#searchBox').on('submit', function(event) {
            event.preventDefault();
            currentKeyword = $('#keyword').val();
            $('#searchKeyword').html(`${currentKeyword}`);
            console.log(currentSortOrder);
            getAllRecordsWithFilter(currentKeyword, currentPageNumber, currentSortOrder, currentCategory, currentColor, currentMinPrice, currentMaxPrice);
        });


        $('#sortOrderSelect').change(function() {
            currentSortOrder = $(this).val();
            console.log(currentSortOrder);
            getAllRecordsWithFilter(currentKeyword, currentPageNumber, currentSortOrder, currentCategory, currentColor, currentMinPrice, currentMaxPrice);
        });

        $('.category-item').click(function() {
            currentCategory = $(this).find('a').data('category-id');
            $('#filterTheLoaiStatus').html(`${$(this).find('a').data('category')}`);
            console.log(currentCategory);
            getAllRecordsWithFilter(currentKeyword, currentPageNumber, currentSortOrder, currentCategory, currentColor, currentMinPrice, currentMaxPrice);
        });

        $(".tp-shop-widget-filter-btn").click(function() {
            // Get the current slider values
            currentMinPrice = $("#slider-range").slider("values", 0);
            currentMaxPrice = $("#slider-range").slider("values", 1);
            if (currentCategory == null || currentCategory == ``) {
                strFilterCategory = ``;
            } else {
                strFilterCategory = currentCategory;
            }
            $('#filterTheLoaiStatus').html(`${strFilterCategory}`);
            $('#filterPriceStatus').html(`giá từ ${currentMinPrice} VNĐ đến ${currentMaxPrice} VNĐ`);
            console.log(currentMinPrice);
            console.log(currentMaxPrice);
            getAllRecordsWithFilter(currentKeyword, currentPageNumber, currentSortOrder, currentCategory, currentColor, currentMinPrice, currentMaxPrice);
        });

        $("#resetFiltersBtn").click(function() {
            $("#searchKeyword").html(`Trống`);
            $('#filterTheLoaiStatus').html(`Trống`);
            $('#filterPriceStatus').html(``);
            $('#sortOrderSelect').val('default');
            currentSortOrder = `default`;
            currentKeyword = null;
            currentCategory = null;
            currentColor = null;
            currentMinPrice = null;
            currentMaxPrice = null;
            getAllRecordsWithFilter(currentKeyword, currentPageNumber, currentSortOrder, currentCategory, currentColor, currentMinPrice, currentMaxPrice);
        });
    });

    function getAllRecordsWithFilter(keyword, pageNumber, sortOrder, category, color, minPrice, maxPrice) {
        var pageSize = 6;
        $.ajax({
            url: `{{ route('shop-list-pagination-filter') }}`,
            method: 'GET',
            dataType: 'json',
            data: {
                keyword: keyword,
                pageNumber: pageNumber,
                pageSize: pageSize,
                sortOrder: sortOrder,
                category: category,
                color: color,
                minPrice: minPrice,
                maxPrice: maxPrice,
            },
        }).done(function(response) {
            console.log(response.total);
            if (response.data.length == 0) {
                document.getElementById('countText').innerHTML = `Không tìm thấy sản phẩm nào`;
            } else {
                document.getElementById('countText').innerHTML = `Hiển thị ${response.data.length} trong tổng số ${response.countFound} sản phẩm tìm thấy`;
            }
            count = response.total;
            console.log(response);
            renderProduct(response);
            console.log(response.countFound);
            if (response.countFound > 0) {
                renderPagination(Math.ceil(response.countFound / pageSize), pageNumber);
            } else {
                $('#tp-navigation').empty();
            }
        });
    }

    function renderPagination(totalPages, currentPage) {
        let pagination = '';
        for (let i = 1; i <= totalPages; i++) {
            // pagination += `<li>
            //     <a href="shop.html">${i}</a>
            // </li>`;
            pagination += `<button class="btn ${i === currentPage ? 'btn-primary' : 'btn btn-light'}" onclick="getAllRecordsWithFilter('${currentKeyword || ''}', ${i} ,'${currentSortOrder || ''}', '${currentCategory || ''}', '${currentColor || ''}', '${currentMinPrice || ''}', '${currentMaxPrice || ''}')">${i}</button> `;
        }
        document.getElementById('tp-navigation').innerHTML = pagination;
    }

    function renderProduct(response) {
        let str1 = '';
        let str2 = '';
        for (var i = 0; i < response.data.length; i++) {
            str1 += `<div class="col-xl-4 col-md-6 col-sm-6 infinite-item">
                                       <div class="tp-product-item-2 mb-40">
                                          <div class="tp-product-thumb-2 p-relative z-index-1 fix w-img">
                                             <a href="http://127.0.0.1:8000/product-detail/${response.data[i].ma_san_pham}">
                                                <img src="http://127.0.0.1:8000/IMG_SanPham/${response.data[i].anh_dai_dien}">
                                             </a>
                                          </div>
                                          <div class="tp-product-content-2 pt-15">
                                             <div class="tp-product-tag-2">
                                                <a href="#">${response.data[i].ten_the_loai}</a>
                                             </div>
                                             <h3 class="tp-product-title-2">
                                                <a href="http://127.0.0.1:8000/product-detail/${response.data[i].ma_san_pham}">${response.data[i].ten_san_pham}</a>
                                             </h3>
                                             <div class="tp-product-rating-icon tp-product-rating-icon-2">
                                                <span><i class="fa-solid fa-star"></i></span>
                                                <span><i class="fa-solid fa-star"></i></span>
                                                <span><i class="fa-solid fa-star"></i></span>
                                                <span><i class="fa-solid fa-star"></i></span>
                                                <span><i class="fa-solid fa-star"></i></span>
                                             </div>
                                             <div class="tp-product-price-wrapper-2">
                                            
                                                <span class="tp-product-price-2 new-price">
                                                    ${parseFloat(response.data[i].don_gia_ban - response.data[i].giam_gia).toLocaleString('vi-VN')} VNĐ
                                                </span>
                                                <span class="tp-product-price-2 old-price">
                                                    ${parseFloat(response.data[i].don_gia_ban).toLocaleString('vi-VN')} VNĐ
                                                </span>
                       
                                             </div>
                                          </div>
                                       </div>
                                    </div>`;
            str2 += `<div class="row">
                                            <div class="col-xl-12">
                                                <div class="tp-product-list-item d-md-flex">
                                                    <div class="tp-product-list-thumb p-relative fix">
                                                        <a href="http://127.0.0.1:8000/product-detail/${response.data[i].ma_san_pham}">
                                                            <img src="http://127.0.0.1:8000/IMG_SanPham/${response.data[i].anh_dai_dien}" alt="" style="width: 296px; height: 296px;">
                                                        </a>
                                                    </div>
                                                    <div class="tp-product-list-content">
                                                        <div class="tp-product-content-2 pt-15">
                                                            <div class="tp-product-tag-2">
                                                                <a href="#">${response.data[i].ten_the_loai}</a>
                                                            </div>
                                                            <h3 class="tp-product-title-2">
                                                                <a href="http://127.0.0.1:8000/product-detail/${response.data[i].ma_san_pham}">${response.data[i].ten_san_pham}</a>
                                                            </h3>
                                                            <div class="tp-product-rating-icon tp-product-rating-icon-2">
                                                                <span><i class="fa-solid fa-star"></i></span>
                                                                <span><i class="fa-solid fa-star"></i></span>
                                                                <span><i class="fa-solid fa-star"></i></span>
                                                                <span><i class="fa-solid fa-star"></i></span>
                                                                <span><i class="fa-solid fa-star"></i></span>
                                                            </div>
                                                            <div class="tp-product-price-wrapper-2">
                                                                <span class="tp-product-price-2 new-price">${response.data[i].don_gia_ban}</span>
                                                                
                                                            </div>
                                                            <p>${response.data[i].mo_ta}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>`;
        }
        document.getElementById('listProduct').innerHTML = str1;
        document.getElementById('listProduct2').innerHTML = str2;
    }
</script>
</body>

</html>