@extends('Layout.Admin_NhanVien.Layout')
@section('Title', 'Thêm ')
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
    <form class="row g-3 needs-validation" novalidate
          style="padding: 50px" method="POST"  action="{{ route('Admin.MauSac.store') }}"
          onsubmit="return validate();"
    >
        @csrf
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Mã màu</label>
            <input type="color" class="form-control" name ='ma_mau' id="colorId" required>
            <div class="invalid-feedback">
                Bạn cần chọn màu.
            </div>
        </div>
        @error('ma_mau')
        <script>Swal.fire('Mã màu này đã tồn tại','error');</script>
        @enderror
        <div class="mb-3">
            <label for="colorName" class="form-label">Tên màu</label>
            <input type="text" class="form-control" name ='mau'  required>
            <div class="invalid-feedback">
                Bạn cần nhập tên màu.
            </div>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Thêm màu</button>
            <a href="{{ route('Admin.MauSac.index') }}" class="btn btn-dark">Quay lại</a>
        </div>
        @error('mau')
        <script>Swal.fire('Tên màu này đã tồn tại','error');</script>
        @enderror
    </form>
@endsection

@section('js')
    <script>
        function validate() {
            let colorId = $('#colorId').val().replace('#', '');
            alert('Màu đã chọn (HEX):' + colorId);
            return true;
        }
    </script>
@endsection
