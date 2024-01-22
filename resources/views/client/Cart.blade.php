@extends('layout/client/layout')
@section('content')
    <main>

        <!-- breadcrumb area start -->
        <section class="breadcrumb__area include-bg pt-95 pb-50">
            <div class="container">
                <div class="row">
                    <div class="col-xxl-12">
                        <div class="breadcrumb__content p-relative z-index-1">
                            <h3 class="breadcrumb__title">Giỏ hàng</h3>
                            <div class="breadcrumb__list">
                                <span><a href="/">Trang chủ</a></span>
                                <span>Giỏ hàng</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- breadcrumb area end -->

        <!-- cart area start -->
        <section class="tp-cart-area pb-120">
            <div class="container">
                <div class="row">
                    <div class="col-xl-9 col-lg-8">
                        <div class="tp-cart-list mb-25 mr-30">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th colspan="2" class="tp-cart-header-product">Sản phẩm</th>
                                    <th class="tp-cart-header-price">Giá</th>
                                    <th class="tp-cart-header-quantity">Số lượng</th>
                                    <th class="tp-cart-header-price">Thành tiền</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody id="productsInCart">
{{--                                    product in cart--}}
                                </tbody>
                            </table>
                        </div>
                        <div class="tp-cart-bottom">
                            <div class="row align-items-end">
                                <div class="col-xl-6 col-md-8">
                                    <div class="tp-cart-coupon">
                                        <form action="#">
                                            <div class="tp-cart-coupon-input-box">
                                                <label>Mã giảm giá:</label>
                                                <div class="tp-cart-coupon-input d-flex align-items-center">
                                                    <input type="text" placeholder="Nhập mã giảm giá">
                                                    <button type="submit">Áp dụng</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="tp-cart-checkout-wrapper">
                            <div class="tp-cart-checkout-top d-flex align-items-center justify-content-between">
                                <span class="tp-cart-checkout-top-title">Tổng tiền</span>
                                <span class="tp-cart-checkout-top-price" id="subTotal"></span>
                            </div>
                            <div class="tp-cart-checkout-proceed">
                                <a href="{{url('checkout')}}" class="tp-cart-checkout-btn w-100">Thanh toán</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- cart area end -->

    </main>
@endsection
@section('scripts')
    <script>
        $(function () {
            getProductsInCart();
        });
    </script>
@endsection
