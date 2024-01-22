@extends('Layout.Admin_NhanVien.Layout')
@section('Title', 'Hóa đơn bán')

@section('Admin_Renderbody')
    <div style="padding: 20px">
        {{-- <a href="{{ route('Admin.HoaDon.create') }}" class="btn btn-primary">Thêm thể loại</a> --}}
        <form action="" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" style="float: right; display: flex;">
            <div class="input-group">
                <input type="text" name="Key_HoaDonBan" value="{{ request()->Key_HoaDonBan }}" class="form-control bg-light border-0 small" placeholder="Tìm kiếm..."
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
                                    Mã hóa đơn bán
                                </div>
                                
                                <div class="col-6" style="margin: 0; padding: 0; position: relative;">
                                    <div style="position: absolute; bottom: 0;">
                                        <a onclick="sort('ma_hoa_don_ban', 'asc')" class="bi bi-arrow-up-short" style=""></a>
                                        <a onclick="sort('ma_hoa_don_ban', 'desc')" class="bi bi-arrow-down-short" style="display: block;"></a>
                                    </div>
                                </div>
                            </div>
                        </th>
                        
                        <th>
                            <div class="row">
                                <div class="col-6" style=" margin: 0; padding:0">
                                    Ngày tạo hóa đơn   
                                </div>
                                <div class="col-6" style="margin: 0; padding: 0; position: relative;">
                                    <div style="position: absolute; bottom: 0;">
                                        <a onclick="sort('ngay_tao_hoa_don', 'asc')" class="bi bi-arrow-up-short" style=""></a>
                                        <a onclick="sort('ngay_tao_hoa_don', 'desc')" class="bi bi-arrow-down-short" style="display: block;"></a>
                                    </div>
                                </div>
                                
                            </div>
                        </th>

                        <th>
                            <div class="row">
                                <div class="col-6" style=" margin: 0; padding:0">
                                    Tên nhân viên   
                                </div>
                                <div class="col-6" style="margin: 0; padding: 0; position: relative;">
                                    <div style="position: absolute; bottom: 0;">
                                        <a onclick="sort('ten_nhan_vien', 'asc')" class="bi bi-arrow-up-short" style=""></a>
                                        <a onclick="sort('ten_nhan_vien', 'desc')" class="bi bi-arrow-down-short" style="display: block;"></a>
                                    </div>
                                </div>
                            </div>
                        </th>

                        

                        <th>
                            <div class="row">
                                <div class="col-6" style=" margin: 0; padding:0">
                                    Tên khách hàng  
                                </div>

                                <div class="col-6" style="margin: 0; padding: 0; position: relative;">
                                    <div style="position: absolute; bottom: 0;">
                                        <a onclick="sort('ten_khach_hang', 'asc')" class="bi bi-arrow-up-short" style=""></a>
                                        <a onclick="sort('ten_khach_hang', 'desc')" class="bi bi-arrow-down-short" style="display: block;"></a>
                                    </div>
                                </div>
                            </div>
                        </th>

                        <th>
                            <div class="row">
                                <div class="col-6" style=" margin: 0; padding:0">
                                    Tình trạng hóa đơn 
                                </div>


                                <div class="col-6" style="margin: 0; padding: 0; position: relative;">
                                    <div style="position: absolute; bottom: 0;">
                                        <a onclick="sort('tinh_trang_hoa_don', 'asc')" class="bi bi-arrow-up-short" style=""></a>
                                        <a onclick="sort('tinh_trang_hoa_don', 'desc')" class="bi bi-arrow-down-short" style="display: block;"></a>
                                    </div>
                                </div>
                            </div>
                        </th>

                        <th>
                            <div class="row">
                                <div class="col-6" style=" margin: 0; padding:0">
                                    Trạng thái thanh toán 
                                </div>


                                <div class="col-6" style="margin: 0; padding: 0; position: relative;">
                                    <div style="position: absolute; bottom: 0;">
                                        <a onclick="sort('trang_thai_thanh_toan', 'asc')" class="bi bi-arrow-up-short" style=""></a>
                                        <a onclick="sort('trang_thai_thanh_toan', 'desc')" class="bi bi-arrow-down-short" style="display: block;"></a>
                                    </div>
                                </div>
                            </div>
                        </th>

                        <th>
                            <div class="row">
                                <div class="col-6" style=" margin: 0; padding:0">
                                    Tên voucher 
                                </div>

                                <div class="col-6" style="margin: 0; padding: 0; position: relative;">
                                    <div style="position: absolute; bottom: 0;">
                                        <a onclick="sort('ten_voucher', 'asc')" class="bi bi-arrow-up-short" style=""></a>
                                        <a onclick="sort('ten_voucher', 'desc')" class="bi bi-arrow-down-short" style="display: block;"></a>
                                    </div>
                                </div>
                            </div>
                        </th>

                        <th>
                            <div class="row">
                                <div class="col-6" style=" margin: 0; padding:0">
                                    Tổng tiền 
                                </div>


                                <div class="col-6" style="margin: 0; padding: 0; position: relative;">
                                    <div style="position: absolute; bottom: 0;">
                                        <a onclick="sort('tong_tien_hdb', 'asc')" class="bi bi-arrow-up-short" style=""></a>
                                        <a onclick="sort('tong_tien_hdb', 'desc')" class="bi bi-arrow-down-short" style="display: block;"></a>
                                    </div>
                                </div>
                            </div>
                        </th>
                        
                        <th class="text-center">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($Data_HoaDonBan as $item)
                        <tr>
                            <td>{{ $item->ma_hoa_don_ban }}</td>
                            <td>{{ $item->ngay_tao_hoa_don }}</td>
                            <td>{{ $item->ten_nhan_vien }}</td>
                            <td>{{ $item->ten_khach_hang }}</td>
                            <td>{{ $item->tinh_trang_hoa_don }}</td>
                            <td>{{ $item->trang_thai_thanh_toan }}</td>
                            <td>{{ $item->ten_voucher }}</td>
                            <td>{{ $item->tong_tien_hdb }}</td>
                            <td class="text-center">
                                <a href="{{ route('Admin.HoaDonBan.show', $item->ma_hoa_don_ban) }}" class="btn btn-success">
                                    <i class="bi bi-journals"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div>
                {{ $Data_HoaDonBan->appends(request()->all())->links() }} {{-- dữ nguyên tham số trên URL --}}
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        var url = "{{ route('Admin.HoaDonBan.index') }}";
    </script>
   
@endsection