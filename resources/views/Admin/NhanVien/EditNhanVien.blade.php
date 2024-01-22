@extends('Layout.Admin_NhanVien.Layout')
@section('Title', 'Sửa nhân viên')

@section('Admin_Renderbody')
    {{-- thuộc tính novalidate boolean vào tệp <form>. Điều này vô hiệu hóa chú giải công cụ phản hồi mặc định của trình duyệt  --}}
    <form class="row g-3 needs-validation" novalidate style="padding: 50px" method="POST"  action="{{ route('Admin.NhanVien.update', $Data_NhanVien->ma_nhan_vien) }}" enctype="multipart/form-data">
        @csrf @method('PUT')
        
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Mã nhân viên</label>
            <input type="text" class="form-control" name ='ma_nhan_vien' readonly id="exampleFormControlInput1" value="{{ $Data_NhanVien->ma_nhan_vien }}" >
        </div>

        <div class="mb-3">
            <label for="exampleFormControlInput2" class="form-label">Tên nhân viên</label>
            <input type="text" class="form-control" name ='ten_nhan_vien' id="exampleFormControlInput1" value="{{ $Data_NhanVien->ten_nhan_vien }}" required>
            <div class="invalid-feedback">
                Bạn cần nhập tên.
            </div>
        </div>

        <div class="mb-3">
            <label for="exampleFormControlInput2" class="form-label">Ảnh đại diện</label>
            <input type="file" class="form-control" name ='anh_dai_dien' id="imageEdit"  >
            <div class="row" style="margin: auto; padding-top:20px">
                <div class="col-6" style="display: flex; flex-direction: column; align-items: center; text-align: center;">
                    <label class="form-label">Ảnh cũ</label>
                    <img  id="previewImage"  src="{{asset('IMG_NhanVien/'.$Data_NhanVien->anh_dai_dien)}}" alt="Preview Image" 
                    style="width: 250px; height:250px">
                </div>

                <div class="col-6" style="display: flex; flex-direction: column; align-items: center; text-align: center;" >
                    <label class="form-label">Ảnh mới(Mặc định là theo ảnh cũ)</label>
                    <img  id="previewImageNew"  src="{{asset('IMG_NhanVien/'.$Data_NhanVien->anh_dai_dien)}}" alt="Preview Image" 
                    style="width: 250px; height:250px">
                </div>
                
            </div>
            <div class="invalid-feedback">
                Bạn cần chọn ảnh.
            </div>
        </div>


        <div class="mb-3">
            <label for="exampleFormControlInput3" class="form-label">Ngày sinh</label>
            <input type="date" class="form-control" name ='ngay_sinh' id="exampleFormControlInput1" value="{{$Data_NhanVien->ngay_sinh? \Carbon\Carbon::parse($Data_NhanVien->ngay_sinh)->format('Y-m-d'):'' }}" >
            <div class="invalid-feedback">
                Bạn cần chọn ngày sinh.
            </div>
        </div>  

        <div class="mb-3">
            <label for="exampleFormControlInput4" class="form-label">Địa chỉ</label>
            <input type="text" class="form-control" name ='dia_chi' id="exampleFormControlInput1" value="{{ $Data_NhanVien->dia_chi }}" >
            <div class="invalid-feedback">
                Bạn cần nhập địa chỉ.
            </div>
        </div>  

        <div class="mb-3">
            <label for="exampleFormControlInput5" class="form-label">Điện thoại</label>
            <input type="text" class="form-control" name ='dien_thoai' id="exampleFormControlInput1" value="{{ $Data_NhanVien->dien_thoai }}" >
            <div class="invalid-feedback">
                Bạn cần số điện thoại.
            </div>
        </div>  

        <div class="mb-3">
            <label for="exampleFormControlInput6" class="form-label">Giới tính</label>
            <select id="exampleFormControlInput6"  name="gioi_tinh" class="form-select " aria-label="Default select example" required>
                <option value="" selected>---</option>
                <option value="1" {{ $Data_NhanVien->gioi_tinh == '1'? 'selected':'' }}>Nam</option>
                <option value="0" {{ $Data_NhanVien->gioi_tinh == '0'? 'selected':'' }}>Nữ</option>
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
                    <option value="{{ $item->ma_chuc_vu }}" {{ $Data_NhanVien->ma_chuc_vu == $item->ma_chuc_vu? 'selected':'' }}>{{ $item->ten_chuc_vu }}</option>
                @endforeach
            </select>
            <div class="invalid-feedback">
                Bạn cần chọn chức vụ.
            </div>
        </div>

        <div class="mb-3">
            <label for="exampleFormControlInput8" class="form-label">Tài khoản</label>
            <input type="text" class="form-control" name ='tai_khoan' readonly id="exampleFormControlInput8" value="{{ $Data_NhanVien->ma_nhan_vien  }}" >
        </div>

        <div class="col-12">
            <button type="submit" class="btn btn-primary">Cập nhật</button>
            <a href="{{ route('Admin.NhanVien.index') }}"class="btn btn-dark">Quay lại</a>
        </div>
    </form>
    
@endsection

@section('js')
    <script>
        document.getElementById('imageEdit').onchange = function(e) {
                const previewImageNew = document.getElementById('previewImageNew');
                const fileInput = e.target;
                if (fileInput.files && fileInput.files[0]) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        previewImageNew.src = e.target.result;
                        previewImageNew.style.display = 'block';
                    };
                    reader.readAsDataURL(fileInput.files[0]);
                } else
                {
                    previewImageNew.src = document.getElementById('previewImage').src;
                    
                }
                    
            };
    </script>

@endsection
