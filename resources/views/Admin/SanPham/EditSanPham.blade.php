@extends('Layout.Admin_NhanVien.Layout')
@section('Title', 'Sửa sản phẩm')

@section('Admin_Renderbody')
    {{-- thuộc tính novalidate boolean vào tệp <form>. Điều này vô hiệu hóa chú giải công cụ phản hồi mặc định của trình duyệt  --}}
    <form class="row g-3 needs-validation" novalidate style="padding: 50px" method="POST"  action="{{ route('Admin.SanPham.update', $Data_SanPham->ma_san_pham) }}" enctype="multipart/form-data">
        @csrf @method('PUT')
        
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Mã sản phẩm</label>
            <input type="text" class="form-control" name ='ma_san_pham'readonly id="exampleFormControlInput1" value="{{ $Data_SanPham->ma_san_pham }}" >
        </div>


        <div class="mb-3">
            <label for="exampleFormControlInput2" class="form-label">Tên sản phẩm</label>
            <input type="text" class="form-control" name ='ten_san_pham' id="exampleFormControlInput2" value="{{ $Data_SanPham->ten_san_pham }}" required>
            <div class="invalid-feedback">
                Bạn cần nhập tên.
            </div>
        </div>

        <div class="mb-3">
            <label for="exampleFormControlInput3" class="form-label">Thể loại</label>
            <select id="exampleFormControlInput3"  name="ma_the_loai" class="form-select " aria-label="Default select example" required>
                <option value="" selected>---</option>
                @foreach ($Data_TheLoai as $item)
                    <option value="{{ $item->ma_the_loai }}" {{ $Data_SanPham->ma_the_loai ==  $item->ma_the_loai? 'selected':'' }} >{{ $item->ten_the_loai }}</option>
                @endforeach
                
            </select>
            <div class="invalid-feedback">
                Bạn cần chọn thể loại.
            </div>
        </div>

        <div class="mb-3">
            <label for="exampleFormControlInput4" class="form-label">Đơn giá nhập</label>
            <input type="number" class="form-control" min="1000" name ='don_gia_nhap' id="exampleFormControlInput4"  value="{{  $Data_SanPham->don_gia_nhap }}" required>
            <div class="invalid-feedback">
                Bạn cần nhập đơn giá nhập.
            </div>
        </div>

        <div class="mb-3">
            <label for="exampleFormControlInput5" class="form-label">Đơn giá bán</label>
            <input type="number" class="form-control" min="1000" name ='don_gia_ban' id="exampleFormControlInput5"  value="{{  $Data_SanPham->don_gia_ban }}" required>
            <div class="invalid-feedback">
                Bạn cần nhập đơn giá bán.
            </div>
        </div>

        <div class="mb-3">
            <label for="exampleFormControlInput6" class="form-label">Giảm giá</label>
            <input type="number" class="form-control" name ='giam_gia' id="exampleFormControlInput6" min="0" max="100"  value="{{  $Data_SanPham->giam_gia? $Data_SanPham->giam_gia:0 }}" >
            <div class="invalid-feedback">
                Bạn cần nhập đơn giá bán và không được nhỏ hơn 0.
            </div>
        </div>

        <div class="mb-3">
            <label for="exampleFormControlInput7" class="form-label">Ảnh đại diện</label>
            <input type="file" class="form-control" name ='anh_dai_dien' id="imageEdit"  >
            <div class="row" style="margin: auto; padding-top:20px">
                <div class="col-6" style="display: flex; flex-direction: column; align-items: center; text-align: center;">
                    <label class="form-label">Ảnh cũ</label>
                    <img  id="previewImage"  src="{{asset('IMG_SanPham/'.$Data_SanPham->anh_dai_dien)}}" alt="Preview Image" 
                    style="width: 250px; height:250px">
                </div>

                <div class="col-6" style="display: flex; flex-direction: column; align-items: center; text-align: center;" >
                    <label class="form-label">Ảnh mới(Mặc định là theo ảnh cũ)</label>
                    <img  id="previewImageNew"  src="{{asset('IMG_SanPham/'.$Data_SanPham->anh_dai_dien)}}" alt="Preview Image" 
                    style="width: 250px; height:250px">
                </div>
                
            </div>
            <div class="invalid-feedback">
                Bạn cần chọn ảnh.
            </div>
        </div>

        <div class="mb-3">
            <label for="exampleFormControlInput8" class="form-label">Ảnh chi tiết</label>
            <button class="btn btn-outline-secondary" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <i class="fa fa-folder-open"></i>
            </button>
            <input id="input-image" hidden type="text" name="image_list" class="form-control" placeholder="">
            <div class="row" id="show-imgeList">
                @foreach ($ListImage as $item)
                    <div class="col-md-3">
                        <img id="img-show" src="{{ asset('IMG_SanPham/'.$item->hinh_anh)}}" alt="" style="width:100%;height:220px;margin-top: 20px;">
                    </div>
                @endforeach
            </div>
            <div class="invalid-feedback">
                Bạn cần chọn ảnh chi tiết sản phẩm.
            </div>
        </div>


        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Mô tả</label>
            <textarea class="form-control" name ='mo_ta' id="Edit_SanPham_ckeditor" rows="3" required >{{  $Data_SanPham->mo_ta }}</textarea>
            <div class="invalid-feedback">
                Bạn cần nhập mô tả.
            </div>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">cập nhật</button>
            <a href="{{ route('Admin.SanPham.index') }}"class="btn btn-dark">Quay lại</a>
        </div>
    </form>
@endsection
@section('js')
    <script>
        ClassicEditor
        .create( document.querySelector( '#Edit_SanPham_ckeditor' ),
        {
            ckfinder: {
                uploadUrl:"{{ route('ckeditor.uploadImage', ['_token'=>csrf_token(), 'isCheck' => 'SanPham']) }}"
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


        $('#exampleModal').on('hide.bs.modal', event=>
        {
            $('.modal-backdrop').hide();
            $('#show-imgeList').html('');
            var _link = $('#input-image').val();
            var _html = '';
            if(_link!='')
            {
                if(_link[0]==='[')
                {
                    var arrs =  $.parseJSON(_link);
                    for(var i=0;i<arrs.length;i++)
                    {
                        var _url = "{{ asset('IMG_SanPham') }}"+'/'+arrs[i];
                        _html += `<div class="col-md-3"><img id="img-show" src="` + _url + `" alt="" style="width:100%;height:220px;margin-top: 20px;"></div>`;
                    }
                    $('#input-image').val(arrs);
                } 
                else
                {
                    var _url = "{{ asset('IMG_SanPham') }}"+'/'+_link;
                    _html += `<div class="col-md-3"><img id="img-show" src="` + _url + `" alt="" style="width:100%;height:220px;margin-top: 20px;"></div>`;
                }
                $('#show-imgeList').html(_html);

            }
            
            
        });

        $('#exampleModal').on('show.bs.modal', event=>
        {
            
            $('#page-top').css({
                'overflow': 'auto'
            });
        });
    </script>
    
@endsection