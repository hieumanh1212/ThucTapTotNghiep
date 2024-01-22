@extends('Layout.Admin_NhanVien.Layout')
@section('Title', 'Voucher')

@section('Admin_Renderbody')
    <div style="padding: 20px">
        <a href="{{ route('Admin.Voucher.create') }}" class="btn btn-primary">Thêm voucher</a>
        <form action="" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" style="float: right; display: flex;">
            <div class="input-group">
                <input type="text" name="Key_Voucher" value="{{ request()->Key_Voucher }}" class="form-control bg-light border-0 small" placeholder="Tìm kiếm..."
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
                                    Mã voucher
                                </div>
                                <div class="col-6" style=" margin: 0; padding:0">
                                    <a   onclick="sort('ma_voucher', 'asc')" class="bi bi-arrow-up-short" style=""></i>
                                    <a   onclick="sort('ma_voucher', 'desc')" class="bi bi-arrow-down-short" style="display: block;"></a>
                                </div>
                            </div>
                        </th>

                        <th>
                            <div class="row">
                                <div class="col-6" style=" margin: 0; padding:0">
                                    Tên voucher
                                </div>
                                <div class="col-6" style=" margin: 0; padding:0">
                                    <a   onclick="sort('ten_voucher', 'asc')" class="bi bi-arrow-up-short" style=""></i>
                                    <a   onclick="sort('ten_voucher', 'desc')" class="bi bi-arrow-down-short" style="display: block;"></a>
                                </div>
                            </div>
                        </th>

                        <th>
                            <div class="row">
                                <div class="col-6" style=" margin: 0; padding:0">
                                    Phần trăm
                                </div>
                                <div class="col-6" style=" margin: 0; padding:0">
                                    <a   onclick="sort('phan_tram', 'asc')" class="bi bi-arrow-up-short" style=""></i>
                                    <a   onclick="sort('phan_tram', 'desc')" class="bi bi-arrow-down-short" style="display: block;"></a>
                                </div>
                            </div>
                        </th>

                        <th>
                            <div class="row">
                                <div class="col-6" style=" margin: 0; padding:0">
                                    Số lượng
                                </div>
                                <div class="col-6" style=" margin: 0; padding:0">
                                    <a   onclick="sort('so_luong', 'asc')" class="bi bi-arrow-up-short" style=""></i>
                                    <a   onclick="sort('so_luong', 'desc')" class="bi bi-arrow-down-short" style="display: block;"></a>
                                </div>
                            </div>
                        </th>


                        <th>
                            <div class="row">
                                <div class="col-6" style=" margin: 0; padding:0">
                                    Ngày bắt đầu
                                </div>
                                <div class="col-6" style=" margin: 0; padding:0">
                                    <a   onclick="sort('ngay_bat_dau', 'asc')" class="bi bi-arrow-up-short" style=""></i>
                                    <a   onclick="sort('ngay_bat_dau', 'desc')" class="bi bi-arrow-down-short" style="display: block;"></a>
                                </div>
                            </div>
                        </th>

                        <th>
                            <div class="row">
                                <div class="col-6" style=" margin: 0; padding:0">
                                    Ngày kết thúc
                                </div>
                                <div class="col-6" style=" margin: 0; padding:0">
                                    <a   onclick="sort('ngay_ket_thuc', 'asc')" class="bi bi-arrow-up-short" style=""></i>
                                    <a   onclick="sort('ngay_ket_thuc', 'desc')" class="bi bi-arrow-down-short" style="display: block;"></a>
                                </div>
                            </div>
                        </th>
 
              
                        <th class="text-center">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($Data_Voucher as $item)
                        <tr>
                            <td>{{ $item->ma_voucher }}</td>
                            <td>{{ $item->ten_voucher}}</td>
                            <td>{{ $item->phan_tram}}</td>
                            <td>{{ $item->so_luong}}</td>
                            <td>{{ \Carbon\Carbon::parse($item->ngay_bat_dau)->format('Y-m-d')}}</td>
                            <td>{{\Carbon\Carbon::parse($item->ngay_ket_thuc)->format('Y-m-d')}}</td>
                            
                            <td class="text-center">
                                {{-- <a href="" class="btn btn-success">
                                    <i class="bi bi-journals"></i>
                                </a> --}}
                                <a href="{{ route('Admin.Voucher.edit', $item->ma_voucher) }}" class="btn btn-success">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <a href="{{ route('Admin.Voucher.destroy', $item->ma_voucher) }}" class="btn btn-danger btn_delete_voucher">
                                    <i class="bi bi-x-square-fill"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div>
                {{ $Data_Voucher->appends(request()->all())->links() }} {{-- dữ nguyên tham số trên URL --}}
            </div>
            <form method="POST" action="" id="from_delete_voucher">
                @csrf @method('DELETE')
            </form>
        </div>
    </div>
@endsection
@section('js')
    <script>
        var url = "{{ route('Admin.Voucher.index') }}";
        $('.btn_delete_voucher').click(function(ev){
            ev.preventDefault();// k cho load lại trang
            var _herf = $(this).attr('href'); // lấy link của thẻ a hiện tại đang click vào
            $('#from_delete_voucher').attr('action', _herf); // gán action của vào form là href của thẻ a vừa click vào
            
            Swal.fire({
                title: 'Bạn muốn xóa voucher này không?',
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
                $('#from_delete_voucher').submit();
            }
            });
        });
    </script>
    @if (session()->has('XoaVoucher_ThanhCong'))
        <script>Swal.fire('Xóa thành công',  '{{ session()->get('XoaVoucher_ThanhCong') }}' ,'success');</script>
    @endif 

    @if (session()->has('XoaVoucher_Error'))
        <script>Swal.fire('Xóa thành công',  '{{ session()->get('XoaVoucher_Error') }}' ,'error');</script>
    @endif 

    @if (session()->has('SuaVoucher_ThanhCong'))
        <script>Swal.fire('Sửa thành công', '{{ session()->get('SuaVoucher_ThanhCong') }}' ,'success');</script>
    @endif 
    @if (session()->has('ThemVoucher_ThanhCong'))
        <script>Swal.fire('Thêm thành công', '{{ session()->get('ThemVoucher_ThanhCong') }}' ,'success');</script>
    @endif
@endsection
