@extends('layout.client.layout')

@section('content')
<main>
    <!-- error area start -->
    <section class="tp-error-area pt-110 pb-110">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-8 col-md-10">
                    <div class="tp-error-content text-center">
                        <div class="tp-error-thumb">
                            <img src="assets/img/error/error.png" alt="">
                        </div>

                        <h3 class="tp-error-title">Oops! Không tìm thấy trang</h3>
                        <p>Thật ngại quá. Có vẻ như trang bạn đang tìm kiếm không tồn tại.</p>

                        <a href="{{ route('homepage') }}" class="tp-error-btn">Về trang chủ</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- error area end -->

</main>
@endsection