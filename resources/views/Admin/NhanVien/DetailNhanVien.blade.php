@extends('Layout.Admin_NhanVien.Layout')
@section('Title', 'Thông tin nhân viên')

@section('Admin_Renderbody')


<div class="card-body">
    <div class="table-responsive">
        <table class="table ">
            <tbody>
                <tr>
                    <th class="col-2">Mã nhân viên</th>
                    <td class="col-10">{{ $Data_NhanVien->ma_nhan_vien }}</td>
                </tr>

                <tr>
                    <th class="col-2">Tên nhân viên</th>
                    <td class="col-10">{{ $Data_NhanVien->ten_nhan_vien }}</td>
                </tr>   

                <tr>
                    <th class="col-2">Ảnh đại diện</th>
  
                    <td class="col-10" style="display: flex; flex-direction: column; align-items: center; text-align: center;">
                        <img  style="width: 300px;height: 300px;"  src="{{ asset('IMG_NhanVien/'.$Data_NhanVien->anh_dai_dien) }}" alt="Preview Image">
                    </td>
               
                </tr> 
                
                <tr>
                    <th class="col-2">Tên chức vụ</th>
                    <td class="col-10">{{ $Data_NhanVien->ten_chuc_vu }}</td>
                </tr>

                <tr>
                    <th class="col-2">Ngày sinh</th>
                    <td class="col-10">{{ $Data_NhanVien->ngay_sinh }}</td>
                </tr>

                <tr>
                    <th class="col-2">Địa chỉ</th>
                    <td class="col-10">{{ $Data_NhanVien->dia_chi }}</td>
                </tr>

                <tr>
                    <th class="col-2">Điện thoại</th>
                    <td class="col-10">{{ $Data_NhanVien->dien_thoai }}</td>
                </tr>

                <tr>
                    <th class="col-2">Giới tính</th>
                    <td class="col-10">{{ $Data_NhanVien->gioi_tinh == '1'? "Nam":"Nữ" }}</td>
                </tr>

                <tr>
                    <th class="col-2">Tài khoản</th>
                    <td class="col-10">{{ $Data_NhanVien->tai_khoan }}</td>
                </tr>

                <tr>
                    <th class="col-2">Mật khẩu</th>
                    <td class="col-10">
                        <a href="{{ route('Admin.NhanVien.update', $Data_NhanVien->ma_nhan_vien) }}" class="btn btn-success btn_reset_pass">
                            <i class="bi bi-arrow-clockwise"></i>
                        </a>
                    </td>
                </tr>

                <tr>
                    <th class="col-2">Danh sách hóa đơn đã tạo</th>
                    <td class="col-10">
                        @if ($Count_HD == 0)
                            Nhân viên này chưa tạo hóa đơn
                        @else
                            <table class="table table-striped ">
                                <thead> 
                                    <tr>
                                        @if ($Loai_HD == 'HDB')
                                            
                                            <th>Mã hóa đơn bán</th>

                                            <th>Tên khách hàng</th>

                                            <th>Điện thoại</th>
                                            
                                            <th>Ngày tạo hóa đơn</th>

                                            <th>Trạng thái đơn hàng</th>

                                            <th>Tình trạng hóa đơn</th>

                                            <th>Tên voucher</th>

                                            <th>Tổng tiền </th>
                                        @else
                                            <th>Mã hóa đơn nhập</th>

                                            <th>Ngày nhập</th>

                                            <th>Nhà cung cấp</th>
                                            
                                            <th>Tổng tiền</th>
                                                
                                            
                                        @endif 
                                            <th class="text-center">Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    @foreach ($List_HD as $item)
                                        <tr>
                                            @if ($Loai_HD == 'HDB')
                                                
                                                <td>{{ $item->ma_hoa_don_ban}}</td>
                                                <td>{{ $item->ten_khach_hang}}</td>
                                                <td>{{ $item->dien_thoai}}</td>
                                                <td>{{ $item->ngay_tao_hoa_don}}</td>
                                                <td>{{ $item->trang_thai_thanh_toan}}</td>
                                                <td>{{ $item->tinh_trang_hoa_don}}</td>
                                                <td>{{ $item->ten_voucher}}</td>
                                                <td>{{ $item->tong_tien_hdb}}</td>
                                                <td class="text-center">
                                                    <a href="{{ route('Admin.HoaDonBan.show', ['HoaDonBan'=>$item->ma_hoa_don_ban, 'MNV' => $Data_NhanVien->ma_nhan_vien] ) }}" class="btn btn-success">
                                                        <i class="bi bi-journals"></i>
                                                    </a>
                                                </td> 
                                            @else
                                            
                                                <td>{{ $item->ma_hoa_don_nhap}}</td>
                                                <td>{{ $item->ngay_nhap}}</td>
                                                <td>{{ $item->ten_nha_cung_cap}}</td>
                                                <td>{{ $item->tong_tien_hdn}}</td>
                                                <td class="text-center">
                                                    <a href="{{ route('Admin.HoaDonNhap.show', ['HoaDonNhap'=>$item->ma_hoa_don_nhap, 'MNV' => $Data_NhanVien->ma_nhan_vien] ) }}" class="btn btn-success">
                                                        <i class="bi bi-journals"></i>
                                                    </a>
                                                </td>
                                            @endif
                                            
                                        </tr>
                                    @endforeach
                                </tbody>
                        </table>
                        {{ $List_HD->appends(request()->all())->links() }} 
                        @endif
                        
                    </td>
                </tr>
            </tbody>
        </table>
        <a href="{{ route('Admin.NhanVien.index') }}" class="btn btn-dark">Quay lại</a>
        <form method="POST" action="" id="from_reset_pass">
            @csrf @method('PUT')
        </form>
    </div>
</div>
@endsection
@section('js')
    <script>

        $('.btn_reset_pass').click(function(ev){
            ev.preventDefault();// k cho load lại trang
            var _herf = $(this).attr('href'); // lấy link của thẻ a hiện tại đang click vào
            $('#from_reset_pass').attr('action', _herf); // gán action của vào form là href của thẻ a vừa click vào
            
            Swal.fire({
                title: 'Bạn muốn cấp lại mật khẩu cho nhân viên này không?',
                text: "",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText:'Không',
                confirmButtonText: 'Có'
            }).then((result) => {
            if (result.isConfirmed) 
            {
                //Swal.fire('Xóa thành công!','','success');
                $('#from_reset_pass').submit();
            }
            });
        });
        
    </script>
    @if (session()->has('CapNhapMatKhau_ThanhCong'))
        <script>Swal.fire('Thành công', '{{ session()->get('CapNhapMatKhau_ThanhCong') }}' ,'success');</script>
    @endif 

    
@endsection