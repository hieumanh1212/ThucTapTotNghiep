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
                            <h3 class="tp-login-title">Quên mật khẩu</h3>
                        </div>
                        <div class="tp-login-option">
                            <div class="tp-login-mail mb-40">
                                <p>Nhập email của bạn và chúng tôi sẽ gửi cho bạn một đường dẫn để đặt lại mật khẩu.</p>
                            </div>
                            <form method="POST" action="#" id="forgot_form">
                                @csrf
                                <div class="tp-login-input-wrapper">
                                    <div class="tp-login-input-box">
                                        <div class="tp-login-input">
                                            <input id="email" type="email" name="email" placeholder="shofy@mail.com">
                                        </div>
                                        <div class="tp-login-input-title">
                                            <label for="email">Email</label>
                                        </div>
                                    </div>
                                </div>
                                <div id="forgot_alert" class="alert" style="display: none;"></div>
                                <div class="tp-login-bottom">
                                    <button id="forgot_button" type="submit" class="tp-login-btn w-100">Đặt lại mật khẩu</button>
                                </div>
                            </form>
                            <div style="margin-top: 2%;" class="tp-login-mail text-center mb-40">
                                <div class="tp-login-forgot">
                                    <p>Trở về trang <a href="{{ route('loginPage') }}">Đăng nhập</a></p>
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

<script src="{{asset('assets/js/jquery-3.6.0.min.js')}}"></script>

<script>
    $(document).ready(function() {
        var forgotAlert = document.getElementById('forgot_alert');

        $("#forgot_form").submit(function(e) {
            e.preventDefault();
            $("#forgot_button").html('Đang xử lý...');
            $.ajax({
                url: "{{ route('postForgot') }}",
                method: "POST",
                data: $("#forgot_form").serialize(),
                dataType: "json",
                success: function(response) {
                    //console.log(response);
                    if (response.status == 200) {
                        $("#forgot_button").html('Đặt lại mật khẩu');
                        if(forgotAlert.classList.contains('alert-danger')) {
                            forgotAlert.classList.remove('alert-danger');
                        }
                        forgotAlert.classList.add('alert-success');
                        forgotAlert.style.display = 'block';
                        $("#forgot_alert").html(response.messages);
                    } else {
                        $("#forgot_button").html('Đặt lại mật khẩu');
                        if(forgotAlert.classList.contains('alert-success')) {
                            forgotAlert.classList.remove('alert-success');
                        }
                        forgotAlert.classList.add('alert-danger');
                        forgotAlert.style.display = 'block';
                        $("#forgot_alert").html(response.messages);
                    }
                },
                error: function(response) {
                    $("#forgot_button").html('Đặt lại mật khẩu');
                        if(forgotAlert.classList.contains('alert-success')) {
                            forgotAlert.classList.remove('alert-success');
                        }
                        forgotAlert.classList.add('alert-danger');
                        forgotAlert.style.display = 'block';
                        $("#forgot_alert").html("Đã có lỗi xảy ra, vui lòng thử lại sau");
                }
            });
        });
    });
</script>
@endsection