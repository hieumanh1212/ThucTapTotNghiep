@extends('Layout.Admin_NhanVien.Layout')
@section('Title', 'Danh sách sản phẩm')
@section('TitleNav', 'Nhân viên bán hàng')
@section('Admin_Renderbody')

<div class="card-body">
    <div class="table-responsive">
        <table class="table table-striped ">
            <thead>
                <tr>
                    <!-- Mã sản phẩm -->
                    <th>
                        <div class="row">
                            <div class="col-6" style=" margin: 0; padding:0">
                                Mã sản phẩm
                            </div>

                            <div class="col-6" style="margin: 0; padding: 0; position: relative;">
                                <div style="position: absolute; bottom: 0;">
                                    <a onclick="sort('ma_hoa_don_ban', 'asc')" class="bi bi-arrow-up-short" style=""></a>
                                    <a onclick="sort('ma_hoa_don_ban', 'desc')" class="bi bi-arrow-down-short" style="display: block;"></a>
                                </div>
                            </div>
                        </div>
                    </th>

                    <!-- Mã chi tiết sản phẩm -->
                    <th>
                        <div class="row">
                            <div class="col-6" style=" margin: 0; padding:0">
                                Mã chi tiết sản phẩm
                            </div>
                            <div class="col-6" style="margin: 0; padding: 0; position: relative;">
                                <div style="position: absolute; bottom: 0;">
                                    <a onclick="sort('ngay_tao_hoa_don', 'asc')" class="bi bi-arrow-up-short" style=""></a>
                                    <a onclick="sort('ngay_tao_hoa_don', 'desc')" class="bi bi-arrow-down-short" style="display: block;"></a>
                                </div>
                            </div>

                        </div>
                    </th>

                    <!-- Tên sản phẩm -->
                    <th>
                        <div class="row">
                            <div class="col-6" style=" margin: 0; padding:0">
                                Tên sản phẩm
                            </div>

                            <div class="col-6" style="margin: 0; padding: 0; position: relative;">
                                <div style="position: absolute; bottom: 0;">
                                    <a onclick="sort('ten_khach_hang', 'asc')" class="bi bi-arrow-up-short" style=""></a>
                                    <a onclick="sort('ten_khach_hang', 'desc')" class="bi bi-arrow-down-short" style="display: block;"></a>
                                </div>
                            </div>
                        </div>
                    </th>
                    <!-- Màu -->
                    <th>
                        <div class="row">
                            <div class="col-6" style=" margin: 0; padding:0">
                                Màu
                            </div>


                            <div class="col-6" style="margin: 0; padding: 0; position: relative;">
                                <div style="position: absolute; bottom: 0;">
                                    <a onclick="sort('tinh_trang_hoa_don', 'asc')" class="bi bi-arrow-up-short" style=""></a>
                                    <a onclick="sort('tinh_trang_hoa_don', 'desc')" class="bi bi-arrow-down-short" style="display: block;"></a>
                                </div>
                            </div>
                        </div>
                    </th>

                    <!-- Size -->
                    <th>
                        <div class="row">
                            <div class="col-6" style=" margin: 0; padding:0">
                                Size
                            </div>


                            <div class="col-6" style="margin: 0; padding: 0; position: relative;">
                                <div style="position: absolute; bottom: 0;">
                                    <a onclick="sort('trang_thai_thanh_toan', 'asc')" class="bi bi-arrow-up-short" style=""></a>
                                    <a onclick="sort('trang_thai_thanh_toan', 'desc')" class="bi bi-arrow-down-short" style="display: block;"></a>
                                </div>
                            </div>
                        </div>
                    </th>

                    <!-- Số lượng -->
                    <th>
                        <div class="row">
                            <div class="col-6" style=" margin: 0; padding:0">
                                Số lượng
                            </div>


                            <div class="col-6" style="margin: 0; padding: 0; position: relative;">
                                <div style="position: absolute; bottom: 0;">
                                    <a onclick="sort('tong_tien_hdb', 'asc')" class="bi bi-arrow-up-short" style=""></a>
                                    <a onclick="sort('tong_tien_hdb', 'desc')" class="bi bi-arrow-down-short" style="display: block;"></a>
                                </div>
                            </div>
                        </div>
                    </th>
                </tr>
            </thead>
            <tbody>
                <!-- Danh sách sản phẩm -->
                @foreach ($danhsachsanpham as $sanpham)
                <tr>
                    <td>{{ $sanpham->ma_san_pham }}</td>
                    <td>{{ $sanpham->ma_chi_tiet_san_pham }}</td>
                    <td>{{ $sanpham->ten_san_pham }}</td>
                    <td>{{ $sanpham->mau }}</td>
                    <td>{{ $sanpham->size }}</td>
                    <td>{{ $sanpham->so_luong }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection