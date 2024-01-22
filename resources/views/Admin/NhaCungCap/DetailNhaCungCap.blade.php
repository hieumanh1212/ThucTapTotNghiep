@extends('Layout.Admin_NhanVien.Layout')
@section('Title', 'Chi Tiết nhà cung cấp')

@section('Admin_Renderbody')


<div class="card-body">
    <div class="table-responsive">
        <table class="table ">
            <tbody>
                <tr>
                    <th class="col-2">Mã nhà cung cấp</th>
                    <td class="col-10">{{ $Data_NhaCungCap->ma_nha_cung_cap }}</td>
                </tr>  
                
                <tr>
                    <th class="col-2">Tên nhà cung cấp</th>
                    <td class="col-10">{{ $Data_NhaCungCap->ten_nha_cung_cap }}</td>
                </tr> 
                

                <tr>
                    <th class="col-2">Email</th>
                    <td class="col-10">{{ $Data_NhaCungCap->email }}</td>
                </tr> 

                <tr>
                    <th class="col-2">Số điện thoại</th>
                    <td class="col-10">{{ $Data_NhaCungCap->so_dien_thoai }}</td>
                </tr> 

                <tr>
                    <th class="col-2">Danh sách hóa đơn</th>
                    <td class="col-10">
                        @if ($List_HDN[1] == 0)
                            Không có hóa đơn
                        @else
                            <table class="table table-striped ">
                                <thead> 
                                    <tr>
                                        <th>Mã hóa đơn nhập</th>
                                        <th>Mã nhân viên</th>
                                        <th>Tên nhân viên</th>
                                        <th>Ngày nhập</th>
                                        <th>Tổng tiền</th>
                                        <th class="text-center">Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($List_HDN[0] as $item)
                                        <tr>
                                            <td>{{ $item->ma_hoa_don_nhap}}</td>
                                            <td>{{ $item->ma_nhan_vien}}</td>
                                            <td>{{ $item->ten_nhan_vien}}</td>
                                            <td>{{ $item->ngay_nhap}}</td>
                                            <td>{{ $item->tong_tien_hdn}}</td>
                                            <td class="text-center">
                                                <a href="{{ route('Admin.HoaDonNhap.show', ['HoaDonNhap'=>$item->ma_hoa_don_nhap, 'MNCC' => $item->ma_nha_cung_cap] ) }}" class="btn btn-success">
                                                    <i class="bi bi-journals"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                        
                    </td>
                </tr> 
                    
            </tbody>
        </table>
        <a href="{{ route('Admin.NhaCungCap.index') }}" class="btn btn-dark">Quay lại</a>
    </div>
</div>
@endsection
@section('js')
    <script>
        
        
    </script>
@endsection


