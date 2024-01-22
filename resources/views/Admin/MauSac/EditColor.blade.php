@extends('Layout.Admin_NhanVien.Layout')
@section('Title', 'Sửa màu sắc')
@section('thongke')
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('Admin.Index') }}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Thống kê</span></a>
    </li>
@endsection
@section('menu')
    @php
        $Menu = config('Menu_Admin');
    @endphp
@endsection
@section('Admin_Renderbody')
    {{-- thuộc tính novalidate boolean vào tệp <form>. Điều này vô hiệu hóa chú giải công cụ phản hồi mặc định của trình duyệt  --}}
    <form class="row g-3 needs-validation" novalidate style="padding: 50px" method="POST"  action="{{ route('Admin.MauSac.update', $color->ma_mau) }}" enctype="multipart/form-data">
        @csrf @method('PUT')

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Mã màu</label>
            <input type="color" class="form-control" name ='ma_mau' readonly id="exampleFormControlInput1" value="#{{  $color->ma_mau }}" >

        </div>

        <div class="mb-3">
            <label for="exampleFormControlInput2" class="form-label">Tên màu</label>
            <input type="text" class="form-control" name ='mau' id="exampleFormControlInput1" value="{{  $color->mau }}" required>
            <div class="invalid-feedback">
                Bạn cần nhập tên.
            </div>
        </div>

        <div class="col-12">
            <button type="submit" class="btn btn-primary">Cập nhật</button>
            <a href="{{ route('Admin.MauSac.index') }}"class="btn btn-dark">Quay lại</a>
        </div>
    </form>

@endsection

@section('js')
@endsection
