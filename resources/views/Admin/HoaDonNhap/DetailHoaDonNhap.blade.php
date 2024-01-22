@extends('Layout.Admin_NhanVien.Layout')
@section('Title', 'Chi tiết hóa đơn nhập')
@section('Admin_Renderbody')


<div class="card-body">
    <div class="table-responsive">
        <table class="table ">
            <tbody>
                <tr>
                    <th class="col-2">Mã hóa đơn nhập</th>
                    <td class="col-10">{{ $Data_HoaDonNhap->ma_hoa_don_nhap }}</td>
                </tr>

                <tr>
                    <th class="col-2">Ngày nhập </th>
                    <td class="col-10">{{ $Data_HoaDonNhap->ngay_nhap }}</td>
                </tr>   

                
                
                <tr>
                    <th class="col-2">Mã nhân viên</th>
                    <td class="col-10">{{ $Data_HoaDonNhap->ma_nhan_vien }}</td>
                </tr>

                <tr>
                    <th class="col-2">Tên nhân viên </th>
                    <td class="col-10">{{ $Data_HoaDonNhap->ten_nhan_vien }}</td>
                </tr>

                <tr>
                    <th class="col-2">Mã nhà cung cấp  </th>
                    <td class="col-10">{{ $Data_HoaDonNhap->ma_nha_cung_cap }}</td>
                </tr>

                <tr>
                    <th class="col-2">Tên nhà cung cấp</th>
                    <td class="col-10">{{ $Data_HoaDonNhap->ten_nha_cung_cap }}</td>
                </tr>

                

                <tr>
                    <th class="col-1">Danh sách chi tiết đơn hàng</th>
                    <td class="col-11">
                        @if ($List_CTHDN[1] == 0)
                            Không có chi tiết
                        @else
                            <table class="table table-striped ">
                                <thead> 
                                    <tr>

                                        <th>Mã CTSP</th>

                                        <th>Size</th>
                                        
                                        <th>Màu sắc</th>

                                        <th>Số lượng nhập</th>

                                        <th>Đơn giá nhập</th>

                                        <th>Thành tiền</th>


                                    </tr>
                                </thead>
                                    <tbody>
                                        
                                        @foreach ($List_CTHDN[0] as $item)
                                            <tr>
                                                <td>{{ $item->ma_chi_tiet_san_pham}}</td>
                                                <td>{{ $item->size}}</td>
                                                <td>{{ $item->mau}}</td>
                                                <td>{{ $item->so_luong_nhap}}</td>
                                                <td>{{ $item->don_gia_nhap}}</td>
                                                <td>{{ $item->thanh_tien}}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                            </table>
                        @endif
                        
                       
                        
                    </td>
                </tr>
                
                <tr>
                    <th class="col-2">Tổng tiền </th>
                    <td class="col-10">{{ $Data_HoaDonNhap->tong_tien_hdn }}</td>
                </tr>
                
            </tbody>
        </table>
        <a href="{{ isset(request()->MNV)? route('Admin.NhanVien.show', request()->MNV):(isset(request()->MNCC)? route('Admin.NhaCungCap.show', request()->MNCC):route('Admin.HoaDonNhap.index')) }}" class="btn btn-dark">Quay lại</a>
    </div>
</div>
@endsection
@section('js')
    <script>

    </script>
@endsection