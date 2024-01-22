@extends('Layout.Admin_NhanVien.Layout')
@section('Title', 'Tin Tức')

@section('Admin_Renderbody')
    
    <div style="padding: 20px">
        <a href="{{ route('Admin.TinTuc.create') }}" class="btn btn-primary">Thêm tin tức</a>
        <form action="" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" style="float: right; display: flex;">
            <div class="input-group">
                <input type="text" name="Key_TinTuc" value="{{ request()->Key_TinTuc }}" class="form-control bg-light border-0 small" placeholder="Tìm kiếm..."
                    aria-label="Search" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">
                        <i class="fas fa-search fa-sm"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>
    
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped ">
                <thead>
                    <tr>
                        <th>
                            <div class="row">
                                <div class="col-6" style=" margin: 0; padding:0">
                                    Mã tin tức
                                </div>
                                <div class="col-6" style=" margin: 0; padding:0">
                                    <a   onclick="sort('ma_tin_tuc', 'asc')" class="bi bi-arrow-up-short" style=""></i>
                                    <a   onclick="sort('ma_tin_tuc', 'desc')" class="bi bi-arrow-down-short" style="display: block;"></a>
                                </div>
                            </div>
                        </th>

                        <th>Ảnh đại diện</th>

                        <th>
                            <div class="row">
                                <div class="col-6" style=" margin: 0; padding:0">
                                    Tiêu đề
                                </div>
                                <div class="col-6" style=" margin: 0; padding:0">
                                    <a   onclick="sort('tieu_de', 'asc')" class="bi bi-arrow-up-short" style=""></i>
                                    <a   onclick="sort('tieu_de', 'desc')" class="bi bi-arrow-down-short" style="display: block;"></a>
                                </div>
                            </div>
                        </th>
                       
                        <th class="text-center">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($Data_TinTuc as $item)
                        <tr>
                            <td>{{ $item->ma_tin_tuc }}</td>
                            <td><img style="width:95px; height:81px" src="{{ asset('IMG_TinTuc/'.$item->anh_dai_dien) }}" alt=""></td>
                            <td>{{ $item->tieu_de}}</td>
                            
                            <td class="text-center">
                                <a href="{{ route('Admin.TinTuc.show', $item->ma_tin_tuc) }}" class="btn btn-success">
                                    <i class="bi bi-journals"></i>
                                </a>
                                <a href="{{ route('Admin.TinTuc.edit', $item->ma_tin_tuc) }}" class="btn btn-success">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <a href="{{ route('Admin.TinTuc.destroy', $item->ma_tin_tuc) }}" class="btn btn-danger btn_delete_tintuc">
                                    <i class="bi bi-x-square-fill"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div>
                {{ $Data_TinTuc->appends(request()->all())->links() }} {{-- dữ nguyên tham số trên URL --}}
            </div>
            <form method="POST" action="" id="from_delete_tintuc">
                @csrf @method('DELETE')
            </form>
        </div>
    </div>
    
@endsection

@section('js')
    <script>
        var url = "{{ route('Admin.TinTuc.index') }}";
        $('.btn_delete_tintuc').click(function(ev){
            ev.preventDefault();// k cho load lại trang
            var _herf = $(this).attr('href'); // lấy link của thẻ a hiện tại đang click vào
            $('#from_delete_tintuc').attr('action', _herf); // gán action của vào form là href của thẻ a vừa click vào
            
            Swal.fire({
                title: 'Bạn muốn xóa tin tức này không?',
                text: "",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText:'Không',
                confirmButtonText: 'Có'
            }).then((result) => {
            if (result.isConfirmed) 
            {
                //Swal.fire('Xóa thành công!','','success');
                $('#from_delete_tintuc').submit();
            }
            });
        });
    </script>
    @if (session()->has('XoaTinTuc_ThanhCong'))
        <script>Swal.fire('Xóa thành công',  '{{ session()->get('XoaTinTuc_ThanhCong') }}' ,'success');</script>
    @endif 
    @if (session()->has('SuaTinTuc_ThanhCong'))
        <script>Swal.fire('Sửa thành công', '{{ session()->get('SuaTinTuc_ThanhCong') }}' ,'success');</script>
    @endif 
    @if (session()->has('ThemTinTuc_ThanhCong'))
        <script>Swal.fire('Thêm thành công', '{{ session()->get('ThemTinTuc_ThanhCong') }}' ,'success');</script>
    @endif 
@endsection
