@extends('layout/client/layout')

@section('content')
<main>
    <!-- breadcrumb area start -->
    <section class="breadcrumb__area include-bg text-center pt-95 pb-50">
        <div class="container">
            <div class="row">
                <div class="col-xxl-12">
                    <div class="breadcrumb__content p-relative z-index-1">
                        <h3 class="breadcrumb__title">Đăng Ký Tài Khoản</h3>
                        <div class="breadcrumb__list">
                            <span><a href="/">Trang chủ</a></span>
                            <span>Trang đăng ký</span>
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
            <img class="tp-login-shape-1" src="assets/img/login/login-shape-1.png" alt="">
            <img class="tp-login-shape-2" src="assets/img/login/login-shape-2.png" alt="">
            <img class="tp-login-shape-3" src="assets/img/login/login-shape-3.png" alt="">
            <img class="tp-login-shape-4" src="assets/img/login/login-shape-4.png" alt="">
        </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-8">
                    <div class="tp-login-wrapper">
                        <div class="tp-login-top text-center mb-30">
                            <h3 class="tp-login-title">Hãy tham gia Shofy Shop</h3>
                            <p>Bạn đã có tài khoản ? <span><a href="{{ route('loginPage') }}">Đăng nhập</a></span></p>
                        </div>
                        <div class="tp-login-option">
                            <div class="tp-login-social mb-10 d-flex flex-wrap align-items-center justify-content-center">
                                <div class="tp-login-option-item has-google">
                                    <a href="#">
                                        <img src="assets/img/icon/login/google.svg" alt="">
                                        Đăng ký với Google
                                    </a>
                                </div>
                                <div class="tp-login-option-item">
                                    <a href="#">
                                        <img src="assets/img/icon/login/facebook.svg" alt="">
                                    </a>
                                </div>
                                <div class="tp-login-option-item">
                                    <a href="#">
                                        <img class="apple" src="assets/img/icon/login/apple.svg" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="tp-login-mail text-center mb-40">
                                <p>hoặc Đăng ký với <a href="#">Email</a></p>
                            </div>

                            <!-- Form đăng ký -->
                            <form action="#" method="POST" id="register_form">
                                @csrf

                                <!-- Name -->
                                <div class="mb-3">
                                    <input type="text" name="name" id="name" class="form-control rounded-0" placeholder="Họ tên">
                                    <div class="invalid-feedback"></div>
                                </div>
                                <!-- Email -->
                                <div class="mb-3">
                                    <input type="email" name="email" id="email" class="form-control rounded-0" placeholder="Email">
                                    <div class="invalid-feedback"></div>
                                </div>
                                <!-- Password -->
                                <div class="mb-3">
                                    <input type="password" name="password" id="password" class="form-control rounded-0" placeholder="Mật khẩu">
                                    <div class="invalid-feedback"></div>
                                </div>
                                <!-- Confirm Password -->
                                <div class="mb-3">
                                    <input type="password" name="cpassword" id="cpassword" class="form-control rounded-0" placeholder="Xác nhận mật khẩu">
                                    <div class="invalid-feedback"></div>
                                </div>

                                <!-- Submit -->
                                <div id="register-alert" class="alert" style="display: none;"></div>
                                <div class="tp-login-bottom">
                                    <button id="register_button" type="submit" class="tp-login-btn w-100">Đăng ký</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- login area end -->
</main>

<script src="{{asset('assets/js/jquery-3.6.0.min.js')}}"></script>

<script>
    $(document).ready(function() {
        var registerAlert = document.getElementById('register-alert');

        $("#register_form").submit(function(e) {
            e.preventDefault();
            $("#register_button").text('Đang xử lý...');
            $.ajax({
                url: "{{ route('postRegister') }}",
                method: 'post',
                data: $(this).serialize(),
                dataType: 'json',
                success: function(response) {
                    if (response.status == 400) {
                        showError('name', response.messages.name);
                        showError('email', response.messages.email);
                        showError('password', response.messages.password);
                        showError('cpassword', response.messages.cpassword);
                        $("#register_button").text('Đăng ký');
                    } else if(response.status == 500) {
                        $("#register_button").text('Đăng ký');
                        if (registerAlert.classList.contains('alert-success')) {
                            registerAlert.classList.remove('alert-success');
                        }
                        registerAlert.classList.add('alert-danger');
                        registerAlert.style.display = 'block';
                        $("#register-alert").html(response.messages);
                    } else if (response.status == 200) {
                        $("#register_button").text('Đăng ký');
                        if (registerAlert.classList.contains('alert-danger')) {
                            registerAlert.classList.remove('alert-danger');
                        }
                        registerAlert.classList.add('alert-success');
                        registerAlert.style.display = 'block';
                        $("#register-alert").html(response.messages);
                        $("#register_form")[0].reset();
                        removeValidationClasses("#register_form");
                    }
                },
                error: function(response) {
                    $("#register_button").text('Đăng ký');
                        if(registerAlert.classList.contains('alert-success')) {
                            registerAlert.classList.remove('alert-success');
                        }
                        registerAlert.classList.add('alert-danger');
                        registerAlert.style.display = 'block';
                        $("#register-alert").html("Đã có lỗi xảy ra, vui lòng thử lại sau");
                }
            });
        });
    });
</script>
@endsection