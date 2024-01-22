@extends('Layout.Admin_NhanVien.Layout')
@section('Title', 'Thêm nhân viên')

@section('Admin_Renderbody')
    {{-- thuộc tính novalidate boolean vào tệp <form>. Điều này vô hiệu hóa chú giải công cụ phản hồi mặc định của trình duyệt  --}}
    <form class="row g-3 needs-validation" novalidate style="padding: 50px" method="POST"  action="{{ route('Admin.NhanVien.store') }}" enctype="multipart/form-data">
        @csrf @method('POST')
        
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Mã nhân viên</label>
            <input type="text" class="form-control" name ='ma_nhan_vien' readonly id="exampleFormControlInput1" value="{{ $auto_ma_nhan_vien }}" >
        </div>

        <div class="mb-3">
            <label for="exampleFormControlInput2" class="form-label">Tên nhân viên</label>
            <input type="text" class="form-control" name ='ten_nhan_vien' id="exampleFormControlInput1" value="" required>
            <div class="invalid-feedback">
                Bạn cần nhập tên.
            </div>
        </div>

        <div class="mb-3">
            <label for="exampleFormControlInput2" class="form-label">Ảnh đại diện</label>
            <input type="file" class="form-control" name ='anh_dai_dien' id="image"  required>
            <div style="padding-top:20px"><img id="previewImage"  src="" alt="Preview Image" style="margin: auto; display: none; width: 500px; height:400px"></div>
            <div class="invalid-feedback">
                Bạn cần chọn ảnh.
            </div>
        </div>
        
        <div class="mb-3">
            <label for="exampleFormControlInput3" class="form-label">Ngày sinh</label>
            <input type="date" class="form-control" name ='ngay_sinh' id="exampleFormControlInput1" value=""  required>
            <div class="invalid-feedback">
                Bạn cần chọn ngày sinh.
            </div>
        </div>  

        <div class="mb-3">
            <label for="exampleFormControlInput4" class="form-label">Địa chỉ</label>
            <input type="text" class="form-control" name ='dia_chi' id="exampleFormControlInput1" value="" required >
            <div class="invalid-feedback">
                Bạn cần nhập địa chỉ.
            </div>
        </div>  

        <div class="mb-3">
            <label for="exampleFormControlInput5" class="form-label">Điện thoại</label>
            <input type="text" class="form-control" name ='dien_thoai' id="exampleFormControlInput1" value="" required >
            <div class="invalid-feedback">
                Bạn cần số điện thoại.
            </div>
        </div>  

        <div class="mb-3">
            <label for="exampleFormControlInput6" class="form-label">Giới tính</label>
            <select id="exampleFormControlInput6"  name="gioi_tinh" class="form-select " aria-label="Default select example" required>
                <option value="" selected>---</option>
                <option value="1">Nam</option>
                <option value="0">Nữ</option>
            </select>
            <div class="invalid-feedback">
                Bạn cần chọn giới tính.
            </div>
        </div>

        <div class="mb-3">
            <label for="exampleFormControlInput7" class="form-label">Chức vụ</label>
            <select id="exampleFormControlInput7"  name="ma_chuc_vu" class="form-select " aria-label="Default select example" required>
                <option value="" selected>---</option>
                @foreach ($Data_ChucVu as $item)
                    <option value="{{ $item->ma_chuc_vu }}" >{{ $item->ten_chuc_vu }}</option>
                @endforeach
            </select>
            <div class="invalid-feedback">
                Bạn cần chọn chức vụ.
            </div>
        </div>

        <div class="mb-3">
            <label for="exampleFormControlInput8" class="form-label">Tài khoản</label>
            <input type="text" class="form-control" name ='tai_khoan' readonly id="exampleFormControlInput8" value="{{ $auto_ma_nhan_vien }}" >
        </div>

        <div class="col-12">
            <button type="submit" class="btn btn-primary">Thêm nhân viên</button>
            <a href="{{ route('Admin.NhanVien.index') }}"class="btn btn-dark">Quay lại</a>
        </div>
    </form>
    
@endsection

@section('js')
    <script>
        
    </script>

@endsection
