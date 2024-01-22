@extends('Layout.Admin_NhanVien.Layout')
@section('Title', 'Sửa nhà cung cấp')

@section('Admin_Renderbody')
    {{-- thuộc tính novalidate boolean vào tệp <form>. Điều này vô hiệu hóa chú giải công cụ phản hồi mặc định của trình duyệt  --}}
    <form class="row g-3 needs-validation" novalidate style="padding: 50px" method="POST"  action="{{ route('Admin.NhaCungCap.update', $Data_NhaCungCap->ma_nha_cung_cap) }}" enctype="multipart/form-data">
        @csrf @method('PUT')
        
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Mã nhà cung cấp</label>
            <input type="text" class="form-control" name ='ma_nha_cung_cap' readonly id="exampleFormControlInput1" value="{{  $Data_NhaCungCap->ma_nha_cung_cap }}" >
            
        </div>

        <div class="mb-3">
            <label for="exampleFormControlInput2" class="form-label">Tên nhà cung cấp</label>
            <input type="text" class="form-control" name ='ten_nha_cung_cap' id="exampleFormControlInput1" value="{{  $Data_NhaCungCap->ten_nha_cung_cap }}" required>
            <div class="invalid-feedback">
                Bạn cần nhập tên.
            </div>
        </div>

        <div class="mb-3">
            <label for="exampleFormControlInput3" class="form-label">Email</label>
            <input type="email" class="form-control"  name ='email' id="exampleFormControlInput3" value="{{  $Data_NhaCungCap->email }}"   required>
            <div class="invalid-feedback">
                Bạn cần nhập email và đúng định dạng (VD: abc@gmail.com).
            </div>
        </div>

        <div class="mb-3">
            <label for="exampleFormControlInput4" class="form-label">Số điện thoại</label>
            <input type="text" class="form-control"   name ='so_dien_thoai' id="exampleFormControlInput4" value="{{  $Data_NhaCungCap->so_dien_thoai }}" required>
            <div class="invalid-feedback">
                Bạn cần nhập số điện thoại (phải là số và đủ 10 ký tự).
            </div>
        </div>

        <div class="col-12">
            <button type="submit" class="btn btn-primary">Cập nhật</button>
            <a href="{{ route('Admin.NhaCungCap.index') }}"class="btn btn-dark">Quay lại</a>
        </div>
    </form>
    
@endsection

@section('js')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var phoneNumberInput = document.getElementById('exampleFormControlInput4');

            phoneNumberInput.addEventListener('input', function () {
                validatePhoneNumber();
            });

            phoneNumberInput.addEventListener('keypress', function (event) {
                // Chỉ cho phép nhập số
                if (event.which < 48 || event.which > 57) {
                    event.preventDefault();
                }
            });

            function validatePhoneNumber() {
                var phoneNumberValue = phoneNumberInput.value;

                // Kiểm tra xem giá trị là số và có đủ 10 ký tự
                if (/^\d{10}$/.test(phoneNumberValue)) {
                    phoneNumberInput.classList.remove('is-invalid');
                } else {
                    phoneNumberInput.classList.add('is-invalid');
                }
            }
        });
    </script>
@endsection
