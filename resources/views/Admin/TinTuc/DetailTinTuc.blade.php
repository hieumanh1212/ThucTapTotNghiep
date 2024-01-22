@extends('Layout.Admin_NhanVien.Layout')
@section('Title', 'Chi Tiết tin tức')

@section('Admin_Renderbody')


<div class="card-body">
    <div class="table-responsive">
        <table class="table ">
            <tbody>
                <tr>
                    <th class="col-2">Mã tin tức</th>
                    <td class="col-10">{{ $Data_TinTuc->ma_tin_tuc }}</td>
                </tr>  
                
                <tr>
                    <th class="col-2">Tiêu đề</th>
                    <td class="col-10">{{ $Data_TinTuc->tieu_de }}</td>
                </tr> 

                <tr>
                    <th class="col-2">Ảnh đại diện</th>
                    <td class="col-10" style="display: flex; flex-direction: column; align-items: center; text-align: center;">
                        <img  style="width: 300px;height: 300px;"  src="{{asset('IMG_TinTuc/'.$Data_TinTuc->anh_dai_dien)}}" alt="Preview Image" 
                    </td>
                </tr> 
                
                <tr>
                    <th class="col-2">Nội dung</th>
                    <td class="col-10">
                        <textarea  class="form-control" name ='noi_dung' id="Edit_ChiTiet_editor" rows="" required >{{ $Data_TinTuc->noi_dung }}</textarea>
                    </td>
                </tr> 

            </tbody>
        </table>
        <a href="{{ route('Admin.TinTuc.index') }}" class="btn btn-dark">Quay lại</a>
    </div>
</div>
@endsection
@section('js')
    <script>
        ClassicEditor
        .create( document.querySelector( '#Edit_ChiTiet_editor' ),
        {
            ckfinder: {
                uploadUrl:"{{ route('ckeditor.uploadImage', ['_token'=>csrf_token(), 'isCheck' => 'ChiTiet']) }}"
            }
        })
        .catch( error => {
            console.error( error );
        } );
        
    </script>
    

    
@endsection