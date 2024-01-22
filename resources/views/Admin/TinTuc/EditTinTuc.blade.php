@extends('Layout.Admin_NhanVien.Layout')
@section('Title', 'Sửa tin tức')

@section('Admin_Renderbody')
    <form class="row g-3 needs-validation" novalidate style="padding: 50px" method="POST"  action="{{ route('Admin.TinTuc.update', $Data_TinTuc->ma_tin_tuc) }}" enctype="multipart/form-data">
       @csrf @method('PUT')
       
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Mã tin tức</label>
            <input type="text" class="form-control" name ='ma_tin_tuc' readonly id="exampleFormControlInput1" value="{{ $Data_TinTuc->ma_tin_tuc }}" >
            
        </div>

        <div class="mb-3">
            <label for="exampleFormControlInput2" class="form-label">Ảnh đại diện</label>
            <input type="file" class="form-control" name ='anh_dai_dien' id="imageEdit"  >
            <div class="row" style="margin: auto; padding-top:20px">
                <div class="col-6" style="display: flex; flex-direction: column; align-items: center; text-align: center;">
                    <label class="form-label">Ảnh cũ</label>
                    <img  id="previewImage"  src="{{asset('IMG_TinTuc/'.$Data_TinTuc->anh_dai_dien)}}" alt="Preview Image" 
                    style="width: 250px; height:250px">
                </div>

                <div class="col-6" style="display: flex; flex-direction: column; align-items: center; text-align: center;" >
                    <label class="form-label">Ảnh mới(Mặc định là theo ảnh cũ)</label>
                    <img  id="previewImageNew"  src="{{asset('IMG_TinTuc/'.$Data_TinTuc->anh_dai_dien)}}" alt="Preview Image" 
                    style="width: 250px; height:250px">
                </div>
                
            </div>
            <div class="invalid-feedback">
                Bạn cần chọn ảnh.
            </div>
        </div>

        <div class="mb-3">
            <label for="exampleFormControlInput3" class="form-label">Tiêu đề</label>
            <input type="text" class="form-control" name ='tieu_de' id="exampleFormControlInput3" value="{{ $Data_TinTuc->tieu_de }}"  required>
            <div class="invalid-feedback">
                Bạn cần nhập tiêu đề
            </div>
        </div>

        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Nội dung</label>
            <textarea  class="form-control" name ='noi_dung' id="Edit_TinTuc_editor" rows="" required >{{ $Data_TinTuc->noi_dung }}</textarea>
            <div class="invalid-feedback">
                Bạn cần nhập nội dung.
            </div>
        </div>
        
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Cập nhật</button>
            <a href="{{ route('Admin.TinTuc.index') }}"class="btn btn-dark">Quay lại</a>
        </div>
    </form>
  @endsection

  @section('js')
    <script>
        ClassicEditor
        .create( document.querySelector( '#Edit_TinTuc_editor' ),
        {
            ckfinder: {
                uploadUrl:"{{ route('ckeditor.uploadImage', ['_token'=>csrf_token(), 'isCheck' => 'TinTuc']) }}"
            }
        })
        .catch( error => {
            console.error( error );
        } );

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