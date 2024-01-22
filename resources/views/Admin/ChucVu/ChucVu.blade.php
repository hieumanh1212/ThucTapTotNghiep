@extends('Layout.Admin_NhanVien.Layout')
@section('Title', 'Chức vụ')

@section('Admin_Renderbody')
    <div style="padding: 20px">
        <a href="{{ route('Admin.ChucVu.create') }}" class="btn btn-primary">Thêm chức vụ</a>
        <form action="" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" style="float: right; display: flex;">
            <div class="input-group">
                <input type="text" name="Key_ChucVu" value="{{ request()->Key_ChucVu }}" class="form-control bg-light border-0 small" placeholder="Tìm kiếm..."
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
                                    Mã chức vụ
                                </div>
                                <div class="col-6" style=" margin: 0; padding:0">
                                    <a   onclick="sort('ma_chuc_vu', 'asc')" class="bi bi-arrow-up-short" style=""></i>
                                    <a   onclick="sort('ma_chuc_vu', 'desc')" class="bi bi-arrow-down-short" style="display: block;"></a>
                                </div>
                            </div>
                        </th>
                        
                        <th>
                            <div class="row">
                                <div class="col-6" style=" margin: 0; padding:0">
                                    Tên chức vụ
                                </div>
                                <div class="col-6" style=" margin: 0; padding:0">
                                    <a   onclick="sort('ten_chuc_vu', 'asc')" class="bi bi-arrow-up-short" style=""></i>
                                    <a   onclick="sort('ten_chuc_vu', 'desc')" class="bi bi-arrow-down-short" style="display: block;"></a>
                                </div>
                            </div>
                        </th>

                        
                        <th class="text-center">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($Data_ChucVu as $item)
                        <tr>
                            <td>{{ $item->ma_chuc_vu }}</td>
                            <td>{{ $item->ten_chuc_vu}}</td>

                            
                            <td class="text-center">
                                {{-- <a href="" class="btn btn-success">
                                    <i class="bi bi-journals"></i>
                                </a> --}}
                                <a href="{{ route('Admin.ChucVu.edit', $item->ma_chuc_vu) }}" class="btn btn-success">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <a href="{{ route('Admin.ChucVu.destroy', $item->ma_chuc_vu) }}" class="btn btn-danger btn_delete_chucvu">
                                    <i class="bi bi-x-square-fill"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div>
                {{ $Data_ChucVu->appends(request()->all())->links() }} {{-- dữ nguyên tham số trên URL --}}
            </div>
            <form method="POST" action="" id="from_delete_chucvu">
                @csrf @method('DELETE')
            </form>
        </div>
    </div>
@endsection
@section('js')
    <script>
        var url = "{{ route('Admin.ChucVu.index') }}";
        $('.btn_delete_chucvu').click(function(ev){
            ev.preventDefault();// k cho load lại trang
            var _herf = $(this).attr('href'); // lấy link của thẻ a hiện tại đang click vào
            $('#from_delete_chucvu').attr('action', _herf); // gán action của vào form là href của thẻ a vừa click vào
            
            Swal.fire({
                title: 'Bạn muốn xóa chức vụ này không?',
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
                $('#from_delete_chucvu').submit();
            }
            });
        });
    </script>
    @if (session()->has('XoaChucVu_ThanhCong'))
        <script>Swal.fire('Xóa thành công',  '{{ session()->get('XoaChucVu_ThanhCong') }}' ,'success');</script>
    @endif 

    @if (session()->has('XoaChucVu_Error'))
        <script>Swal.fire('Xóa thành công',  '{{ session()->get('XoaChucVu_Error') }}' ,'error');</script>
    @endif 

    @if (session()->has('SuaChucVu_ThanhCong'))
        <script>Swal.fire('Sửa thành công', '{{ session()->get('SuaChucVu_ThanhCong') }}' ,'success');</script>
    @endif 
    @if (session()->has('ThemChucVu_ThanhCong'))
        <script>Swal.fire('Thêm thành công', '{{ session()->get('ThemChucVu_ThanhCong') }}' ,'success');</script>
    @endif
@endsection
