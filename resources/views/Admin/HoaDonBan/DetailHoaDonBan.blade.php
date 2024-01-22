@extends('Layout.Admin_NhanVien.Layout')
@section('Title', 'Chi tiết hóa đơn bán')

@section('Admin_Renderbody')


<div class="card-body">
    <div class="table-responsive">
        <table class="table ">
            <tbody>
                <tr>
                    <th class="col-2">Mã hóa đơn bán</th>
                    <td class="col-10">{{ $Data_HoaDonBan->ma_hoa_don_ban }}</td>
                </tr>

                <tr>
                    <th class="col-2">Ngày tạo hóa đơn </th>
                    <td class="col-10">{{ $Data_HoaDonBan->ngay_tao_hoa_don }}</td>
                </tr>   

                
                
                <tr>
                    <th class="col-2">Mã nhân viên</th>
                    <td class="col-10">{{ $Data_HoaDonBan->ma_nhan_vien }}</td>
                </tr>

                

                <tr>
                    <th class="col-2">Tên nhân viên </th>
                    <td class="col-10">{{ $Data_HoaDonBan->ten_nhan_vien }}</td>
                </tr>

                <tr>
                    <th class="col-2">Mã khách hàng </th>
                    <td class="col-10">{{ $Data_HoaDonBan->ma_khach_hang }}</td>
                </tr>

                <tr>
                    <th class="col-2">Tên khách hàng</th>
                    <td class="col-10">{{ $Data_HoaDonBan->ten_khach_hang }}</td>
                </tr>

                <tr>
                    <th class="col-2">Người nhận</th>
                    <td class="col-10">{{ $Data_HoaDonBan->nguoi_nhan }}</td>
                </tr>

                <tr>
                    <th class="col-2">Số điện thoại người nhận</th>
                    <td class="col-10">{{ $Data_HoaDonBan->so_dien_thoai_nguoi_nhan }}</td>
                </tr>

                <tr>
                    <th class="col-2">Địa chỉ giao hàng </th>
                    <td class="col-10">{{ $Data_HoaDonBan->dia_chi_giao_hang }}</td>
                </tr>

                <tr>
                    <th class="col-2">Ghi chú </th>
                    <td class="col-10">{{ $Data_HoaDonBan->ghi_chu }}</td>
                </tr>

                <tr>
                    <th class="col-2">Tình trạng hóa đơn </th>
                    <td class="col-10">{{ $Data_HoaDonBan->tinh_trang_hoa_don }}</td>
                </tr>

                <tr>
                    <th class="col-2">Trạng thái thanh toán  </th>
                    <td class="col-10">{{ $Data_HoaDonBan->trang_thai_thanh_toan}}</td>
                </tr>

                

                <tr>
                    <th class="col-1">Danh sách chi tiết đơn hàng</th>
                    <td class="col-11">
                        @if ($List_CTHDB[1] == 0)
                            Không có chi tiết
                        @else
                            <table class="table table-striped ">
                                <thead> 
                                    <tr>


                                        <th>Mã CTSP</th>

                                        <th>Size</th>
                                        
                                        <th>Màu sắc</th>

                                        <th>Số lượng bán</th>

                                        <th>Đơn giá bán</th>

                                        <th>Thành tiền</th>


                                    </tr>
                                </thead>
                                    <tbody>
                                        
                                        @foreach ($List_CTHDB[0] as $item)
                                            <tr>
                                                <td>{{ $item->ma_chi_tiet_san_pham}}</td>
                                                <td>{{ $item->size}}</td>
                                                <td>{{ $item->mau}}</td>
                                                <td>{{ $item->so_luong_ban}}</td>
                                                <td>{{ $item->don_gia_ban}}</td>
                                                <td>{{ $item->thanh_tien}}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                            </table>
                        @endif
                        
                       
                        
                    </td>
                </tr>

                <tr>
                    <th class="col-2">Voucher </th>
                    <td class="col-10">{{ $Data_HoaDonBan->ten_voucher }}</td>
                </tr>

                <tr>
                    <th class="col-2">Tổng tiền hóa đơn bán </th>
                    <td class="col-10">{{ $Data_HoaDonBan->tong_tien_hdb }}</td>
                </tr>
            </tbody>
        </table>
        <a href="{{ isset(request()->MNV)? route('Admin.NhanVien.show', request()->MNV):(isset(request()->MKH)? route('Admin.KhachHang.show', request()->MKH) : route('Admin.HoaDonBan.index') )}}" class="btn btn-dark">Quay lại</a>
    </div>
</div>
@endsection
@section('js')
    <script>

        
        
    </script>
    

    
@endsection