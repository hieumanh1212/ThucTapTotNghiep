@extends('layout.client.layout')
@section('content')
<main>
    <!-- breadcrumb area start -->
    <section class="breadcrumb__area include-bg text-center pt-95 pb-50">
        <div class="container">
            <div class="row">
                <div class="col-xxl-12">
                    <div class="breadcrumb__content p-relative z-index-1">
                        <h3 class="breadcrumb__title">Tài khoản của tôi</h3>
                        <div class="breadcrumb__list">
                            <span><a href="#">Trang chủ</a></span>
                            <span>Tài khoản của tôi</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb area end -->

    <!-- login area start -->
    <section class="tp-login-area pb-140 p-relative z-index-1 fix">
        <div class="tp-login-shape">
            <img class="tp-login-shape-1" src="{{asset('assets/img/login/login-shape-1.png')}}" alt="">
            <img class="tp-login-shape-2" src="{{asset('assets/img/login/login-shape-2.png')}}" alt="">
            <img class="tp-login-shape-3" src="{{asset('assets/img/login/login-shape-3.png')}}" alt="">
            <img class="tp-login-shape-4" src="{{asset('assets/img/login/login-shape-4.png')}}" alt="">
        </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-8">
                    <div class="tp-login-wrapper">
                        <div class="tp-login-top text-center mb-30">
                            <h3 class="tp-login-title">Tuyệt vời!</h3>
                        </div>
                        <div class="tp-login-option">
                            <div class="tp-login-mail mb-40">
                                <p>Bạn đã xác thực email <span style="font-weight: bold; font-size: 15px;">{{ $email }}</span> thành công, chúc bạn có một trải nghiệm mua sắm tuyệt vời tại Shofy Shop!</p>
                            </div>
                            <div style="margin-top: 2%;" class="tp-login-mail text-center mb-40">
                                <div class="tp-login-forgot">
                                    <p><a href="{{ route('loginPage') }}">Đăng nhập</a> ngay</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- login area end -->
</main>
@endsection