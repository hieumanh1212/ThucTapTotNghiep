@extends('Layout.Admin_NhanVien.Layout')
@section('Title', 'Sửa chi tiết sản phẩm')

@section('Admin_Renderbody')
<form class="row g-3 needs-validation" novalidate style="padding: 50px" method="POST"  action="{{ route('Admin.ChiTietSanPham.update', $Data_ChiTietSanPham->ma_chi_tiet_san_pham) }}" enctype="multipart/form-data">
    @csrf @method('PUT')
    
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Mã sản phẩm</label>
        <input type="text" class="form-control" name ='ma_san_pham'readonly id="exampleFormControlInput1" value="{{  $Data_ChiTietSanPham->ma_san_pham }}" >
    </div>


    <div class="mb-3">
        <label for="exampleFormControlInput2" class="form-label">Tên sản phẩm</label>
        <input type="text" class="form-control" name ='ten_san_pham' readonly id="exampleFormControlInput2" value="{{ request()->ten_san_pham }}" >
    </div>
    
    <div class="mb-3">
        <label for="exampleFormControlInput3" class="form-label">Mã chi tiết sản phẩm</label>
        <input type="text" class="form-control" name ='ma_chi_tiet_san_pham' readonly id="exampleFormControlInput3" value="{{ $Data_ChiTietSanPham->ma_chi_tiet_san_pham }}" >
    </div>

    <div class="mb-3">
        <label for="exampleFormControlInput5" class="form-label">Size</label>
        <select id="exampleFormControlInput5"  name="ma_size" class="form-select " aria-label="Default select example" required>
            <option value="" selected>---</option>
            @foreach ($Data_Size as $item)
                <option value="{{ $item->ma_size }}" {{ $item->ma_size == $Data_ChiTietSanPham->ma_size? 'selected':'' }}>{{ $item->size }}</option>
            @endforeach
            
        </select>
        <div class="invalid-feedback">
            Bạn cần chọn size.
        </div>
    </div>

    <div class="mb-3">
        <label for="exampleFormControlInput6" class="form-label">Màu sắc</label>
        <select id="exampleFormControlInput6"  name="ma_mau" class="form-select " aria-label="Default select example" required>
            <option value="" selected>---</option>
            @foreach ($Data_MauSac as $item)
                <option value="{{ $item->ma_mau }} " {{ $item->ma_mau ==  $Data_ChiTietSanPham->ma_mau? 'selected':'' }}>{{ $item->mau }}</option>
            @endforeach
        </select>
        <div class="invalid-feedback">
            Bạn cần chọn màu sắc.
        </div>
    </div>

    <div class="col-12">
        <button type="submit" class="btn btn-primary">Cập nhật</button>
        <a href="{{ route('Admin.SanPham.show', $Data_ChiTietSanPham->ma_san_pham) }}"class="btn btn-dark">Quay lại</a>
    </div>
</form>

@endsection

@section('js')
    @if (session()->has('SuaChiTietSanPham_Error'))
    <script>Swal.fire('Sửa không thành công',  '{{ session()->get('SuaChiTietSanPham_Error') }}' ,'error');</script>
    @endif 
@endsection