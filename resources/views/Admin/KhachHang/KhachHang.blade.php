@extends('Layout.Admin_NhanVien.Layout')
@section('Title', 'Khách hàng')

@section('Admin_Renderbody')
    <div style="padding: 20px">
        {{-- <a href="{{ route('Admin.create') }}" class="btn btn-primary">Thêm tin tức</a> --}}
        <form action="" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" style="float: right; display: flex;">
            <div class="input-group">
                <input type="text" name="Key_KhachHang" value="{{ request()->Key_KhachHang }}" class="form-control bg-light border-0 small" placeholder="Tìm kiếm..."
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
                                    Mã khách hàng
                                </div>
                                <div class="col-6" style=" margin: 0; padding:0">
                                    <a   onclick="sort('ma_khach_hang', 'asc')" class="bi bi-arrow-up-short" style=""></i>
                                    <a   onclick="sort('ma_khach_hang', 'desc')" class="bi bi-arrow-down-short" style="display: block;"></a>
                                </div>
                            </div>
                        </th>
                        
                        <th>
                            <div class="row">
                                <div class="col-6" style=" margin: 0; padding:0">
                                    Tên khách hàng
                                </div>
                                <div class="col-6" style=" margin: 0; padding:0">
                                    <a   onclick="sort('ten_khach_hang', 'asc')" class="bi bi-arrow-up-short" style=""></i>
                                    <a   onclick="sort('ten_khach_hang', 'desc')" class="bi bi-arrow-down-short" style="display: block;"></a>
                                </div>
                            </div>
                        </th>
                        
                        <th>
                            <div class="row">
                                <div class="col-6" style=" margin: 0; padding:0">
                                    Ngày sinh
                                </div>
                                <div class="col-6" style=" margin: 0; padding:0">
                                    <a   onclick="sort('ngay_sinh', 'asc')" class="bi bi-arrow-up-short" style=""></i>
                                    <a   onclick="sort('ngay_sinh', 'desc')" class="bi bi-arrow-down-short" style="display: block;"></a>
                                </div>
                            </div>
                        </th>
                        <th>Địa chỉ</th> 
                        
                        <th>
                            <div class="row">
                                <div class="col-6" style=" margin: 0; padding:0">
                                    Điện thoại
                                </div>
                                <div class="col-6" style=" margin: 0; padding:0">
                                    <a   onclick="sort('dien_thoai', 'asc')" class="bi bi-arrow-up-short" style=""></i>
                                    <a   onclick="sort('dien_thoai', 'desc')" class="bi bi-arrow-down-short" style="display: block;"></a>
                                </div>
                            </div>
                        </th>

                        <th>Giới tính</th> 
                        <th>Email</th> 
                    
                        <th class="text-center">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($Data_KhachHang as $item)
                        <tr>
                            <td>{{ $item->ma_khach_hang }}</td>
                            <td>{{ $item->ten_khach_hang}}</td>
                            <td>{{ $item->ngay_sinh}}</td>
                            <td>{{ $item->dia_chi}}</td>
                            <td>{{ $item->dien_thoai}}</td>
                            <td>{{ $item->gioi_tinh}}</td>
                            <td>{{ $item->email}}</td>
                            
                            <td class="text-center">
                                <a href="{{ route('Admin.KhachHang.show', $item->ma_khach_hang) }}" class="btn btn-success">
                                    <i class="bi bi-journals"></i>
                                </a>
                                <a href="{{ route('Admin.KhachHang.destroy', $item->ma_khach_hang) }}" class="btn btn-danger btn_delete_KhachHang">
                                    <i class="bi bi-x-square-fill"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div>
                {{ $Data_KhachHang->appends(request()->all())->links() }} {{-- dữ nguyên tham số trên URL --}}
            </div>
            <form method="POST" action="" id="from_delete_KhachHang">
                @csrf @method('DELETE')
            </form>
        </div>
    </div>
@endsection
@section('js')
    <script>
        var url = "{{ route('Admin.KhachHang.index') }}";
        $('.btn_delete_KhachHang').click(function(ev){
            ev.preventDefault();// k cho load lại trang
            var _herf = $(this).attr('href'); // lấy link của thẻ a hiện tại đang click vào
            $('#from_delete_KhachHang').attr('action', _herf); // gán action của vào form là href của thẻ a vừa click vào
            
            Swal.fire({
                title: 'Bạn muốn xóa khách hàng này không?',
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
                $('#from_delete_KhachHang').submit();
            }
            });
        });
    </script>
    @if (session()->has('XoaKhachHang_ThanhCong'))
        <script>Swal.fire('Xóa thành công',  '{{ session()->get('XoaKhachHang_ThanhCong') }}' ,'success');</script>
    @endif 

    @if (session()->has('XoaKhachHang_Error'))
        <script>Swal.fire('Xóa thành công',  '{{ session()->get('XoaKhachHang_Error') }}' ,'error');</script>
    @endif 
@endsection