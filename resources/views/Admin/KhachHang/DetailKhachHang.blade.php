@extends('Layout.Admin_NhanVien.Layout')
@section('Title', 'Thông tin khách hàng')

@section('Admin_Renderbody')


<div class="card-body">
    <div class="table-responsive">
        <table class="table ">
            <tbody>
                <tr>
                    <th class="col-2">Mã khách hàng</th>
                    <td class="col-10">{{ $Data_KhachHang->ma_khach_hang }}</td>
                </tr>

                <tr>
                    <th class="col-2">Tên khách hàng</th>
                    <td class="col-10">{{ $Data_KhachHang->ten_khach_hang }}</td>
                </tr>   

                <tr>
                    <th class="col-2">Ngày sinh</th>
                    <td class="col-10">{{ $Data_KhachHang->ngay_sinh }}</td>
                </tr> 
                
                <tr>
                    <th class="col-2">Địa chỉ</th>
                    <td class="col-10">{{ $Data_KhachHang->dia_chi }}</td>
                </tr>

                <tr>
                    <th class="col-2">Điện thoại</th>
                    <td class="col-10">{{ $Data_KhachHang->dien_thoai }}</td>
                </tr>

                <tr>
                    <th class="col-2">Giới tính</th>
                    <td class="col-10">{{ $Data_KhachHang->gioi_tinh == '1'? "Nam":"Nữ" }}</td>
                </tr>

                <tr>
                    <th class="col-2">Email</th>
                    <td class="col-10">{{ $Data_KhachHang->email }}</td>
                </tr>

                <tr>
                    <th class="col-2">Tài khoản</th>
                    <td class="col-10">{{ $Data_KhachHang->tai_khoan }}</td>
                </tr>

                <tr>
                    <th class="col-2">Danh sách hóa đơn đã mua</th>
                    <td class="col-10">
                            <table class="table table-striped ">
                                <thead> 
                                    <tr>
                                        <th>Mã hóa đơn bán</th>
                                        <th>Ngày tạo hóa đơn</th>
                                        <th>Tên nhân viên</th>
                                        <th>Tên khách hàng</th>
                                        <th>Tên voucher</th> 
                                        <th>Tổng tiền</th> 
                                        <th class="text-center">Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($List_HDB as $item)
                                        <tr>
                                            <td>{{ $item->ma_hoa_don_ban }}</td>
                                            <td>{{ $item->ngay_tao_hoa_don }}</td>
                                            <td>{{ $item->ten_nhan_vien }}</td>
                                            <td>{{ $item->ten_khach_hang }}</td>
                                            <td>{{ $item->ten_voucher }}</td>
                                            <td>{{ $item->tong_tien_hdb }}</td>

                                            <td class="text-center">
                                                <a href="{{ route('Admin.HoaDonBan.show', ['HoaDonBan'=>$item->ma_hoa_don_ban, 'MKH' => $Data_KhachHang->ma_khach_hang] ) }}" class="btn btn-success">
                                                    <i class="bi bi-journals"></i>
                                                </a>
                                            </td> 
                                        </tr>
                                    @endforeach
                                </tbody>
                        </table>
                        {{ $List_HDB->appends(request()->all())->links() }}
                        
                    </td>
                </tr>

                
                
                
            </tbody>
        </table>
        <a href="{{ route('Admin.KhachHang.index') }}" class="btn btn-dark">Quay lại</a>
    </div>
</div>
@endsection
@section('js')
    <script>

    </script>
@endsection