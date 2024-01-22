@extends('layout.client.layout')
@section('content')
    @if(isset($_GET['payment']))
        <script>
            swal({
                title: "Bạn đã đặt hàng thành công",
                icon: "success",
                showConfirmButton: false,
                timer: 2500
            });
        </script>
    @endif
    <main>
        <!-- slider area start -->
        <section class="tp-slider-area p-relative z-index-1">
            <div class="tp-slider-active-2 swiper-container">
                <div class="swiper-wrapper">
                    <div class="tp-slider-item-2 tp-slider-height-2 p-relative swiper-slide grey-bg-5 d-flex align-items-end">
                        <div class="tp-slider-2-shape">
                            <img class="tp-slider-2-shape-1" src="{{asset('assets/img/slider/2/shape/shape-1.png')}}" alt="">
                        </div>
                        <div class="container">
                            <div class="row align-items-center">
                                <div class="col-xl-6 col-lg-6 col-md-6">
                                    <div class="tp-slider-content-2">
                                        <span>Hàng mới về 2023</span>
                                        <h3 class="tp-slider-title-2">Bộ Sưu Tập Thời Trang</h3>
                                        <div class="tp-slider-btn-2">
                                            <a href="shop.html" class="tp-btn tp-btn-border">Đến cửa hàng ngay</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6">
                                    <div class="tp-slider-thumb-2-wrapper p-relative">
                                        <div class="tp-slider-thumb-2-shape">
                                            <img class="tp-slider-thumb-2-shape-1" src="{{asset('assets/img/slider/2/shape/shape-2.png')}}" alt="">
                                            <img class="tp-slider-thumb-2-shape-2" src="{{asset('assets/img/slider/2/shape/shape-3.png')}}" alt="">
                                        </div>
                                        <div class="tp-slider-thumb-2 text-end">
                                            <span class="tp-slider-thumb-2-gradient"></span>
                                            <img src="{{asset('assets/img/slider/2/slider-1.png')}}" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tp-slider-item-2 tp-slider-height-2 p-relative swiper-slide grey-bg-5 d-flex align-items-end">
                        <div class="tp-slider-2-shape">
                            <img class="tp-slider-2-shape-1" src="{{asset('assets/img/slider/2/shape/shape-1.png')}}" alt="">
                        </div>
                        <div class="container">
                            <div class="row align-items-center">
                                <div class="col-xl-6 col-lg-6 col-md-6">
                                    <div class="tp-slider-content-2">
                                        <span>Bán chạy nhất 2023</span>
                                        <h3 class="tp-slider-title-2">Bộ Sưu Tập Mùa Hạ</h3>
                                        <div class="tp-slider-btn-2">
                                            <a href="shop.html" class="tp-btn tp-btn-border">Đến cửa hàng ngay</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6">
                                    <div class="tp-slider-thumb-2-wrapper p-relative">
                                        <div class="tp-slider-thumb-2-shape">
                                            <img class="tp-slider-thumb-2-shape-1" src="{{asset('assets/img/slider/2/shape/shape-2.png')}}" alt="">
                                            <img class="tp-slider-thumb-2-shape-2" src="{{asset('assets/img/slider/2/shape/shape-3.png')}}" alt="">
                                        </div>
                                        <div class="tp-slider-thumb-2 text-end">
                                            <span class="tp-slider-thumb-2-gradient"></span>
                                            <img src="{{asset('assets/img/slider/2/slider-2.png')}}" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tp-slider-item-2 tp-slider-height-2 p-relative swiper-slide grey-bg-5 d-flex align-items-end">
                        <div class="tp-slider-2-shape">
                            <img class="tp-slider-2-shape-1" src="{{asset('assets/img/slider/2/shape/shape-1.png')}}" alt="">
                        </div>
                        <div class="container">
                            <div class="row align-items-center">
                                <div class="col-xl-6 col-lg-6 col-md-6">
                                    <div class="tp-slider-content-2">
                                        <span>Mùa đông đến rồi!</span>
                                        <h3 class="tp-slider-title-2">Những Thiết Kế Mới</h3>
                                        <div class="tp-slider-btn-2">
                                            <a href="shop.html" class="tp-btn tp-btn-border">Đến cửa hàng ngay</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6">
                                    <div class="tp-slider-thumb-2-wrapper p-relative">
                                        <div class="tp-slider-thumb-2-shape">
                                            <img class="tp-slider-thumb-2-shape-1" src="{{asset('assets/img/slider/2/shape/shape-2.png')}}" alt="">
                                            <img class="tp-slider-thumb-2-shape-2" src="{{asset('assets/img/slider/2/shape/shape-3.png')}}" alt="">
                                        </div>
                                        <div class="tp-slider-thumb-2 text-end">
                                            <span class="tp-slider-thumb-2-gradient"></span>
                                            <img src="{{asset('assets/img/slider/2/slider-3.png')}}" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tp-swiper-dot tp-slider-2-dot"></div>
            </div>
        </section>
        <!-- slider area end -->

        <!-- feature area start -->
        <section class="tp-feature-area tp-feature-border-radius pb-70" style="margin-top:4%; padding-bottom:0px;">
            <div class="container">
               <div class="row gx-1 gy-1 gy-xl-0">
                  <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                     <div class="tp-feature-item d-flex align-items-start">
                        <div class="tp-feature-icon mr-15">
                           <span>
                              <svg width="33" height="27" viewBox="0 0 33 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                                 <path d="M10.7222 1H31.5555V19.0556H10.7222V1Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                 <path d="M10.7222 7.94446H5.16667L1.00001 12.1111V19.0556H10.7222V7.94446Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                 <path d="M25.3055 26C23.3879 26 21.8333 24.4454 21.8333 22.5278C21.8333 20.6101 23.3879 19.0555 25.3055 19.0555C27.2232 19.0555 28.7778 20.6101 28.7778 22.5278C28.7778 24.4454 27.2232 26 25.3055 26Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                 <path d="M7.25001 26C5.33235 26 3.77778 24.4454 3.77778 22.5278C3.77778 20.6101 5.33235 19.0555 7.25001 19.0555C9.16766 19.0555 10.7222 20.6101 10.7222 22.5278C10.7222 24.4454 9.16766 26 7.25001 26Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                              </svg>
                           </span>
                        </div>
                        <div class="tp-feature-content">
                           <h3 class="tp-feature-title">Miễn phí giao hàng</h3>
                           <p>Áp dụng cho mọi đơn đặt hàng</p>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                     <div class="tp-feature-item d-flex align-items-start">
                        <div class="tp-feature-icon mr-15">
                           <span>
                              <svg width="21" height="35" viewBox="0 0 21 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                                 <path d="M10.3636 1V34" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                 <path d="M17.8636 7H6.61365C5.22126 7 3.8859 7.55312 2.90134 8.53769C1.91677 9.52226 1.36365 10.8576 1.36365 12.25C1.36365 13.6424 1.91677 14.9777 2.90134 15.9623C3.8859 16.9469 5.22126 17.5 6.61365 17.5H14.1136C15.506 17.5 16.8414 18.0531 17.826 19.0377C18.8105 20.0223 19.3636 21.3576 19.3636 22.75C19.3636 24.1424 18.8105 25.4777 17.826 26.4623C16.8414 27.4469 15.506 28 14.1136 28H1.36365" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                              </svg>
                           </span>
                        </div>
                        <div class="tp-feature-content">
                           <h3 class="tp-feature-title">Trả hàng & Hoàn tiền</h3>
                           <p>Hoàn tiền đảm bảo</p>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                     <div class="tp-feature-item d-flex align-items-start">
                        <div class="tp-feature-icon mr-15">
                           <span>
                              <svg width="31" height="30" viewBox="0 0 31 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                 <mask id="mask0_1211_583" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="31" height="30">
                                 <path fill-rule="evenodd" clip-rule="evenodd" d="M0 0H30.0024V29.9998H0V0Z" fill="white"/>
                                 </mask>
                                 <g mask="url(#mask0_1211_583)">
                                 <path fill-rule="evenodd" clip-rule="evenodd" d="M13.4168 27.1116C14.3017 27.9756 15.7266 27.9651 16.6056 27.0816L17.6885 26.0017C18.5285 25.1632 19.6894 24.6848 20.8728 24.6848H22.4178C23.6687 24.6848 24.6856 23.6678 24.6856 22.4184V20.875C24.6856 19.6736 25.1506 18.5441 25.9995 17.6937L27.0795 16.6122C27.519 16.1713 27.7544 15.5998 27.7529 14.9938C27.7514 14.3894 27.513 13.8209 27.0825 13.3919L26.001 12.309C25.1506 11.4525 24.6856 10.3246 24.6856 9.12318V7.58277C24.6856 6.33184 23.6687 5.3149 22.4178 5.3149H20.8758C19.6744 5.3149 18.545 4.84842 17.6945 4.00397L16.6116 2.91954C15.7101 2.02709 14.2717 2.03159 13.3913 2.91804L12.3128 3.99947C11.4519 4.84992 10.3225 5.3149 9.12553 5.3149H7.58212C6.33269 5.3164 5.31575 6.33334 5.31575 7.58277V9.12018C5.31575 10.3216 4.84927 11.451 4.00332 12.303L2.93839 13.3694C2.92789 13.3814 2.91739 13.3904 2.90689 13.4009C2.02644 14.2874 2.03094 15.7258 2.91739 16.6062L4.00032 17.6892C4.84927 18.5411 5.31575 19.6706 5.31575 20.872V22.4184C5.31575 23.6678 6.33119 24.6848 7.58212 24.6848H9.12253C10.3255 24.6863 11.4549 25.1527 12.3053 26.0002L13.3868 27.0786C13.3958 27.0891 13.4063 27.0996 13.4168 27.1116ZM14.9972 30.0002C13.8468 30.0002 12.6963 29.5652 11.8159 28.6923C11.8039 28.6803 11.7919 28.6683 11.7799 28.6548L10.715 27.5914C10.2905 27.1699 9.72352 26.9359 9.12055 26.9344H7.58164C5.09029 26.9344 3.06541 24.908 3.06541 22.4182V20.8717C3.06541 20.2688 2.82992 19.7033 2.40694 19.2773L1.32851 18.2004C-0.423392 16.4575 -0.444391 13.6197 1.27601 11.8498C1.28951 11.8363 1.30301 11.8228 1.31651 11.8093L2.40844 10.7143C2.82992 10.2899 3.06541 9.72139 3.06541 9.11993V7.58252C3.06541 5.09266 5.09029 3.06628 7.58014 3.06478H9.12505C9.72652 3.06478 10.2935 2.82929 10.724 2.40482L11.7964 1.32938C13.5498 -0.436017 16.4161 -0.445016 18.1845 1.31288L19.281 2.40932C19.7054 2.83079 20.2724 3.06478 20.8754 3.06478H22.4173C24.9086 3.06478 26.935 5.09116 26.935 7.58252V9.12293C26.935 9.72439 27.169 10.2929 27.5935 10.7203L28.6704 11.7988C29.5239 12.6462 29.9978 13.7787 30.0023 14.9861C30.0068 16.1935 29.5404 17.329 28.6899 18.1854L27.5905 19.2818C27.169 19.7063 26.935 20.2718 26.935 20.8747V22.4182C26.935 24.908 24.9086 26.9344 22.4188 26.9344H20.8724C20.2784 26.9344 19.6979 27.1744 19.2765 27.5929L18.1995 28.6698C17.3191 29.5562 16.1581 30.0002 14.9972 30.0002Z" fill="currentColor"/>
                                 </g>
                                 <path fill-rule="evenodd" clip-rule="evenodd" d="M11.145 19.9811C10.857 19.9811 10.569 19.8716 10.3501 19.6511C9.91058 19.2116 9.91058 18.5006 10.3501 18.0612L18.0596 10.3501C18.4991 9.91064 19.2115 9.91064 19.651 10.3501C20.0905 10.7896 20.0905 11.502 19.651 11.9415L11.94 19.6511C11.721 19.8716 11.433 19.9811 11.145 19.9811Z" fill="currentColor"/>
                                 <path fill-rule="evenodd" clip-rule="evenodd" d="M18.7544 20.2476C17.925 20.2476 17.247 19.5772 17.247 18.7477C17.247 17.9183 17.9115 17.2478 18.7409 17.2478H18.7544C19.5839 17.2478 20.2543 17.9183 20.2543 18.7477C20.2543 19.5772 19.5839 20.2476 18.7544 20.2476Z" fill="currentColor"/>
                                 <path fill-rule="evenodd" clip-rule="evenodd" d="M11.2548 12.748C10.4254 12.748 9.74744 12.0775 9.74744 11.2481C9.74744 10.4186 10.4119 9.74817 11.2413 9.74817H11.2548C12.0843 9.74817 12.7548 10.4186 12.7548 11.2481C12.7548 12.0775 12.0843 12.748 11.2548 12.748Z" fill="currentColor"/>
                              </svg>
                           </span>
                        </div>
                        <div class="tp-feature-content">
                           <h3 class="tp-feature-title">Giảm giá</h3>
                           <p>Vô vàn các sự kiện giảm giá</p>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                     <div class="tp-feature-item d-flex align-items-start">
                        <div class="tp-feature-icon mr-15">
                           <span>
                              <svg width="31" height="30" viewBox="0 0 31 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                 <path d="M1.5 24.3333V15C1.5 11.287 2.975 7.72602 5.60051 5.10051C8.22602 2.475 11.787 1 15.5 1C19.213 1 22.774 2.475 25.3995 5.10051C28.025 7.72602 29.5 11.287 29.5 15V24.3333" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                 <path d="M29.5 25.8889C29.5 26.714 29.1722 27.5053 28.5888 28.0888C28.0053 28.6722 27.214 29 26.3889 29H24.8333C24.0082 29 23.2169 28.6722 22.6335 28.0888C22.05 27.5053 21.7222 26.714 21.7222 25.8889V21.2222C21.7222 20.3971 22.05 19.6058 22.6335 19.0223C23.2169 18.4389 24.0082 18.1111 24.8333 18.1111H29.5V25.8889ZM1.5 25.8889C1.5 26.714 1.82778 27.5053 2.41122 28.0888C2.99467 28.6722 3.78599 29 4.61111 29H6.16667C6.99179 29 7.78311 28.6722 8.36656 28.0888C8.95 27.5053 9.27778 26.714 9.27778 25.8889V21.2222C9.27778 20.3971 8.95 19.6058 8.36656 19.0223C7.78311 18.4389 6.99179 18.1111 6.16667 18.1111H1.5V25.8889Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                              </svg>
                           </span>
                        </div>
                        <div class="tp-feature-content">
                           <h3 class="tp-feature-title">Hỗ trợ 24/7</h3>
                           <p>Liên hệ chúng tôi mọi lúc</p>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <!-- feature area end -->

        <!-- category area start -->
        <section class="tp-category-area pb-95 pt-95">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="tp-section-title-wrapper-2 text-center mb-50">
                        <span class="tp-section-title-pre-2">
                           
                           <svg width="82" height="22" viewBox="0 0 82 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path d="M81 14.5798C0.890564 -8.05914 -5.81154 0.0503902 5.00322 21" stroke="currentColor" stroke-opacity="0.3" stroke-width="2" stroke-miterlimit="3.8637" stroke-linecap="round"/>
                           </svg>
                        </span>
                            <h3 class="tp-section-title-2">Phổ biến trên cửa hàng Shofy.</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="tp-category-slider-2">
                            <div class="tp-category-slider-active-2 swiper-container mb-50">
                                <div class="swiper-wrapper">
                                    @foreach ($categories as $category)
                                    <div class="tp-category-item-2 p-relative z-index-1 text-center swiper-slide">
                                            <div class="tp-category-thumb-2">
                                                <a href="#">
                                                    <img src="{{url("IMG_TheLoai/". $category->anh_the_loai)}}" alt="">
                                                </a>
                                            </div>
                                            <div class="tp-category-content-2">
                                                <h3 class="tp-category-title-2">
                                                    <a>{{ $category->ten_the_loai }}</a>
                                                </h3>
                                                <div class="tp-category-btn-2">
                                                    <a href="{{ route('shop-list', ['category' => $category->ma_the_loai]) }}" class="tp-btn tp-btn-border" type="submit">Xem tất cả</a>
                                                </div>
                                            </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- category area end -->

        <!-- product area start -->
        <section class="tp-product-area pb-90">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="tp-section-title-wrapper-2 text-center mb-35">
                        <span class="tp-section-title-pre-2">
                           
                           <svg width="82" height="22" viewBox="0 0 82 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path d="M81 14.5798C0.890564 -8.05914 -5.81154 0.0503902 5.00322 21" stroke="currentColor" stroke-opacity="0.3" stroke-width="2" stroke-miterlimit="3.8637" stroke-linecap="round"/>
                           </svg>
                        </span>
                            <h3 class="tp-section-title-2">Một số sản phẩm của chúng tôi</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-allCollection" role="tabpanel" aria-labelledby="nav-allCollection-tab" tabindex="0">
                                <div class="row">
                                    @foreach($products as $product)
                                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                                            <div class="tp-product-item-2 mb-40">
                                                <div class="tp-product-thumb-2 p-relative z-index-1 fix w-img">
                                                    <a href="{{url('/product-detail/'.$product->ma_san_pham)}}">
                                                        <img src="{{url("IMG_SanPham/". $product->anh_dai_dien)}}" alt="" style="width: 336px; height: 357px;">
                                                    </a>
                                                </div>
                                                <div class="tp-product-content-2 pt-15">
                                                    <div class="tp-product-tag-2">
                                                        <a href="#">{{ $product->ten_the_loai }}</a>
                                                    </div>
                                                    <h3 class="tp-product-title-2">
                                                        <a href="{{url('/product-detail/'.$product->ma_san_pham)}}">{{$product->ten_san_pham}}</a>
                                                    </h3>
                                                    <div class="tp-product-rating-icon tp-product-rating-icon-2">
                                                        <span><i class="fa-solid fa-star"></i></span>
                                                        <span><i class="fa-solid fa-star"></i></span>
                                                        <span><i class="fa-solid fa-star"></i></span>
                                                        <span><i class="fa-solid fa-star"></i></span>
                                                        <span><i class="fa-solid fa-star"></i></span>
                                                    </div>
                                                    <div class="tp-product-price-wrapper-2">
                                                        <span class="tp-product-price-2 new-price">{{ number_format($product->don_gia_ban-$product->giam_gia, 0, ',', '.') }} VNĐ</span>
                                                        <span class="tp-product-price-2 old-price">{{ number_format($product->don_gia_ban, 0, ',', '.') }} VNĐ</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- product area end -->

        <!-- trending area start -->
        <section class="tp-trending-area pt-5 pb-50">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-6">
                        <div class="tp-trending-wrapper">
                            <div class="tp-section-title-wrapper-2 mb-50">
                           <span class="tp-section-title-pre-2">
                              Khám phá thêm nào
                              <svg width="82" height="22" viewBox="0 0 82 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                 <path d="M81 14.5798C0.890564 -8.05914 -5.81154 0.0503902 5.00322 21" stroke="currentColor" stroke-opacity="0.3" stroke-width="2" stroke-miterlimit="3.8637" stroke-linecap="round"/>
                              </svg>
                           </span>
                                <h3 class="tp-section-title-2">Hàng mới về</h3>
                            </div>
                            <div class="tp-trending-slider">
                                <div class="tp-trending-slider-active swiper-container">
                                    <div class="swiper-wrapper">
                                        @foreach ($lastestProducts as $lastestProduct)
                                        <div class="tp-trending-item swiper-slide">
                                            <div class="tp-product-item-2">
                                                <div class="tp-product-thumb-2 p-relative z-index-1 fix w-img">
                                                    <a href="{{url('/product-detail/'.$lastestProduct->ma_san_pham)}}">
                                                        <img src="{{url("IMG_SanPham/". $product->anh_dai_dien)}}" alt="">
                                                    </a>
                                                </div>
                                                <div class="tp-product-content-2 pt-15">
                                                    <div class="tp-product-tag-2">
                                                        <a href="#">{{ $lastestProduct->ten_the_loai }}</a>
                                                    </div>
                                                    <h3 class="tp-product-title-2">
                                                        <a href="{{url('/product-detail/'.$lastestProduct->ma_san_pham)}}">{{ $lastestProduct->ten_san_pham }}</a>
                                                    </h3>
                                                    <div class="tp-product-rating-icon tp-product-rating-icon-2">
                                                        <span><i class="fa-solid fa-star"></i></span>
                                                        <span><i class="fa-solid fa-star"></i></span>
                                                        <span><i class="fa-solid fa-star"></i></span>
                                                        <span><i class="fa-solid fa-star"></i></span>
                                                        <span><i class="fa-solid fa-star"></i></span>
                                                    </div>
                                                    <div class="tp-product-price-wrapper-2">
                                                        <span class="tp-product-price-2">{{ $lastestProduct->don_gia_ban }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="tp-trending-slider-dot tp-swiper-dot text-center mt-45"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-5 col-md-8 col-sm-10">
                        <div class="tp-trending-banner p-relative ml-35">
                            <div class="tp-trending-banner-thumb w-img include-bg" data-background="{{asset('assets/img/product/trending/banner/trending-banner.jpg')}}"></div>
                            <div class="tp-trending-banner-content">
                                <h3 class="tp-trending-banner-title">
                                    <a href="#">Áo dài tay</a>
                                </h3>
                                <div class="tp-trending-banner-btn">
                                    <a href="#" class="tp-btn tp-btn-border tp-btn-border-white tp-btn-border-white-sm">
                                        Tìm hiểm thêm
                                        <svg width="17" height="15" viewBox="0 0 17 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M16 7.5L1 7.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M9.9502 1.47541L16.0002 7.49941L9.9502 13.5244" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- trending area end -->

        <!-- blog area start -->
        <section class="tp-blog-area pt-110 pb-120">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="tp-section-title-wrapper-2 mb-50 text-center">
                        <span class="tp-section-title-pre-2">
                           Blog và Tin tức của chúng tôi
                           <svg width="82" height="22" viewBox="0 0 82 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path d="M81 14.5798C0.890564 -8.05914 -5.81154 0.0503902 5.00322 21" stroke="currentColor" stroke-opacity="0.3" stroke-width="2" stroke-miterlimit="3.8637" stroke-linecap="round"/>
                           </svg>
                        </span>
                            <h3 class="tp-section-title-2">Tin tức và Bài đăng mới nhất</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach ($news as $new)
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="tp-blog-item-2 mb-40">
                            <div class="tp-blog-thumb-2 p-relative fix">
                                <a href="blog-details.html">
                                    <img src="{{ $new->anh_dai_dien }}" alt="">
                                </a>
                                <div class="tp-blog-meta-date-2">
                                    <span>{{ $new->updated_at }}</span>
                                </div>
                            </div>
                            <div class="tp-blog-content-2 has-thumbnail">
                                <!-- <div class="tp-blog-meta-2">
                              <span>
                                 <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12.636 8.14182L8.14808 12.6297C8.03182 12.7461 7.89375 12.8384 7.74178 12.9014C7.58981 12.9644 7.42691 12.9969 7.26239 12.9969C7.09788 12.9969 6.93498 12.9644 6.78301 12.9014C6.63104 12.8384 6.49297 12.7461 6.37671 12.6297L1 7.25926V1H7.25926L12.636 6.37671C12.8691 6.61126 13 6.92854 13 7.25926C13 7.58998 12.8691 7.90727 12.636 8.14182V8.14182Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M4.12964 4.12988H4.13694" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                 </svg>
                              </span>
                                    <a href="#">Fashion,  </a>
                                    <a href="#">Lift Style, </a>
                                    <a href="#">News</a>
                                </div> -->
                                <h3 class="tp-blog-title-2">
                                    <a href="#">{{ $new->tieu_de }}</a>
                                </h3>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="tp-blog-more-2 mt-10 text-center">
                            <a href="blog-grid.html" class="tp-btn tp-btn-border tp-btn-border-sm">Khám phá thêm</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- blog area end -->

        <!-- instagram area start -->
        <section class="tp-instagram-area">
            <div class="container-fluid pl-20 pr-20">
                <div class="row row-cols-lg-5 row-cols-sm-2 row-cols-1 gx-2 gy-2 gy-lg-0">
                    <div class="col">
                        <div class="tp-instagram-item-2 w-img">
                            <img src="{{asset('assets/img/instagram/2/insta-1.jpg')}}" alt="">
                            <div class="tp-instagram-icon-2">
                                <a href="assets/img/instagram/2/insta-1.jpg')}}" class="popup-image"><i class="fa-brands fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="tp-instagram-item-2 w-img">
                            <img src="{{asset('assets/img/instagram/2/insta-2.jpg')}}" alt="">
                            <div class="tp-instagram-icon-2">
                                <a href="assets/img/instagram/2/insta-2.jpg'" class="popup-image"><i class="fa-brands fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="tp-instagram-banner text-center">
                            <div class="tp-instagram-banner-icon mb-40">
                                <a href="#">
                                    <img src="{{asset('assets/img/instagram/2/insta-icon.png')}}" alt="">
                                </a>
                            </div>
                            <div class="tp-instagram-banner-content">
                                <span>Theo dõi chúng tôi trên</span>
                                <a href="https://www.instagram.com/tvhungpv/">Instagram</a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="tp-instagram-item-2 w-img">
                            <img src="{{asset('assets/img/instagram/2/insta-3.jpg')}}" alt="">
                            <div class="tp-instagram-icon-2">
                                <a href="assets/img/instagram/2/insta-3.jpg')}}" class="popup-image"><i class="fa-brands fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="tp-instagram-item-2 w-img">
                            <img src="{{asset('assets/img/instagram/2/insta-4.jpg')}}" alt="">
                            <div class="tp-instagram-icon-2">
                                <a href="assets/img/instagram/2/insta-4.jpg')}}" class="popup-image"><i class="fa-brands fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- instagram area end -->
    </main>
@endsection