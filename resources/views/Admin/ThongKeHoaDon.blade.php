@extends('Layout.Admin_NhanVien.Layout')
@section('Title', 'Thống kê Hóa Đơn')
@section('Admin_Renderbody')

<div class="dropdown no-arrow">
    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="text-decoration: none;">
        <h4 class="m-0 font-weight-bold text-primary">Chọn Tháng</h4>
    </a>
    <div class="dropdown-menu dropdown-menu-left shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
        <a class="dropdown-item" href="#" id="thang1" onclick="ChonThang(this.textContent)">1</a>
        <a class="dropdown-item" href="#" id="thang2" onclick="ChonThang(this.textContent)">2</a>
        <a class="dropdown-item" href="#" id="thang3" onclick="ChonThang(this.textContent)">3</a>
        <a class="dropdown-item" href="#" id="thang4" onclick="ChonThang(this.textContent)">4</a>
        <a class="dropdown-item" href="#" id="thang5" onclick="ChonThang(this.textContent)">5</a>
        <a class="dropdown-item" href="#" id="thang6" onclick="ChonThang(this.textContent)">6</a>
        <a class="dropdown-item" href="#" id="thang7" onclick="ChonThang(this.textContent)">7</a>
        <a class="dropdown-item" href="#" id="thang8" onclick="ChonThang(this.textContent)">8</a>
        <a class="dropdown-item" href="#" id="thang9" onclick="ChonThang(this.textContent)">9</a>
        <a class="dropdown-item" href="#" id="thang10" onclick="ChonThang(this.textContent)">10</a>
        <a class="dropdown-item" href="#" id="thang11" onclick="ChonThang(this.textContent)">11</a>
        <a class="dropdown-item" href="#" id="thang12" onclick="ChonThang(this.textContent)">12</a>
    </div>
</div>
<h3 class="text-xl font-weight-bold text-primary text-uppercase mb-2 text-center" id="hienthithang">Tháng {{$thanghientai}}</h3>


<!-- 3 cái bên trên  -->
<div class="row">

    <!-- Số hóa đơn đã hoàn thành -->
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Số hóa đơn đã hoàn thành</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800" id="sohoadonhoanthanh">{{$sohoadondahoanthanh_hientai}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Số hóa đơn đang giao -->
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Số hóa đơn đang giao</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800" id="sohoadondanggiao">{{$sohoadondanggiao_hientai}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Số hóa đơn đã hủy -->
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Số hóa đơn đã bị hủy</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800" id="sohoadondahuy">{{$sohoadondahuy_hientai}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


<h5 class="text-xl font-weight-bold text-primary text-uppercase mb-2 text-center" id="">Hóa đơn bị hủy</h5>

<!-- Bảng hóa đơn hủy -->
<div class="profile__ticket table-responsive">
    <table class="table" id="tableHoaDon">
        <thead>
            <tr>
                <th scope="col">Mã hóa đơn</th>
                <th scope="col">Ngày tạo</th>
                <th scope="col">Tổng tiền</th>
                <th scope="col">Lý do</th>
            </tr>
        </thead>
        <tbody>
            @foreach($hoadondahuy as $donhuy)
            <tr style="background-color: white; transition: background-color 0.3s ease; cursor: pointer;" onmouseover="this.style.backgroundColor='lightgray'" onmouseout="this.style.backgroundColor='white'" onclick="showModal('{{ $donhuy->ma_hoa_don_ban }}', 'Đã hủy')">
                <th scope="row">{{$donhuy->ma_hoa_don_ban}} </th>
                <td>{{$donhuy->ngay_tao_hoa_don}}</td>
                <td>{{$donhuy->tong_tien_hdb}}</td>
                <td>{{$donhuy->ghi_chu}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
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
    var hienthithang = document.getElementById("hienthithang");
    var sohoadondahoanthanh = document.getElementById("sohoadonhoanthanh");
    var sohoadondanggiao = document.getElementById("sohoadondanggiao");
    var sohoadondahuy = document.getElementById("sohoadondahuy");


    function ChonThang(thang) {
        hienthithang.innerHTML = 'Tháng ' + thang;

        $.ajax({
            type: 'GET',
            url: '{{ route("thongkehoadon") }}',
            data: {
                thang: thang,
            },
            dataType: 'json',
            success: function(response) {
                console.log(response);
                // Xử lý dữ liệu ở đây
                sohoadondahoanthanh.innerHTML = response.sohoadondahoanthanh;
                sohoadondanggiao.innerHTML = response.sohoadondanggiao;
                sohoadondahuy.innerHTML = response.sohoadondahuy;

                //Xử lý bảng
                const tableHoaDon = document.getElementById('tableHoaDon');
                tableHoaDon.innerHTML = ''; // Xóa nội dung cũ của bảng

                let tableHeader = `
                <div class="profile__ticket table-responsive">
                    <table class="table" id="tableHoaDon">
                        <thead>
                            <tr>
                                <th scope="col">Mã hóa đơn</th>
                                <th scope="col">Ngày tạo</th>
                                <th scope="col">Tổng tiền</th>
                                <th scope="col">Lý do</th>
                            </tr>
                        </thead>
                        <tbody>
                    `;
                let tableFooter = `
                        </tbody>
                    </table>
                </div>
                `;
                let tableContent = '';
                if (Array.isArray(response.hoadondahuy)) {
                    response.hoadondahuy.forEach(function(hoaDon) {
                        tableContent += `
                            <tr style="background-color: white; transition: background-color 0.3s ease; cursor: pointer;" onmouseover="this.style.backgroundColor='lightgray'" onmouseout="this.style.backgroundColor='white'">
                                <th scope="row">${hoaDon.ma_hoa_don_ban} </th>
                                <td>${hoaDon.ngay_tao_hoa_don}</td>
                                <td>${hoaDon.tong_tien_hdb}</td>
                                <td>${hoaDon.ghi_chu}</td>
                            </tr>`;
                    });
                }
                // Gán nội dung của bảng với dữ liệu đã tạo
                document.getElementById('tableHoaDon').innerHTML = tableHeader + tableContent + tableFooter;
            },
            error: function(error) {
                console.error('Có lỗi xảy ra khi gửi yêu cầu: ', error);
            }
        });
    }

    //Hiển thị Modal
    function showModal(maHoaDon, tinhTrang) {
        // Sử dụng Ajax để gửi mã hóa đơn đến controller
        $.ajax({
            type: 'POST',
            url: '/showmodaladmin', // Đặt đúng route của controller của bạn
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
                                                <h5>Mạnh Hiếu</h5>
                                                <p><b>Điện thoại :</b> 0966736399</p>
                                                <p><b>Email :</b> hieu@gmail.com</p>
                                                <p><b>Địa chỉ :</b> Hà Nội</p>
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
                                        <div class="col-xs-12 col-sm-12 col-md-12 text-left">
                                            <div class="receipt-right">
                                                <p><b>Ngày mua: </b>${response[0].ngay_tao_hoa_don}</p>
                                                <br>
                                                <h5 style="color: rgb(140, 140, 140);">Lý do hủy: Tôi không muốn mua sản phẩm nữa</h5>
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