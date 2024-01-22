@extends('Layout.Admin_NhanVien.Layout')
@section('Title', 'Thêm tin tức')

@section('Admin_Renderbody')
    {{-- thuộc tính novalidate boolean vào tệp <form>. Điều này vô hiệu hóa chú giải công cụ phản hồi mặc định của trình duyệt  --}}
    <form class="row g-3 needs-validation" novalidate style="padding: 50px" method="POST"  action="{{ route('Admin.TinTuc.store') }}" enctype="multipart/form-data">
        @csrf @method('POST')
        
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Mã tin tức</label>
            <input type="text" class="form-control" name ='ma_tin_tuc' readonly id="exampleFormControlInput1" value="{{ $auto_ma_tin_tuc }}" >
            
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
            <label for="exampleFormControlInput3" class="form-label">Tiêu đề</label>
            <input type="text" class="form-control" name ='tieu_de' id="exampleFormControlInput3"   required>
            <div class="invalid-feedback">
                Bạn cần nhập tiêu đề
            </div>
        </div>

        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Nội dung</label>
            <textarea class="form-control" name ='noi_dung' id="Create_TinTuc_ckeditor" rows="3" required ></textarea>
            <div class="invalid-feedback">
                Bạn cần nhập nội dung.
            </div>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Thêm tin tức</button>
            <a href="{{ route('Admin.TinTuc.index') }}"class="btn btn-dark">Quay lại</a>
        </div>
    </form>
@endsection
@section('js')
    <script>
        ClassicEditor
        .create( document.querySelector( '#Create_TinTuc_ckeditor' ),
        {
            ckfinder: {
                uploadUrl:"{{ route('ckeditor.uploadImage', ['_token'=>csrf_token(), 'isCheck' => 'TinTuc']) }}"
            }
        })
        .catch( error => {
            console.error( error );
        } );
    </script>
    
@endsection