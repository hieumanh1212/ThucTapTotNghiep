@extends('Layout.Admin_NhanVien.Layout')
@section('Title', 'Thêm thể loại')

@section('Admin_Renderbody')
    <form class="row g-3 needs-validation" novalidate style="padding: 50px" method="POST"  action="{{ route('Admin.TheLoai.store', $auto_ma_the_loai) }}" enctype="multipart/form-data">
       @csrf @method('POST')
       
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Mã thể loại</label>
            <input type="text" class="form-control" name ='ma_the_loai' readonly id="exampleFormControlInput1" value="{{ $auto_ma_the_loai }}" >
            
        </div>

        

        <div class="mb-3">
            <label for="exampleFormControlInput3" class="form-label">Tên thể loại</label>
            <input type="text" class="form-control" name ='ten_the_loai' id="exampleFormControlInput3"  required>
            <div class="invalid-feedback">
                Bạn cần nhập tên thể loại.
            </div>
        </div>

       
        
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Thêm thể loại</button>
            <a href="{{ route('Admin.TheLoai.index') }}"class="btn btn-dark">Quay lại</a>
        </div>
    </form>
  @endsection

  @section('js')
     
  @endsection