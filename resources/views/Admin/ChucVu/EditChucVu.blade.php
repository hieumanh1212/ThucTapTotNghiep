@extends('Layout.Admin_NhanVien.Layout')
@section('Title', 'Sửa chức vụ')

@section('Admin_Renderbody')
    <form class="row g-3 needs-validation" novalidate style="padding: 50px" method="POST"  action="{{ route('Admin.ChucVu.update', $Data_ChucVu->ma_chuc_vu) }}" enctype="multipart/form-data">
       @csrf @method('PUT')
       
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Mã chức vụ</label>
            <input type="text" class="form-control" name ='ma_chuc_vu' readonly id="exampleFormControlInput1" value="{{ $Data_ChucVu->ma_chuc_vu }}" >
            
        </div>

        

        <div class="mb-3">
            <label for="exampleFormControlInput3" class="form-label">Tên chức vụ</label>
            <input type="text" class="form-control" name ='ten_chuc_vu' id="exampleFormControlInput3" value="{{ $Data_ChucVu->ten_chuc_vu }}"  required>
            <div class="invalid-feedback">
                Bạn cần nhập tên chức vụ
            </div>
        </div>

       
        
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Cập nhật</button>
            <a href="{{ route('Admin.ChucVu.index') }}"class="btn btn-dark">Quay lại</a>
        </div>
    </form>
  @endsection

  @section('js')
    <script>
        

        
    </script>
     
  @endsection