@extends('Layout.Admin_NhanVien.Layout')
@section('Title', 'Thêm Voucher')

@section('Admin_Renderbody')
    {{-- thuộc tính novalidate boolean vào tệp <form>. Điều này vô hiệu hóa chú giải công cụ phản hồi mặc định của trình duyệt  --}}
    <form class="row g-3 needs-validation" novalidate style="padding: 50px" method="POST"  action="{{ route('Admin.Voucher.store') }}" enctype="multipart/form-data">
        @csrf @method('POST')
        
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Mã voucher</label>
            <input type="text" class="form-control" name ='ma_voucher' readonly id="exampleFormControlInput1" value="{{ $auto_ma_voucher }}" >
            
        </div>

        <div class="mb-3">
            <label for="exampleFormControlInput2" class="form-label">Tên voucher</label>
            <input type="text" class="form-control" name ='ten_voucher' id="exampleFormControlInput1" value="" required>
            <div class="invalid-feedback">
                Bạn cần nhập tên.
            </div>
        </div>

        <div class="mb-3">
            <label for="exampleFormControlInput3" class="form-label">Phần trăm</label>
            <input type="number" class="form-control"  min="0" max="100" name ='phan_tram' id="exampleFormControlInput3"   required>
            <div class="invalid-feedback">
                Bạn cần nhập phần trăm và lớn từ 0 đến 100.
            </div>
        </div>

        <div class="mb-3">
            <label for="exampleFormControlInput4" class="form-label">Số lượng</label>
            <input type="number" class="form-control"  min="0"  name ='so_luong' id="exampleFormControlInput4"   required>
            <div class="invalid-feedback">
                Bạn cần nhập số lượng và lớn hơn 0.
            </div>
        </div>

        <div class="mb-3">
            <label for="exampleFormControlInput5" class="form-label">Ngày bắt đầu</label>
            <input type="date" class="form-control"   name ='ngay_bat_dau' id="exampleFormControlInput5"   required>
            <div class="invalid-feedback">
                Bạn cần nhập ngày bắt đầu.
            </div>
        </div>

        <div class="mb-3">
            <label for="exampleFormControlInput6" class="form-label">Ngày kết thúc</label>
            <input type="date" class="form-control"   name ='ngay_ket_thuc' id="exampleFormControlInput6"   required>
            <div class="invalid-feedback">
                Bạn cần nhập ngày kết thúc.
            </div>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Thêm voucher</button>
            <a href="{{ route('Admin.Voucher.index') }}"class="btn btn-dark">Quay lại</a>
        </div>
    </form>
@endsection
@section('js')
    <script>
        // Đợi khi trang đã tải xong
        document.addEventListener('DOMContentLoaded', function () {
            // Lấy các trường ngày từ DOM
            var ngayBatDauInput = document.getElementById('exampleFormControlInput5');
            var ngayKetThucInput = document.getElementById('exampleFormControlInput6');

            // Sự kiện khi trường ngày bắt đầu thay đổi
            ngayBatDauInput.addEventListener('input', function () {
                // Kiểm tra nếu ngày bắt đầu lớn hơn ngày kết thúc, đặt ngày kết thúc bằng ngày bắt đầu
                if (ngayBatDauInput.value > ngayKetThucInput.value) {
                    ngayKetThucInput.value = ngayBatDauInput.value;
                }
            });

            // Sự kiện khi trường ngày kết thúc thay đổi
            ngayKetThucInput.addEventListener('input', function () {
                // Kiểm tra nếu ngày kết thúc nhỏ hơn ngày bắt đầu, đặt ngày bắt đầu bằng ngày kết thúc
                if (ngayKetThucInput.value < ngayBatDauInput.value) {
                    ngayBatDauInput.value = ngayKetThucInput.value;
                }
            });
        });
    </script>
    
@endsection