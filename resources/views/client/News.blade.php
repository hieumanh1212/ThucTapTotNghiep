@extends('layout/client/layout')
@section('content')
    <main>

        <!-- breadcrumb area start -->
        <section class="breadcrumb__area include-bg pt-150 pb-150 breadcrumb__overlay breadcrumb__style-3" data-background="assets/img/breadcrumb/breadcrumb-bg-1.jpg" style="background-image: url(&quot;assets/img/breadcrumb/breadcrumb-bg-1.jpg&quot;);">
            <div class="container">
                <div class="row">
                    <div class="col-xxl-12">
                        <div class="breadcrumb__content text-center p-relative z-index-1">
                            <h3 class="breadcrumb__title">Tin tức</h3>
                            <div class="breadcrumb__list">
                                <span><a href="{{asset('/')}}">Trang chủ</a></span>
                                <span>Tin tức</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- breadcrumb area end -->

        <!-- postbox area start -->
        <section class="tp-postbox-area pt-120 pb-120">
            <div class="container">
                <div class="row">
                    <div class="col-xl-9 col-lg-8">
                        <div class="tp-postbox-wrapper pr-50">
                            @foreach($news as $new)
                                <article class="tp-postbox-item format-image mb-50 transition-3">
                                    <div class="tp-postbox-thumb w-img">
                                        <a href="{{url('news/'.$new->ma_tin_tuc)}}">
                                            <img src="{{url('IMG_TinTuc/'.$new->anh_dai_dien)}}" alt="">
                                        </a>
                                    </div>
                                    <div class="tp-postbox-content">
                                        <div class="tp-postbox-meta">
                                            <span><i class="far fa-calendar-check"></i> {{$new->created_at}} </span>
                                        </div>
                                        <h3 class="tp-postbox-title">
                                            <a href="blog-details.html">{{$new->tieu_de}}</a>
                                        </h3>
                                        <div class="tp-postbox-read-more">
                                            <a href="{{url('news/'.$new->ma_tin_tuc)}}" class="tp-btn">Đọc chi tiết</a>
                                        </div>
                                    </div>
                                </article>
                            @endforeach
                            <div class="tp-blog-pagination mt-50">
                                <div class="tp-pagination">
                                    <nav>
                                        <ul>
                                            <li>
                                                <a href="blog.html" class="tp-pagination-prev prev page-numbers">
                                                    <svg width="15" height="13" viewBox="0 0 15 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M1.00017 6.77879L14 6.77879" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        <path d="M6.24316 11.9999L0.999899 6.77922L6.24316 1.55762" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    </svg>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="blog.html">1</a>
                                            </li>
                                            <li>
                                                <span class="current">2</span>
                                            </li>
                                            <li>
                                                <a href="blog.html">3</a>
                                            </li>
                                            <li>
                                                <a href="blog-grid.html" class="next page-numbers">
                                                    <svg width="15" height="13" viewBox="0 0 15 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M13.9998 6.77883L1 6.77883" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        <path d="M8.75684 1.55767L14.0001 6.7784L8.75684 12" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    </svg>
                                                </a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4">
                        <div class="tp-sidebar-wrapper tp-sidebar-ml--24">
                            <div class="tp-sidebar-widget mb-35">
                                <div class="tp-sidebar-search">
                                    <form action="#">
                                        <div class="tp-sidebar-search-input">
                                            <input type="text" placeholder="Search...">
                                            <button type="submit">
                                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M8.11111 15.2222C12.0385 15.2222 15.2222 12.0385 15.2222 8.11111C15.2222 4.18375 12.0385 1 8.11111 1C4.18375 1 1 4.18375 1 8.11111C1 12.0385 4.18375 15.2222 8.11111 15.2222Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path d="M16.9995 17L13.1328 13.1333" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                </svg>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <!-- about -->

                            <!-- about end -->

                            <!-- latest post start -->

                            <!-- latest post end -->

                            <!-- categories start -->

                            <!-- categories end -->

                            <!-- tag cloud start -->

                            <!-- tag cloud end -->

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- postbox area end -->

    </main>
@endsection
@section('scripts')
@endsection
