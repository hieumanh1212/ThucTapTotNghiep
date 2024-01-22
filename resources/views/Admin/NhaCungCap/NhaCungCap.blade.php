@extends('Layout.Admin_NhanVien.Layout')
@section('Title', 'Nhà cung cấp')

@section('Admin_Renderbody')
    <div style="padding: 20px">
        <a href="{{ route('Admin.NhaCungCap.create') }}" class="btn btn-primary">Thêm nhà cung cấp</a>
        <form action="" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" style="float: right; display: flex;">
            <div class="input-group">
                <input type="text" name="Key_NhaCungCap" value="{{ request()->Key_NhaCungCap }}" class="form-control bg-light border-0 small" placeholder="Tìm kiếm..."
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
                                    Mã nhà cung cấp
                                </div>
                                <div class="col-6" style=" margin: 0; padding:0">
                                    <a   onclick="sort('ma_nha_cung_cap', 'asc')" class="bi bi-arrow-up-short" style=""></i>
                                    <a   onclick="sort('ma_nha_cung_cap', 'desc')" class="bi bi-arrow-down-short" style="display: block;"></a>
                                </div>
                            </div>
                        </th>
                        
                        <th>
                            <div class="row">
                                <div class="col-6" style=" margin: 0; padding:0">
                                    Tên nhà cung cấp
                                </div>
                                <div class="col-6" style=" margin: 0; padding:0">
                                    <a   onclick="sort('ten_nha_cung_cap', 'asc')" class="bi bi-arrow-up-short" style=""></i>
                                    <a   onclick="sort('ten_nha_cung_cap', 'desc')" class="bi bi-arrow-down-short" style="display: block;"></a>
                                </div>
                            </div>
                        </th>

                        <th>Email</th>

                        <th>
                            <div class="row">
                                <div class="col-6" style=" margin: 0; padding:0">
                                    Số điện thoại
                                </div>
                                <div class="col-6" style=" margin: 0; padding:0">
                                    <a   onclick="sort('so_dien_thoai', 'asc')" class="bi bi-arrow-up-short" style=""></i>
                                    <a   onclick="sort('so_dien_thoai', 'desc')" class="bi bi-arrow-down-short" style="display: block;"></a>
                                </div>
                            </div>
                        </th>

                        <th class="text-center">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($Data_NhaCungCap as $item)
                        <tr>
                            <td>{{ $item->ma_nha_cung_cap }}</td>
                            <td>{{ $item->ten_nha_cung_cap}}</td>
                            <td>{{ $item->email}}</td>
                            <td>{{ $item->so_dien_thoai}}</td>

                            
                            <td class="text-center">
                                <a href="{{ route('Admin.NhaCungCap.show', $item->ma_nha_cung_cap) }}" class="btn btn-success">
                                    <i class="bi bi-journals"></i>
                                </a>
                                <a href="{{ route('Admin.NhaCungCap.edit', $item->ma_nha_cung_cap) }}" class="btn btn-success">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <a href="{{ route('Admin.NhaCungCap.destroy', $item->ma_nha_cung_cap) }}" class="btn btn-danger btn_delete_nhacungcap">
                                    <i class="bi bi-x-square-fill"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div>
                {{ $Data_NhaCungCap->appends(request()->all())->links() }} {{-- dữ nguyên tham số trên URL --}}
            </div>
            <form method="POST" action="" id="from_delete_nhacungcap">
                @csrf @method('DELETE')
            </form>
        </div>
    </div>
@endsection
@section('js')
    <script>
        var url = "{{ route('Admin.NhaCungCap.index') }}";
        $('.btn_delete_nhacungcap').click(function(ev){
            ev.preventDefault();// k cho load lại trang
            var _herf = $(this).attr('href'); // lấy link của thẻ a hiện tại đang click vào
            $('#from_delete_nhacungcap').attr('action', _herf); // gán action của vào form là href của thẻ a vừa click vào
            
            Swal.fire({
                title: 'Bạn muốn xóa nhà cung cấp này không?',
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
                $('#from_delete_nhacungcap').submit();
            }
            });
        });
    </script>
    @if (session()->has('XoaNhaCungCap_ThanhCong'))
        <script>Swal.fire('Xóa thành công',  '{{ session()->get('XoaNhaCungCap_ThanhCong') }}' ,'success');</script>
    @endif 

    @if (session()->has('XoaNhaCungCap_Error'))
        <script>Swal.fire('Xóa thành công',  '{{ session()->get('XoaNhaCungCap_Error') }}' ,'error');</script>
    @endif 

    @if (session()->has('SuaNhaCungCap_ThanhCong'))
        <script>Swal.fire('Sửa thành công', '{{ session()->get('SuaNhaCungCap_ThanhCong') }}' ,'success');</script>
    @endif 
    @if (session()->has('ThemNhaCungCap_ThanhCong'))
        <script>Swal.fire('Thêm thành công', '{{ session()->get('ThemNhaCungCap_ThanhCong') }}' ,'success');</script>
    @endif
@endsection
