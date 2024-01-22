@extends('Layout.Admin_NhanVien.Layout')
@section('Title', 'Đơn hàng đã hoàn thành')
@section('TitleNav', 'Nhân viên bán hàng')
@section('Admin_Renderbody')

<div class="card-body">
    <div class="table-responsive">
        <table class="table table-striped ">
            <thead>
                <tr>
                    <!-- Mã hóa đơn -->
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

                    <!-- Ngày tạo hóa đơn -->
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

                    <!-- Khách hàng -->
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
                    <!-- Tình trạng hóa đơn -->
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

                    <!-- Trạng thái thanh toán -->
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

                    <!-- Tổng tiền -->
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

                </tr>
            </thead>
            <tbody>
                <!-- Danh sách đơn hàng chờ xác nhận -->
                @foreach ($hoadondahoanthanh as $doncho)
                <tr style="background-color: white; transition: background-color 0.3s ease; cursor: pointer;" 
                onmouseover="this.style.backgroundColor='lightgray'" onmouseout="this.style.backgroundColor='white'" 
                onclick="showModal('{{ $doncho->ma_hoa_don_ban }}', 'Đã hoàn thành',
                '{{ $doncho->ten_khach_hang }}', '{{ $doncho->email }}', 
                '{{ $doncho->so_dien_thoai_nguoi_nhan }}', '{{ $doncho->dia_chi_giao_hang }}')">
                    <td>{{ $doncho->ma_hoa_don_ban }}</td>
                    <td>{{ $doncho->ngay_tao_hoa_don }}</td>
                    <td>{{ $doncho->ten_khach_hang }}</td>
                    <td>{{ $doncho->tinh_trang_hoa_don }}</td>
                    <td>Đã hoàn thành</td>
                    <td>{{ $doncho->tong_tien_hdb }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Chi tiết hóa đơn</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="modalBody">
                    ...
                </div>
            </div>
        </div>
    </div>

<script>
    //Hiển thị Modal
    function showModal(maHoaDon, tinhTrang, hoTenKH, email, dienThoai, diaChi) {
        // Sử dụng Ajax để gửi mã hóa đơn đến controller
        $.ajax({
            type: 'POST',
            url: '/showmodalnhanvienbanhang', // Đặt đúng route của controller của bạn
            data: {
                maHoaDon: maHoaDon,
                tinhTrang: tinhTrang,
                _token: '{{ csrf_token() }}' // Đảm bảo gửi token CSRF nếu bạn đang sử dụng Laravel
            },
            success: function(response) {
                var modalBody = $('#modalBody');
                modalContent = `<div class="col-md-12">   
                    <div class="row">
                            
                            <div class="receipt-main col-xs-12 col-sm-12 col-md-12 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">
                                <div class="row">
                                    <div class="receipt-header">
                                    <div class="col-xs-6 col-sm-6 col-md-6" style="float: left;">
                                            <div class="receipt-left">
                                                <img class="img-responsive" alt="iamgurdeeposahan" src="/assets/img/logo/logo.svg" style="width: 300px; border-radius: 43px;">
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-6 col-md-6 text-right" style="float: right;">
                                            <div class="receipt-right">
                                                <h5 style="text-align: right;">Shofy Shop</h5>
                                                <p style="text-align: right;">0968686868<i class="fa fa-phone"></i></p>
                                                <p style="text-align: right;">shofyshop@gmail.com <i class="fa fa-envelope-o"></i></p>
                                                <p style="text-align: right;">Việt Nam<i class="fa fa-location-arrow"></i></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="receipt-header receipt-header-mid">
                                        <div class="col-xs-6 col-sm-6 col-md-6 text-left">
                                            <div class="receipt-right">
                                                <h5>${hoTenKH}</h5>
                                                <p><b>Điện thoại :</b> ${dienThoai}</p>
                                                <p><b>Email :</b> ${email}</p>
                                                <p><b>Địa chỉ :</b> ${diaChi}</p>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div style="text-align: center;">
                                                <br>
                                                <h3>Mã hóa đơn: ${maHoaDon}</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Tên sản phẩm</th>
                                                <th>Chi tiết</th>
                                                <th>Giá bán</th>
                                                <th>Số lượng</th>
                                                <th>Thành tiền</th>
                                            </tr>
                                        </thead>
                                        <tbody>`;
                response.forEach(function(invoice) {
                    modalContent += `<tr>
                                                <td>${invoice.ten_san_pham}</td>
                                                <td>Size: ${invoice.size} - ${invoice.mau}</td>
                                                <td>${invoice.giaban}</td>
                                                <td>${invoice.so_luong_ban}</td>
                                                <td>${invoice.thanh_tien}</td>
                                            </tr>`;
                });

                modalContent += `
                                            <tr>
                                                <td class="text-right"><h2><strong>Tổng tiền: </strong></h2></td>
                                                <td class="text-center text-danger" colspan="4"><h2><strong> ${response[0].tong_tien_hdb}</strong></h2></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                
                                <div class="row">
                                    <div class="receipt-header receipt-header-mid receipt-footer">
                                        <div class="col-xs-8 col-sm-8 col-md-8 text-left">
                                            <div class="receipt-right">
                                                <p><b>Ngày mua: </b>${response[0].ngay_tao_hoa_don}</p>
                                                <br>
                                                <h5 style="color: rgb(140, 140, 140);">Cảm ơn vì đã tin tưởng chúng tôi</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>    
                        </div>
                    </div>`;

                modalBody.html(modalContent);
                // Hiển thị modal
                $('#exampleModal').modal('show');
            },


            error: function(error) {
                console.error('Error:', error);
            }
        });
    }
</script>


@endsection