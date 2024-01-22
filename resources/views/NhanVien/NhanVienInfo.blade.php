@extends('Layout.Admin_NhanVien.Layout')
@section('Title', 'Nhân viên bán hàng')
@section('TitleNav', 'Nhân viên bán hàng')
@section('menu')
    @php
        $Menu = config('Menu_NhanVienBanHang');
    @endphp
@endsection
@section('Admin_Renderbody')
    <div class="card-body">
        <div class="table-responsive">
            <table class="table ">
                <tbody>
                <tr>
                    <th class="col-2">Mã nhân viên</th>
                    <td class="col-10">{{ $employee->ma_nhan_vien }}</td>
                </tr>

                <tr>
                    <th class="col-2">Tên nhân viên</th>
                    <td class="col-10">{{ $employee->ten_nhan_vien }}</td>
                </tr>

                <tr>
                    <th class="col-2">Ảnh đại diện</th>
                    @if ( $employee->anh_dai_dien != '')
                        <td class="col-10"
                            style="display: flex; flex-direction: column; align-items: center; text-align: center;">
                            <img style="width: 300px;height: 300px;" src="" alt="Preview Image">
                        </td>
                    @endif
                </tr>

                <tr>
                    <th class="col-2">Tên chức vụ</th>
                    <td class="col-10">{{ $employee->ten_chuc_vu }}</td>
                </tr>

                <tr>
                    <th class="col-2">Ngày sinh</th>
                    <td class="col-10">{{ \Carbon\Carbon::parse($employee->ngay_sinh)->format('d/m/Y') }}</td>
                </tr>

                <tr>
                    <th class="col-2">Địa chỉ</th>
                    <td class="col-10">{{ $employee->dia_chi }}</td>
                </tr>

                <tr>
                    <th class="col-2">Điện thoại</th>
                    <td class="col-10">{{ $employee->dien_thoai }}</td>
                </tr>

                <tr>
                    <th class="col-2">Giới tính</th>
                    <td class="col-10">{{ $employee->gioi_tinh == '1'? "Nam":"Nữ" }}</td>
                </tr>

                <tr>
                    <th class="col-2">Tài khoản</th>
                    <td class="col-10">{{ $employee->tai_khoan }}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
