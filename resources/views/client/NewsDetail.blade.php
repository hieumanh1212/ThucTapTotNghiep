@extends('layout/client/layout')
@section('content')
    <main>


        <!-- blog details area start -->
        <section class="tp-postbox-details-area pb-120 pt-95">
            <div class="container">
                <div class="row">
                    <div class="col-xl-9">
                        <div class="tp-postbox-details-top">
                            <div class="tp-postbox-details-category">
                           <span>
                              <a href="#">Chi tiết tin tức</a>
                           </span>
                                <span>
                              <a href="#"></a>
                           </span>
                            </div>
                            <h3 class="tp-postbox-details-title">{{$news->tieu_de}}</h3>
                            <div class="tp-postbox-details-meta mb-50">
                                <span>
                              <svg width="16" height="17" viewBox="0 0 16 17" fill="none"
                                   xmlns="http://www.w3.org/2000/svg">
                                 <path
                                     d="M15 8.5C15 12.364 11.864 15.5 8 15.5C4.136 15.5 1 12.364 1 8.5C1 4.636 4.136 1.5 8 1.5C11.864 1.5 15 4.636 15 8.5Z"
                                     stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                     stroke-linejoin="round"></path>
                                 <path
                                     d="M10.5972 10.7259L8.42721 9.43093C8.04921 9.20693 7.74121 8.66793 7.74121 8.22693V5.35693"
                                     stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                     stroke-linejoin="round"></path>
                              </svg>
                              {{$news->created_at}}
                           </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <div class="tp-postbox-details-thumb">
                            <img src="{{url('IMG_TinTuc/'.$news->anh_dai_dien)}}" alt="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-2 col-lg-2 col-md-2">
                        <div class="tp-postbox-details-share-2">
                            <span>Chia sẻ</span>
                            <ul>
                                <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa-brands fa-linkedin-in"></i></a></li>
                                <li><a href="#"><i class="fa-brands fa-vimeo-v"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-8 col-md-10">
                        <div class="tp-postbox-details-main-wrapper tp-postbox-style2">
                            <div class="tp-postbox-details-content" id="newsContent">

{{--                                {{!! $news->noi_dung !!}}--}}
                                {!! $news->noi_dung !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- blog details area end -->


    </main>
@endsection
@section('scripts')
    <script>
        $(function () {
            {{--$('#newsContent').html(`{{$news->noi_dung}}`);--}}
{{--            document.getElementById("newsContent").innerHTML = "{{$news->noi_dung}}";--}}
        })
    </script>
@endsection
