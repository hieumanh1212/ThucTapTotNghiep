@extends('layout/client/layout')
@section('content')
    <main>
        <form action="{{url('/payment')}}" method="post">
            @csrf
            <!-- breadcrumb area start -->
            <section class="breadcrumb__area include-bg pt-95 pb-50" data-bg-color="#EFF1F5"
                     style="background-color: rgb(239, 241, 245);">
                <div class="container">
                    <div class="row">
                        <div class="col-xxl-12">
                            <div class="breadcrumb__content p-relative z-index-1">
                                <h3 class="breadcrumb__title">Thanh toán</h3>
                                <div class="breadcrumb__list">
                                    <span><a href="#">Trang chủ</a></span>
                                    <span>Thanh toán</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- breadcrumb area end -->

            <!-- checkout area start -->
            <section class="tp-checkout-area pb-120" data-bg-color="#EFF1F5"
                     style="background-color: rgb(239, 241, 245);">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-7 col-lg-7">
                            <div class="tp-checkout-verify">

                            </div>
                        </div>
                        {{--                    <form action="{{url('/checkout')}}" method="post">--}}
                        <div class="col-lg-7">
                            <div class="tp-checkout-bill-area">
                                <h3 class="tp-checkout-bill-title">Chi tiết hóa đơn</h3>
                                <div class="tp-checkout-bill-form">
                                    {{--                                    <form action="#">--}}
                                    <div class="tp-checkout-bill-inner">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="tp-checkout-input">
                                                    <label>Họ và tên <span>*</span></label>
                                                    <input type="text" placeholder="Họ tên người nhận hàng"
                                                           name="fullName" value="{{$user->ten_khach_hang}}">
                                                </div>
                                                @error('fullName')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror

                                            </div>
                                            <div class="col-md-12">
                                                <div class="tp-checkout-input">
                                                    <label>Địa chỉ</label>
                                                    <input type="text" placeholder="Địa chỉ" name="address"
                                                           value="{{$user->dia_chi}}">
                                                    @error('address')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>

                                            </div>
                                            <div class="col-md-12">
                                                <div class="tp-checkout-input">
                                                    <label>Số điện thoại</label>
                                                    <input type="text" placeholder="Số điện thoại..."
                                                           name="phoneNumber"
                                                           value="{{$user->dien_thoai}}">
                                                    @error('phoneNumber')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>

                                            </div>
                                            <div class="col-md-12">
                                                <div class="tp-checkout-input">
                                                    <label>Ghi chú (tuỳ chọn)</label>
                                                    <textarea
                                                        placeholder="Ghi chú về đơn hàng của bạn." name="note"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{--                                    </form>--}}
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <!-- checkout place order -->
                            <div class="tp-checkout-place white-bg">
                                <h3 class="tp-checkout-place-title">Thanh toán</h3>

                                <div class="tp-order-info-list">
                                    <ul>

                                        <!-- header -->
                                        <li class="tp-order-info-list-header">
                                            <h4>Product</h4>
                                            <h4>Size,Màu</h4>
                                            <h4>Total</h4>
                                        </li>

                                        <!-- item list -->
                                        @foreach($products as $product)
                                            <li class="tp-order-info-list-desc">
                                                <p>{{$product->ten_san_pham}}<span> x {{$product->so_luong_ban}}</span>
                                                </p>
                                                <p style="color: gray; font-size: 10px; margin-right: 30px;">
                                                    Size: {{$product->size}} Color: {{$product->mau}}</p>
                                                <span style="color: purple">@formatCurrency($product->thanh_tien)</span>
                                            </li>
                                        @endforeach
                                        <input type="hidden" name="products" value="{{$products}}">
                                        <!-- subtotal -->
{{--                                        <li class="tp-order-info-list-subtotal">--}}
{{--                                            <span>Subtotal</span>--}}
{{--                                            <span>@formatCurrency($total)</span>--}}
{{--                                        </li>--}}



                                        <!-- total -->
                                        <li class="tp-order-info-list-subtotal">
                                            <span>Số tiền cần phải thanh toán</span>
                                            <h4 style="color: red">@formatCurrency($total)</h4>
                                        </li>
                                    </ul>
                                </div>
                                <div class="tp-checkout-payment">
                                    <div class="tp-checkout-payment-item">
                                        <input type="radio" id="back_transfer" name="payment" value="cash">
                                        <label for="back_transfer" data-bs-toggle="direct-bank-transfer">Thanh toán khi
                                            nhận hàng</label>
                                        <div class="tp-checkout-payment-desc direct-bank-transfer">
                                            <p>Bạn sẽ thanh toán khi đơn hàng được giao đến</p>
                                        </div>
                                    </div>
                                    <div class="tp-checkout-payment-item paypal-payment">
                                        <input type="radio" id="paypal" name="payment" value="vnpay">
                                        <label for="paypal">Thanh toán bằng VNPAY <img
                                                src="assets/img/icon/payment-option.png" alt=""> </label>
                                    </div>
                                    @error('payment')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <input type="hidden" name="total" value="{{$total}}">
                                <div class="tp-checkout-btn-wrapper">
                                    <button type="submit" name="redirect" class="tp-checkout-btn w-100">Thanh toán</button>
                                </div>
                            </div>
                        </div>
                        {{--                    </form>--}}
                    </div>
                </div>
            </section>
            <!-- checkout area end -->
        </form>

    </main>
@endsection
