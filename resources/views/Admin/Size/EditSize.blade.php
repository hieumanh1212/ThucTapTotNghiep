@extends('Layout.Admin_NhanVien.Layout')
@section('Title', 'Sửa size')

@section('Admin_Renderbody')
    <form class="row g-3 needs-validation" novalidate style="padding: 50px" method="POST"  action="{{ route('Admin.Size.update', $Data_Size->ma_size) }}" enctype="multipart/form-data">
       @csrf @method('PUT')
       
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Mã size</label>
            <input type="text" class="form-control" name ='ma_size' readonly id="exampleFormControlInput1" value="{{ $Data_Size->ma_size }}" >
            
        </div>

        

        <div class="mb-3">
            <label for="exampleFormControlInput3" class="form-label">Tên size</label>
            <input type="text" class="form-control" name ='size' id="exampleFormControlInput3" value="{{ isset(request()->oldSize) ?request()->oldSize: $Data_Size->size }}"  required>
            <div class="invalid-feedback">
                Bạn cần nhập size.
            </div>
        </div>

       
        
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Cập nhật</button>
            <a href="{{ route('Admin.Size.index') }}"class="btn btn-dark">Quay lại</a>
        </div>
    </form>
@endsection

@section('js')
    @if (session()->has('SuaSize_Error'))
        <script>Swal.fire('Thêm thành công', '{{ session()->get('SuaSize_Error') }}' ,'error');</script>
    @endif
@endsection