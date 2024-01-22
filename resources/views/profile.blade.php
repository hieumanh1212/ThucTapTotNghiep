@extends('layout.client.layout')

@section('content')
<main>

    <!-- profile area start -->
    <section class="profile__area pt-120 pb-120">
        <div class="container">
            <div class="profile__inner p-relative">
                <div class="profile__shape">
                    <img class="profile__shape-1" src="assets/img/login/laptop.png" alt="">
                    <img class="profile__shape-2" src="assets/img/login/man.png" alt="">
                    <img class="profile__shape-3" src="assets/img/login/shape-1.png" alt="">
                    <img class="profile__shape-4" src="assets/img/login/shape-2.png" alt="">
                    <img class="profile__shape-5" src="assets/img/login/shape-3.png" alt="">
                    <img class="profile__shape-6" src="assets/img/login/shape-4.png" alt="">
                </div>
                <div class="row">
                    <div class="col-xxl-4 col-lg-4">
                        <div class="profile__tab mr-40">
                            <nav>
                                <div class="nav nav-tabs tp-tab-menu flex-column" id="profile-tab" role="tablist">
                                    <button class="nav-link active" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false"><span><i class="fa-regular fa-user-pen"></i></span>Hồ sơ </button>
                                    <button class="nav-link" id="nav-information-tab" data-bs-toggle="tab" data-bs-target="#nav-information" type="button" role="tab" aria-controls="nav-information" aria-selected="false"><span><i class="fa-regular fa-circle-info"></i></span> Thông tin </button>
                                    <button class="nav-link" id="nav-password-tab" data-bs-toggle="tab" data-bs-target="#nav-password" type="button" role="tab" aria-controls="nav-password" aria-selected="false"><span><i class="fa-regular fa-lock"></i></span> Đổi mật khẩu </button>
                                    <button class="nav-link" id="nav-orderwait-tab" data-bs-toggle="tab" data-bs-target="#nav-orderwait" type="button" role="tab" aria-controls="nav-order" aria-selected="false"><span><i class="fa-light fa-clipboard-list-check"></i></span> Đơn hàng chờ xác nhận </button>
                                    <button class="nav-link" id="nav-ordershipping-tab" data-bs-toggle="tab" data-bs-target="#nav-ordershipping" type="button" role="tab" aria-controls="nav-order" aria-selected="false"><span><i class="fa-light fa-clipboard-list-check"></i></span> Đơn hàng đang giao </button>
                                    <button class="nav-link" id="nav-orderhistory-tab" data-bs-toggle="tab" data-bs-target="#nav-orderhistory" type="button" role="tab" aria-controls="nav-order" aria-selected="false"><span><i class="fa-light fa-clipboard-list-check"></i></span> Lịch sử đơn hàng </button>
                                    <button class="nav-link" id="nav-orderabort-tab" data-bs-toggle="tab" data-bs-target="#nav-orderabort" type="button" role="tab" aria-controls="nav-order" aria-selected="false"><span><i class="fa-light fa-clipboard-list-check"></i></span> Đơn hàng đã hủy </button>
                                    <span id="marker-vertical" class="tp-tab-line d-none d-sm-inline-block"></span>
                                </div>
                            </nav>
                        </div>
                    </div>
                    <div class="col-xxl-8 col-lg-8">
                        <div class="profile__tab-content">
                            <div class="tab-content" id="profile-tabContent">
                                <!-- Tab hồ sơ -->
                                <div class="tab-pane fade show active" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                    <div class="profile__main">
                                        <div class="profile__main-top pb-80">
                                            <div class="row align-items-center">
                                                <div class="col-md-6">
                                                    <div class="profile__main-inner d-flex flex-wrap align-items-center">
                                                        <div class="profile__main-content">
                                                            <h4 class="profile__main-title">Chào mừng {{ $profile->ten_nhan_vien ?? $profile->ten_khach_hang }}</h4>
                                                            <p>Bạn là một <span style="font-weight: bold;">{{ session('loggedInUser.ten_loai_tai_khoan') }}</span></p>
                                                            <input id="userid" name="userid" type="hidden" value="{{ $profile->ma_nhan_vien ?? $profile->ma_khach_hang }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="profile__main-logout text-sm-end">
                                                        <a href="{{ route('logout') }}" class="tp-logout-btn">Đăng xuất</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="profile__main-info">
                                            <div class="row gx-3">
                                                <div class="col-md-3 col-sm-6">
                                                    <div class="profile__main-info-item">
                                                        <div class="profile__main-info-icon">
                                                            <span>
                                                                <span class="profile-icon-count profile-order">99</span>
                                                                <svg viewBox="0 0 512 512">
                                                                    <path d="M472.916,224H448.007a24.534,24.534,0,0,0-23.417-18H398V140.976a6.86,6.86,0,0,0-3.346-6.062L207.077,26.572a6.927,6.927,0,0,0-6.962,0L12.48,134.914A6.981,6.981,0,0,0,9,140.976V357.661a7,7,0,0,0,3.5,6.062L200.154,472.065a7,7,0,0,0,3.5.938,7.361,7.361,0,0,0,3.6-.938L306,415.108v41.174A29.642,29.642,0,0,0,335.891,486H472.916A29.807,29.807,0,0,0,503,456.282v-202.1A30.2,30.2,0,0,0,472.916,224Zm-48.077-4A10.161,10.161,0,0,1,435,230.161v.678A10.161,10.161,0,0,1,424.839,241H384.161A10.161,10.161,0,0,1,374,230.839v-.678A10.161,10.161,0,0,1,384.161,220ZM203.654,40.717l77.974,45.018L107.986,185.987,30.013,140.969ZM197,453.878,23,353.619V153.085L197,253.344Zm6.654-212.658-81.668-47.151L295.628,93.818,377.3,140.969ZM306,254.182V398.943l-95,54.935V253.344L384,153.085V206h.217A24.533,24.533,0,0,0,360.8,224H335.891A30.037,30.037,0,0,0,306,254.182Zm183,202.1A15.793,15.793,0,0,1,472.916,472H335.891A15.628,15.628,0,0,1,320,456.282v-202.1A16.022,16.022,0,0,1,335.891,238h25.182a23.944,23.944,0,0,0,23.144,17H424.59a23.942,23.942,0,0,0,23.143-17h25.183A16.186,16.186,0,0,1,489,254.182Z" />
                                                                    <path d="M343.949,325h7.327a7,7,0,1,0,0-14H351V292h19.307a6.739,6.739,0,0,0,6.655,4.727A7.019,7.019,0,0,0,384,289.743v-4.71A7.093,7.093,0,0,0,376.924,278H343.949A6.985,6.985,0,0,0,337,285.033v32.975A6.95,6.95,0,0,0,343.949,325Z" />
                                                                    <path d="M344,389h33a7,7,0,0,0,7-7V349a7,7,0,0,0-7-7H344a7,7,0,0,0-7,7v33A7,7,0,0,0,344,389Zm7-33h19v19H351Z" />
                                                                    <path d="M351.277,439H351V420h18.929a7.037,7.037,0,0,0,14.071.014v-6.745A7.3,7.3,0,0,0,376.924,406H343.949A7.191,7.191,0,0,0,337,413.269v32.975A6.752,6.752,0,0,0,343.949,453h7.328a7,7,0,1,0,0-14Z" />
                                                                    <path d="M393.041,286.592l-20.5,20.5-6.236-6.237a7,7,0,1,0-9.9,9.9l11.187,11.186a7,7,0,0,0,9.9,0l25.452-25.452a7,7,0,0,0-9.9-9.9Z" />
                                                                    <path d="M393.041,415.841l-20.5,20.5-6.236-6.237a7,7,0,1,0-9.9,9.9l11.187,11.186a7,7,0,0,0,9.9,0l25.452-25.452a7,7,0,0,0-9.9-9.9Z" />
                                                                    <path d="M464.857,295H420.891a7,7,0,0,0,0,14h43.966a7,7,0,0,0,0-14Z" />
                                                                    <path d="M464.857,359H420.891a7,7,0,0,0,0,14h43.966a7,7,0,0,0,0-14Z" />
                                                                    <path d="M464.857,423H420.891a7,7,0,0,0,0,14h43.966a7,7,0,0,0,0-14Z" />
                                                                </svg>
                                                            </span>
                                                        </div>
                                                        <h4 class="profile__main-info-title">Đơn hàng</h4>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-sm-6">
                                                    <div class="profile__main-info-item">
                                                        <div class="profile__main-info-icon">
                                                            <span>
                                                                <span class="profile-icon-count profile-wishlist">99</span>
                                                                <svg viewBox="0 -20 480 480" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="m348 0c-43 .0664062-83.28125 21.039062-108 56.222656-24.71875-35.183594-65-56.1562498-108-56.222656-70.320312 0-132 65.425781-132 140 0 72.679688 41.039062 147.535156 118.6875 216.480469 35.976562 31.882812 75.441406 59.597656 117.640625 82.625 2.304687 1.1875 5.039063 1.1875 7.34375 0 42.183594-23.027344 81.636719-50.746094 117.601563-82.625 77.6875-68.945313 118.726562-143.800781 118.726562-216.480469 0-74.574219-61.679688-140-132-140zm-108 422.902344c-29.382812-16.214844-224-129.496094-224-282.902344 0-66.054688 54.199219-124 116-124 41.867188.074219 80.460938 22.660156 101.03125 59.128906 1.539062 2.351563 4.160156 3.765625 6.96875 3.765625s5.429688-1.414062 6.96875-3.765625c20.570312-36.46875 59.164062-59.054687 101.03125-59.128906 61.800781 0 116 57.945312 116 124 0 153.40625-194.617188 266.6875-224 282.902344zm0 0" />
                                                                </svg>
                                                            </span>
                                                        </div>
                                                        <h4 class="profile__main-info-title">Yêu thích</h4>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-sm-6">
                                                    <div class="profile__main-info-item">
                                                        <div class="profile__main-info-icon">
                                                            <span>
                                                                <span class="profile-icon-count profile-wishlist">99</span>
                                                                <svg viewBox="0 0 512 512">
                                                                    <path d="m352.742 291.476h-263.963l228.58-145.334a6 6 0 0 0 1.844-8.284l-22.647-35.618a36.285 36.285 0 0 0 -50.033-11.14l-32.165 20.451 2.548-12.191a34.314 34.314 0 1 0 -66.987-14.914l-16.71 75.054-55.951-12.454a34.315 34.315 0 0 0 -21 65.026l-34.458 21.91a36.285 36.285 0 0 0 -11.14 50.032l22.647 35.619a6 6 0 0 0 8.283 1.845l21.08-13.4v151.888a36.285 36.285 0 0 0 36.246 36.244h223.584a36.285 36.285 0 0 0 36.244-36.244v-162.49a6 6 0 0 0 -6.002-6zm-99.78-190.248a24.084 24.084 0 0 1 12.961-3.794 24.481 24.481 0 0 1 5.316.587 24.09 24.09 0 0 1 15.19 10.658l19.428 30.555-94.5 60.086-32.436-51.014zm-91.33-14.173a22.314 22.314 0 1 1 43.545 9.775l-4.926 23.564-53.667 34.249zm7.16 67.69 32.436 51.014-54.76 34.816-32.435-51.014zm-117.821 37.768a22.314 22.314 0 0 1 23.679-33.754l48.485 10.794-53.822 33.739-4.362-.972a22.168 22.168 0 0 1 -13.98-9.807zm-10.755 115.619-19.427-30.556a24.272 24.272 0 0 1 7.45-33.467l75.667-48.109 32.435 51.014zm116.353 176.078h-57.653a24.272 24.272 0 0 1 -24.244-24.244v-156.49h81.9zm76.264 0h-64.264v-180.734h64.264zm113.909-24.244a24.272 24.272 0 0 1 -24.242 24.244h-77.667v-180.734h101.909z" />
                                                                    <path d="m419.833 236.971 2.87-16.735a6 6 0 0 0 -8.703-6.325l-15.028 7.9-15.029-7.9a6 6 0 0 0 -8.706 6.325l2.87 16.735-12.158 11.85a6 6 0 0 0 3.325 10.235l16.8 2.442 7.514 15.225a6 6 0 0 0 10.762 0l7.513-15.225 16.8-2.442a6 6 0 0 0 3.325-10.235zm-12.817 13.1a6 6 0 0 0 -4.518 3.282l-3.529 7.152-3.53-7.152a6 6 0 0 0 -4.517-3.282l-7.894-1.147 5.712-5.567a6 6 0 0 0 1.726-5.311l-1.349-7.862 7.06 3.711a5.994 5.994 0 0 0 5.584 0l7.059-3.711-1.348 7.862a6 6 0 0 0 1.725 5.311l5.712 5.567z" />
                                                                    <path d="m488.841 154.3-16.5-4.01-6.051-15.863a6 6 0 0 0 -10.714-1.012l-8.911 14.453-16.957.853a6 6 0 0 0 -4.272 9.876l10.991 12.941-4.427 16.39a6 6 0 0 0 8.073 7.115l15.7-6.454 14.227 9.277a6 6 0 0 0 9.261-5.479l-1.285-16.93 13.213-10.657a6 6 0 0 0 -2.348-10.5zm-20.856 13.8a6 6 0 0 0 -2.216 5.125l.6 7.953-6.681-4.359a6 6 0 0 0 -5.559-.524l-7.376 3.032 2.08-7.7a6 6 0 0 0 -1.219-5.449l-5.163-6.079 7.966-.4a6 6 0 0 0 4.807-2.842l4.185-6.789 2.842 7.452a6 6 0 0 0 4.189 3.691l7.751 1.884z" />
                                                                    <path d="m400.6 56.763-4.429 16.39a6 6 0 0 0 8.073 7.116l15.7-6.455 14.221 9.279a6 6 0 0 0 9.261-5.48l-1.285-16.93 13.216-10.658a6 6 0 0 0 -2.348-10.5l-16.5-4.009-6.05-15.864a6 6 0 0 0 -10.714-1.01l-8.91 14.452-16.958.852a6 6 0 0 0 -4.273 9.876zm13.991-11.844a6 6 0 0 0 4.806-2.843l4.186-6.789 2.842 7.452a6 6 0 0 0 4.189 3.692l7.75 1.883-6.208 5.006a6 6 0 0 0 -2.217 5.125l.6 7.954-6.681-4.359a6 6 0 0 0 -5.559-.524l-7.376 3.032 2.08-7.7a6 6 0 0 0 -1.219-5.45l-5.163-6.08z" />
                                                                    <path d="m291.746 237.835c-13.546 8.525-20.164 18.855-20.439 19.291a6 6 0 0 0 10.134 6.427c.9-1.4 22.609-34.215 69.86-22.527a6 6 0 0 0 2.883-11.648c-29.072-7.193-50.001.628-62.438 8.457z" />
                                                                    <path d="m405.6 174.293a6 6 0 0 0 4.6-11.084c-42.714-17.727-73.759-4.452-92.28 9.808a112.488 112.488 0 0 0 -29.868 35.246 6 6 0 1 0 10.748 5.337 101.191 101.191 0 0 1 26.44-31.075c23.288-17.925 50.325-20.697 80.36-8.232z" />
                                                                    <path d="m338.178 129.844a6 6 0 0 0 3.862 7.555 90.163 90.163 0 0 0 25.438 3.676c10.034 0 21.623-1.811 32.015-7.971 13.6-8.058 22.32-21.787 25.934-40.8a6 6 0 1 0 -11.789-2.24c-2.938 15.461-9.738 26.46-20.211 32.69-19.921 11.853-47.267 3.367-47.7 3.229a6 6 0 0 0 -7.549 3.861z" />
                                                                    <path d="m258.867 284.873a10.806 10.806 0 1 0 -10.805-10.806 10.819 10.819 0 0 0 10.805 10.806zm0-12a1.195 1.195 0 1 1 -1.194 1.194 1.2 1.2 0 0 1 1.194-1.194z" />
                                                                    <path d="m343.887 88.873a10.806 10.806 0 1 0 -10.806-10.806 10.818 10.818 0 0 0 10.806 10.806zm0-12a1.195 1.195 0 1 1 -1.195 1.194 1.2 1.2 0 0 1 1.195-1.194z" />
                                                                    <path d="m496.194 80.633a10.806 10.806 0 1 0 10.806 10.805 10.817 10.817 0 0 0 -10.806-10.805zm0 12a1.195 1.195 0 1 1 1.195-1.195 1.2 1.2 0 0 1 -1.195 1.195z" />
                                                                    <path d="m254.444 224.027a10.806 10.806 0 1 0 -10.8 10.806 10.817 10.817 0 0 0 10.8-10.806zm-10.8 1.2a1.195 1.195 0 1 1 1.194-1.2 1.2 1.2 0 0 1 -1.199 1.195z" />
                                                                    <path d="m478.4 230.812a10.806 10.806 0 1 0 10.806 10.806 10.818 10.818 0 0 0 -10.806-10.806zm0 12a1.194 1.194 0 1 1 1.195-1.194 1.2 1.2 0 0 1 -1.195 1.194z" />
                                                                </svg>
                                                            </span>
                                                        </div>
                                                        <h4 class="profile__main-info-title">Khuyến mại</h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Tab thông tin -->
                                <div class="tab-pane fade" id="nav-information" role="tabpanel" aria-labelledby="nav-information-tab">
                                    <div class="profile__info">
                                        <h3 class="profile__info-title">Thông tin cá nhân</h3>
                                        <div class="profile__info-content">
                                            <form action="#" method="POST" id="profile_form" enctype="multipart/form-data">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-xxl-12" style="margin-bottom: 15px;">
                                                        <div class="profile__main-thumb" style="text-align: center;">
                                                            <img id="profile_picture_preview" src="{{ ($profile->anh_dai_dien) ? $profile->anh_dai_dien:'assets/img/users/anonymous.jpg' }}" alt="">
                                                            <div class="profile__main-thumb-edit">
                                                                <input id="profile_picture" name="profile_picture" class="profile-img-popup" type="file">
                                                                <label for="profile_picture"><i class="fa-light fa-camera"></i></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xxl-6 col-md-6">
                                                        <div class="profile__input-box">
                                                            <div class="profile__input">
                                                                <input id="profile_name" name="profile_name" type="text" placeholder="Nhập tên của bạn" value="{{ trim($profile->ten_nhan_vien ?: $profile->ten_khach_hang) }}">
                                                                <span>
                                                                    <svg width="17" height="19" viewBox="0 0 17 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M9 9C11.2091 9 13 7.20914 13 5C13 2.79086 11.2091 1 9 1C6.79086 1 5 2.79086 5 5C5 7.20914 6.79086 9 9 9Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                        <path d="M15.5 17.6C15.5 14.504 12.3626 12 8.5 12C4.63737 12 1.5 14.504 1.5 17.6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                    </svg>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-xxl-6 col-md-6">
                                                        <div class="profile__input-box">
                                                            <div class="profile__input">
                                                                <input id="profile_email" name="profile_email" type="email" placeholder="" value="{{ trim($profile->tai_khoan) }}" readonly>
                                                                <span>
                                                                    <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M13 14.6H5C2.6 14.6 1 13.4 1 10.6V5C1 2.2 2.6 1 5 1H13C15.4 1 17 2.2 17 5V10.6C17 13.4 15.4 14.6 13 14.6Z" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                                                        <path d="M13 5.3999L10.496 7.3999C9.672 8.0559 8.32 8.0559 7.496 7.3999L5 5.3999" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                                                    </svg>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xxl-6 col-md-6">
                                                        <div class="profile__input-box">
                                                            <div class="profile__input">
                                                                <input id="profile_date" name="profile_date" type="date" placeholder="Nhập ngày tháng năm sinh" value="{{ $profile->ngay_sinh }}">
                                                                <span>
                                                                    <i class="fa-solid fa-cake-candles"></i>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xxl-6 col-md-6">
                                                        <div class="profile__input-box">
                                                            <div class="profile__input">
                                                                <input id="profile_address" name="profile_address" type="text" placeholder="Nhập địa chỉ" value="{{ $profile->dia_chi }}">
                                                                <span>
                                                                    <svg width="16" height="18" viewBox="0 0 16 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M7.99377 10.1461C9.39262 10.1461 10.5266 9.0283 10.5266 7.64946C10.5266 6.27061 9.39262 5.15283 7.99377 5.15283C6.59493 5.15283 5.46094 6.27061 5.46094 7.64946C5.46094 9.0283 6.59493 10.1461 7.99377 10.1461Z" stroke="currentColor" stroke-width="1.5" />
                                                                        <path d="M1.19707 6.1933C2.79633 -0.736432 13.2118 -0.72843 14.803 6.2013C15.7365 10.2663 13.1712 13.7072 10.9225 15.8357C9.29079 17.3881 6.70924 17.3881 5.06939 15.8357C2.8288 13.7072 0.263493 10.2583 1.19707 6.1933Z" stroke="currentColor" stroke-width="1.5" />
                                                                    </svg>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xxl-6 col-md-6">
                                                        <div class="profile__input-box">
                                                            <div class="profile__input">
                                                                <input id="profile_phone" name="profile_phone" type="text" placeholder="Nhập số điện thoại" value="{{ $profile->dien_thoai }}">
                                                                <span>
                                                                    <svg width="15" height="18" viewBox="0 0 15 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M13.9148 5V13C13.9148 16.2 13.1076 17 9.87892 17H5.03587C1.80717 17 1 16.2 1 13V5C1 1.8 1.80717 1 5.03587 1H9.87892C13.1076 1 13.9148 1.8 13.9148 5Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                        <path opacity="0.4" d="M9.08026 3.80054H5.85156" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                        <path opacity="0.4" d="M7.45425 14.6795C8.14522 14.6795 8.70537 14.1243 8.70537 13.4395C8.70537 12.7546 8.14522 12.1995 7.45425 12.1995C6.76327 12.1995 6.20312 12.7546 6.20312 13.4395C6.20312 14.1243 6.76327 14.6795 7.45425 14.6795Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                    </svg>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xxl-6 col-md-6">
                                                        <div class="profile__input-box">
                                                            <div class="profile__input">
                                                                <select id="profile_gender" name="profile_gender">
                                                                    <option value="null" @if ($profile->gioi_tinh===null) selected @endif>Giới tính</option>
                                                                    <option value="0" @if ($profile->gioi_tinh===0) selected @endif>Nam</option>
                                                                    <option value="1" @if ($profile->gioi_tinh===1) selected @endif>Nữ</option>
                                                                    <option value="2" @if ($profile->gioi_tinh===2) selected @endif>Khác</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xxl-12" style="margin-left: 1%;">
                                                        <div id="update-profile-alert" class="alert" style="display: none;"></div>
                                                    </div>
                                                    <div class="col-xxl-12">
                                                        <div class="profile__btn" style="text-align: center;">
                                                            <button type="submit" class="tp-btn" id="profile_button">Cập nhật thông tin</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- Tab đổi mật khẩu -->
                                <div class="tab-pane fade" id="nav-password" role="tabpanel" aria-labelledby="nav-password-tab">
                                    <div class="profile__password">
                                        @if (!session('loggedInUser.mat_khau'))
                                        <form action="#" method="POST" id="change_password_form">
                                            @csrf
                                            <div class="col-xxl-12">
                                                <div id="change-password-third-party-alert" class="alert alert-warning">Bạn đang đăng nhập bằng tài khoản của bên thứ ba. Hãy thêm một mật khẩu để thuận tiện cho việc đăng nhập sau này.</div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xxl-6 col-md-6">
                                                    <div class="tp-profile-input-box">
                                                        <div class="tp-profile-input">
                                                            <input name="new_pass" id="new_pass" type="password">
                                                        </div>
                                                        <div class="tp-profile-input-title">
                                                            <label for="new_pass">Mật khẩu mới</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-6 col-md-6">
                                                    <div class="tp-profile-input-box">
                                                        <div class="tp-profile-input">
                                                            <input name="con_new_pass" id="con_new_pass" type="password">
                                                        </div>
                                                        <div class="tp-profile-input-title">
                                                            <label for="con_new_pass">Xác nhận mật khẩu</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-12">
                                                    <div id="change-password-alert" class="alert" style="display: none;"></div>
                                                </div>
                                                <div class="col-xxl-6 col-md-6">
                                                    <div class="profile__btn">
                                                        <button id="change_password_button" type="submit" class="tp-btn">Đổi mật khẩu</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        @else
                                        <form action="#" method="POST" id="change_password_form">
                                            @csrf
                                            <div class="row">
                                                <div class="col-xxl-12">
                                                    <div class="tp-profile-input-box">
                                                        <div class="tp-contact-input">
                                                            <input name="old_pass" id="old_pass" type="password">
                                                        </div>
                                                        <div class="tp-profile-input-title">
                                                            <label for="old_pass">Mật khẩu hiện tại</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-6 col-md-6">
                                                    <div class="tp-profile-input-box">
                                                        <div class="tp-profile-input">
                                                            <input name="new_pass" id="new_pass" type="password">
                                                        </div>
                                                        <div class="tp-profile-input-title">
                                                            <label for="new_pass">Mật khẩu mới</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-6 col-md-6">
                                                    <div class="tp-profile-input-box">
                                                        <div class="tp-profile-input">
                                                            <input name="con_new_pass" id="con_new_pass" type="password">
                                                        </div>
                                                        <div class="tp-profile-input-title">
                                                            <label for="con_new_pass">Xác nhận mật khẩu</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-12">
                                                    <div id="change-password-alert" class="alert" style="display: none;"></div>
                                                </div>
                                                <div class="col-xxl-6 col-md-6">
                                                    <div class="profile__btn">
                                                        <button id="change_password_button" type="submit" class="tp-btn">Đổi mật khẩu</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        @endif
                                    </div>
                                </div>
                                <!-- Tab đơn hàng chờ xác nhận -->
                                <div class="tab-pane fade" id="nav-orderwait" role="tabpanel" aria-labelledby="nav-orderwait-tab">
                                    <div class="profile__ticket table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Mã hóa đơn</th>
                                                    <th scope="col">Ngày tạo</th>
                                                    <th scope="col">Tổng tiền</th>
                                                    <th scope="col">Thanh toán</th>
                                                    <th scope="col">Tình trạng</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($hoadonchoxacnhan as $hoadoncho)
                                                <tr style="background-color: white; transition: background-color 0.3s ease; cursor: pointer;" onmouseover="this.style.backgroundColor='lightgray'" onmouseout="this.style.backgroundColor='white'" 
                                                onclick="showModal('{{ $hoadoncho->ma_hoa_don_ban }}', 'Chờ xác nhận', 
                                                '{{ $hoadoncho->ten_khach_hang }}', '{{ $hoadoncho->email }}', 
                                                '{{ $hoadoncho->so_dien_thoai_nguoi_nhan }}', '{{ $hoadoncho->dia_chi_giao_hang }}')">
                                                    <!-- Các thông tin khác của hóa đơn -->
                                                    <td>{{ $hoadoncho->ma_hoa_don_ban }}</td>
                                                    <td>{{ $hoadoncho->ngay_tao_hoa_don }}</td>
                                                    <td>{{ $hoadoncho->tong_tien_hdb }}</td>
                                                    @if($hoadoncho->trang_thai_thanh_toan == 1)
                                                    <td data-info="status done">Đã thanh toán</td>
                                                    @else
                                                    <td data-info="status reply">Chưa thanh toán</td>
                                                    @endif
                                                    <td data-info="status pending">{{ $hoadoncho->tinh_trang_hoa_don }}</td>
                                                    <td>
                                                        <button class="btn btn-danger" onclick="huyHoaDon('{{ $hoadoncho->ma_hoa_don_ban }}', event)">Hủy</button>
                                                    </td>
                                                </tr>
                                                @endforeach



                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- Tab lịch sử đơn hàng -->
                                <div class="tab-pane fade" id="nav-orderhistory" role="tabpanel" aria-labelledby="nav-orderhistory-tab">
                                    <div class="profile__ticket table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Mã hóa đơn</th>
                                                    <th scope="col">Ngày tạo</th>
                                                    <th scope="col">Tổng tiền</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($lichsudonhang as $lichsudon)
                                                <tr style="background-color: white; transition: background-color 0.3s ease; cursor: pointer;" onmouseover="this.style.backgroundColor='lightgray'" onmouseout="this.style.backgroundColor='white'" 
                                                onclick="showModal('{{ $lichsudon->ma_hoa_don_ban }}', 'Đã hoàn thành', 
                                                '{{ $lichsudon->ten_khach_hang }}', '{{ $lichsudon->email }}', 
                                                '{{ $lichsudon->so_dien_thoai_nguoi_nhan }}', '{{ $lichsudon->dia_chi_giao_hang }}')">                                                    
                                                    <th scope="row">{{$lichsudon->ma_hoa_don_ban}} </th>
                                                    <td>{{$lichsudon->ngay_tao_hoa_don}}</td>
                                                    <td>{{$lichsudon->tong_tien_hdb}}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- Tab đơn hàng đang giao -->
                                <div class="tab-pane fade" id="nav-ordershipping" role="tabpanel" aria-labelledby="nav-ordershipping-tab">
                                    <div class="profile__ticket table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Mã hóa đơn</th>
                                                    <th scope="col">Ngày tạo</th>
                                                    <th scope="col">Tổng tiền</th>
                                                    <th scope="col">Thanh toán</th>
                                                    <th scope="col">Tình trạng</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($hoadondanggiao as $danggiao)
                                                <tr style="background-color: white; transition: background-color 0.3s ease; cursor: pointer;" onmouseover="this.style.backgroundColor='lightgray'" onmouseout="this.style.backgroundColor='white'" 
                                                onclick="showModal('{{ $danggiao->ma_hoa_don_ban }}', 'Đang giao', 
                                                '{{ $danggiao->ten_khach_hang }}', '{{ $danggiao->email }}', 
                                                '{{ $danggiao->so_dien_thoai_nguoi_nhan }}', '{{ $danggiao->dia_chi_giao_hang }}')">                                                    
                                                    <th scope="row"> {{$danggiao->ma_hoa_don_ban}}</th>
                                                    <td>{{$danggiao->ngay_tao_hoa_don}}</td>
                                                    <td>{{$danggiao->tong_tien_hdb}}</td>
                                                    @if($danggiao->trang_thai_thanh_toan == 'Đã thanh toán')
                                                    <td data-info="status done">Đã thanh toán</td>
                                                    @else
                                                    <td data-info="status reply">Chưa thanh toán</td>
                                                    @endif
                                                    <td data-info="status pending">{{$danggiao->tinh_trang_hoa_don}}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- Tab đơn hàng đã hủy -->
                                <div class="tab-pane fade" id="nav-orderabort" role="tabpanel" aria-labelledby="nav-orderabort-tab">
                                    <div class="profile__ticket table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Mã hóa đơn</th>
                                                    <th scope="col">Ngày tạo</th>
                                                    <th scope="col">Tổng tiền</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($hoadondahuy as $donhuy)
                                                <tr style="background-color: white; transition: background-color 0.3s ease; cursor: pointer;" onmouseover="this.style.backgroundColor='lightgray'" onmouseout="this.style.backgroundColor='white'" 
                                                onclick="showModal('{{ $donhuy->ma_hoa_don_ban }}', 'Đã hủy', 
                                                '{{ $donhuy->ten_khach_hang }}', '{{ $donhuy->email }}', 
                                                '{{ $donhuy->so_dien_thoai_nguoi_nhan }}', '{{ $donhuy->dia_chi_giao_hang }}')">                                                    
                                                    <th scope="row"> {{$donhuy->ma_hoa_don_ban}}</th>
                                                    <td>{{$donhuy->ngay_tao_hoa_don}}</td>
                                                    <td>{{$donhuy->tong_tien_hdb}}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- profile area end -->



    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Chi tiết hóa đơn</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="modalBody">
                    ...
                </div>
            </div>
        </div>
    </div>
</main>

<script src="{{asset('assets/js/jquery-3.6.0.min.js')}}"></script>

<script>
    $(document).ready(function() {
        var profileUpdateAlert = document.getElementById('update-profile-alert');

        $("#profile_picture").change(function() {
            var file = this.files[0];
            var reader = new FileReader();
            reader.onloadend = function() {
                $("#profile_picture_preview").attr("src", reader.result);
            }
            reader.readAsDataURL(file);
        });
        $("#profile_form").submit(function(e) {
            e.preventDefault();
            $("#profile_button").text('Đang xử lý...');

            var fd = new FormData();
            fd.append('id', $("#userid").val());
            fd.append('profile_name', $("#profile_name").val());
            fd.append('profile_date', $("#profile_date").val());
            fd.append('profile_address', $("#profile_address").val());
            fd.append('profile_phone', $("#profile_phone").val());
            fd.append('profile_gender', $("#profile_gender").val());
            fd.append('profile_picture', $('#profile_picture')[0].files[0]);
            fd.append('_token', '{{ csrf_token() }}');

            $.ajax({
                url: "{{ route('updateProfile') }}",
                method: "POST",
                data: fd,
                cache: false,
                processData: false,
                contentType: false,
                dataType: "json",
            }).done(function(response) {
                //console.log(response);
                if (response.status == 400) {
                    $("#update-profile-alert").empty();
                    $("#profile_button").text('Cập nhật thông tin');
                    if (profileUpdateAlert.classList.contains('alert-success')) {
                        profileUpdateAlert.classList.remove('alert-success');
                    }
                    profileUpdateAlert.classList.add('alert-danger');
                    for (var field in response.messages) {
                        var errorMessages = response.messages[field];
                        for (var i = 0; i < errorMessages.length; i++) {
                            $("#update-profile-alert").append($('<li>').text(errorMessages[i]));
                        }
                    }
                    $("#update-profile-alert").show();
                } else if (response.status == 200) {
                    $("#profile_button").text('Cập nhật thông tin');
                    if (profileUpdateAlert.classList.contains('alert-danger')) {
                        profileUpdateAlert.classList.remove('alert-danger');
                    }
                    profileUpdateAlert.classList.add('alert-success');
                    profileUpdateAlert.style.display = 'block';
                    $("#update-profile-alert").html(response.messages);
                }
            }).fail(function(response) {
                //console.log("lỗi");
                $("#profile_button").text('Cập nhật thông tin');
                if (profileUpdateAlert.classList.contains('alert-success')) {
                    profileUpdateAlert.classList.remove('alert-success');
                }
                profileUpdateAlert.classList.add('alert-danger');
                profileUpdateAlert.style.display = 'block';
                $("#update-profile-alert").html(response.messages);
            });
        });
    });

    //Hủy hóa đơn ở phía khách hàng
    async function huyHoaDon(maHoaDon) {
        event.stopPropagation();
        const result = await Swal.fire({
            title: 'Bạn muốn hủy hóa đơn này không?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Không',
            confirmButtonText: 'Có'
        });

        if (result.isConfirmed) {
            const checkBoxes = `
            <div>
                <input type="radio" id="reason1" name="reason" value="Tôi muốn cập nhật địa chỉ / số điện thoại nhận hàng">
                <label for="reason1" style="display: inline-block; width: 50%; vertical-align: top;">Tôi muốn cập nhật địa chỉ / số điện thoại nhận hàng</label>
            </div>
            <div>
                <input type="radio" id="reason2" name="reason" value="Tôi muốn thêm / thay đổi mã giảm giá">
                <label for="reason2" style="display: inline-block; width: 50%; vertical-align: top;">Tôi muốn thêm / thay đổi mã giảm giá</label>
            </div>
            <div>
                <input type="radio" id="reason3" name="reason" value="Tôi muốn thay đổi kích thước, màu sắc sản phẩm">
                <label for="reason3" style="display: inline-block; width: 50%; vertical-align: top;">Tôi muốn thay đổi kích thước, màu sắc sản phẩm</label>
            </div>
            <div>
                <input type="radio" id="reason4" name="reason" value="Thủ tục thanh toán rắc rối">
                <label for="reason4" style="display: inline-block; width: 50%; vertical-align: top;">Thủ tục thanh toán rắc rối</label>
            </div>
            <div>
                <input type="radio" id="reason5" name="reason" value="Tôi muốn mua sản phẩm khác">
                <label for="reason5" style="display: inline-block; width: 50%; vertical-align: top;">Tôi muốn mua sản phẩm khác</label>
            </div>
            <div>
                <input type="radio" id="reason6" name="reason" value="Lý do khác">
                <label for="reason6" style="display: inline-block; width: 50%; vertical-align: top;">Lý do khác</label>
            </div>

        `;

            const reasonResult = await Swal.fire({
                title: 'Chọn lý do hủy',
                html: checkBoxes,
                showCancelButton: true,
                confirmButtonText: 'Hủy đơn hàng',
                cancelButtonText: 'Hủy bỏ'
            });

            if (reasonResult.isConfirmed) {
                if (document.getElementById('reason1').checked) {
                    reason = 'Tôi muốn cập nhật địa chỉ / số điện thoại nhận hàng';
                }
                if (document.getElementById('reason2').checked) {
                    reason = 'Tôi muốn thêm / thay đổi mã giảm giá';
                }
                if (document.getElementById('reason3').checked) {
                    reason = 'Tôi muốn thay đổi kích thước, màu sắc sản phẩm';
                }
                if (document.getElementById('reason4').checked) {
                    reason = 'Thủ tục thanh toán rắc rối';
                }
                if (document.getElementById('reason5').checked) {
                    reason = 'Tôi muốn mua sản phẩm khác';
                }
                if (document.getElementById('reason6').checked) {
                    reason = 'Lý do khác';
                }

                try {
                    const response = await $.ajax({
                        type: 'GET',
                        url: '{{ route("huy-hoa-don") }}',
                        data: {
                            maHoaDon: maHoaDon,
                            reason: reason // Gửi lý do hủy đơn hàng đến server
                        },
                        dataType: 'json',
                    });

                    if (response.success) {
                        Swal.fire({
                            title: 'Hủy hóa đơn thành công',
                            icon: 'success',
                        }).then(() => {
                            location.reload();
                        });
                    } else {
                        Swal.fire('Có lỗi xảy ra khi hủy hóa đơn', response.message, 'error');
                    }
                } catch (error) {
                    Swal.fire('Có lỗi xảy ra khi kết nối đến máy chủ.', '', 'error');
                }
            }
        }
    }


    //Hiển thị Modal
    function showModal(maHoaDon, tinhTrang, hoTenKH, email, dienThoai, diaChi) {
        // Sử dụng Ajax để gửi mã hóa đơn đến controller
        $.ajax({
            type: 'POST',
            url: '/showmodal', // Đặt đúng route của controller của bạn
            data: {
                maHoaDon: maHoaDon,
                tinhTrang: tinhTrang,
                _token: '{{ csrf_token() }}' // Đảm bảo gửi token CSRF nếu bạn đang sử dụng Laravel
            },
            success: function(response) {
                var modalBody = $('#modalBody');
                modalContent = `<div class="col-md-12">   
                    <div class="row">
                            
                            <div class="receipt-main col-xs-12 col-sm-12 col-md-12 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">
                                <div class="row">
                                    <div class="receipt-header">
                                    <div class="col-xs-6 col-sm-6 col-md-6" style="float: left;">
                                            <div class="receipt-left">
                                                <img class="img-responsive" alt="iamgurdeeposahan" src="/assets/img/logo/logo.svg" style="width: 300px; border-radius: 43px;">
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-6 col-md-6 text-right" style="float: right;">
                                            <div class="receipt-right">
                                                <h5 style="text-align: right;">Shofy Shop</h5>
                                                <p style="text-align: right;">0968686868<i class="fa fa-phone"></i></p>
                                                <p style="text-align: right;">shofyshop@gmail.com <i class="fa fa-envelope-o"></i></p>
                                                <p style="text-align: right;">Việt Nam<i class="fa fa-location-arrow"></i></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="receipt-header receipt-header-mid">
                                        <div class="col-xs-6 col-sm-6 col-md-6 text-left">
                                            <div class="receipt-right">
                                                <h5>${hoTenKH}</h5>
                                                <p><b>Điện thoại :</b> ${dienThoai}</p>
                                                <p><b>Email :</b> ${email}</p>
                                                <p><b>Địa chỉ :</b> ${diaChi}</p>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div style="text-align: center;">
                                                <br>
                                                <h3>Mã hóa đơn: ${maHoaDon}</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Tên sản phẩm</th>
                                                <th>Chi tiết</th>
                                                <th>Giá bán</th>
                                                <th>Số lượng</th>
                                                <th>Thành tiền</th>
                                            </tr>
                                        </thead>
                                        <tbody>`;
                response.forEach(function(invoice) {
                    modalContent += `<tr>
                                                <td>${invoice.ten_san_pham}</td>
                                                <td>Size: ${invoice.size} - ${invoice.mau}</td>
                                                <td>${invoice.giaban}</td>
                                                <td>${invoice.so_luong_ban}</td>
                                                <td>${invoice.thanh_tien}</td>
                                            </tr>`;
                });

                modalContent += `
                                            <tr>
                                                <td class="text-right"><h2><strong>Tổng tiền: </strong></h2></td>
                                                <td class="text-center text-danger" colspan="4"><h2><strong> ${response[0].tong_tien_hdb}</strong></h2></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                
                                <div class="row">
                                    <div class="receipt-header receipt-header-mid receipt-footer">
                                        <div class="col-xs-8 col-sm-8 col-md-8 text-left">
                                            <div class="receipt-right">
                                                <p><b>Ngày mua: </b>${response[0].ngay_tao_hoa_don}</p>
                                                <br>
                                                <h5 style="color: rgb(140, 140, 140);">Cảm ơn vì đã tin tưởng chúng tôi</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>    
                        </div>
                    </div>`;

                modalBody.html(modalContent);
                // Hiển thị modal
                $('#exampleModal').modal('show');
            },


            error: function(error) {
                console.error('Error:', error);
            }
        });
    }
</script>

@if (!session('loggedInUser.mat_khau'))
<script>
    $(document).ready(function() {
        var changePasswordAlert = document.getElementById('change-password-alert');

        $("#change_password_form").submit(function(e) {
            e.preventDefault();
            $("#change_password_button").text('Đang xử lý...');

            $.ajax({
                url: "{{ route('changePasswordThirdParty') }}",
                method: "POST",
                data: $(this).serialize(),
                dataType: "json",
            }).done(function(response) {
                console.log(response);
                if (response.status == 400) {
                    $("#change-password-alert").empty();
                    $("#change_password_button").text('Đổi mật khẩu');
                    if (changePasswordAlert.classList.contains('alert-success')) {
                        changePasswordAlert.classList.remove('alert-success');
                    }
                    changePasswordAlert.classList.add('alert-danger');
                    for (var field in response.messages) {
                        var errorMessages = response.messages[field];
                        for (var i = 0; i < errorMessages.length; i++) {
                            $("#change-password-alert").append($('<li>').text(errorMessages[i]));
                        }
                    }
                    $("#change-password-alert").show();
                } else if (response.status == 200) {
                    $("#change_password_button").text('Đổi mật khẩu');
                    if (changePasswordAlert.classList.contains('alert-danger')) {
                        changePasswordAlert.classList.remove('alert-danger');
                    }
                    changePasswordAlert.classList.add('alert-success');
                    changePasswordAlert.style.display = 'block';
                    $("#change-password-alert").html(response.messages);
                }
            }).fail(function(response) {
                console.log("lỗi");
                $("#change_password_button").text('Đổi mật khẩu');
                if (changePasswordAlert.classList.contains('alert-success')) {
                    changePasswordAlert.classList.remove('alert-success');
                }
                changePasswordAlert.classList.add('alert-danger');
                changePasswordAlert.style.display = 'block';
                $("#change-password-alert").html(response.messages);
            });
        });
    });
</script>
@else
<script>
    $(document).ready(function() {
        var changePasswordAlert = document.getElementById('change-password-alert');

        $("#change_password_form").submit(function(e) {
            e.preventDefault();
            $("#change_password_button").text('Đang xử lý...');

            $.ajax({
                url: "{{ route('changePassword') }}",
                method: "POST",
                data: $(this).serialize(),
                dataType: "json",
            }).done(function(response) {
                console.log(response);
                if (response.status == 400) {
                    $("#change-password-alert").empty();
                    $("#change_password_button").text('Đổi mật khẩu');
                    if (changePasswordAlert.classList.contains('alert-success')) {
                        changePasswordAlert.classList.remove('alert-success');
                    }
                    changePasswordAlert.classList.add('alert-danger');
                    for (var field in response.messages) {
                        var errorMessages = response.messages[field];
                        for (var i = 0; i < errorMessages.length; i++) {
                            $("#change-password-alert").append($('<li>').text(errorMessages[i]));
                        }
                    }
                    $("#change-password-alert").show();
                } else if (response.status == 200) {
                    $("#change_password_button").text('Đổi mật khẩu');
                    if (changePasswordAlert.classList.contains('alert-danger')) {
                        changePasswordAlert.classList.remove('alert-danger');
                    }
                    changePasswordAlert.classList.add('alert-success');
                    changePasswordAlert.style.display = 'block';
                    $("#change-password-alert").html(response.messages);
                }
            }).fail(function(response) {
                console.log("lỗi");
                $("#change_password_button").text('Đổi mật khẩu');
                if (changePasswordAlert.classList.contains('alert-success')) {
                    changePasswordAlert.classList.remove('alert-success');
                }
                changePasswordAlert.classList.add('alert-danger');
                changePasswordAlert.style.display = 'block';
                $("#change-password-alert").html(response.messages);
            });
        });
    });
</script>
@endif
@endsection