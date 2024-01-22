@extends('Layout.Admin_NhanVien.Layout')
@section('Title', 'Thống kê')
@section('Admin_Renderbody')
<!-- 4 cái bên trên  -->
<div class="row">

    <!-- Doanh thu hôm nay -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Doanh thu hôm nay</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $doanhthuhomnay_dinhdang }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Số hóa đơn hôm nay -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Số hóa đơn hôm nay</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $sohoadonhomnay }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Doanh thu tháng này -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Doanh thu tháng này
                        </div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $doanhthuthangnay_dinhdang }}</div>
                            </div>
                            <!-- <div class="col">
                                <div class="progress progress-sm mr-2">
                                    <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div> -->
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Số hóa đơn tháng này -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Số hóa đơn tháng này</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $sohoadonthangnay }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Lấy dữ liệu cho biểu đồ  -->
<div id="totalsByMonth" data-totals="{{ json_encode($totalsByMonth) }}"></div>
<div id="totalsByMonth0" data-totals="{{ json_encode($totalsByMonth0) }}"></div>
<div id="totalsByMonth1" data-totals="{{ json_encode($totalsByMonth1) }}"></div>
<div id="totalsByMonth2" data-totals="{{ json_encode($totalsByMonth2) }}"></div>
<div id="totalsByYear" data-totals="{{ json_encode($totalsByYear) }}"></div>
<!-- Biểu đồ  -->
<div class="row">

    <!-- Area Chart -->
    <div class="col-xl-8 col-lg-7">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Thống kê doanh thu</h6>
                <h6 class="m-0 font-weight-bold text-primary" id="namdangchon">Năm 2023</h6>
                <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="text-decoration: none;">
                        <h6 class="m-0 font-weight-bold text-primary">Chọn Năm</h6>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                        <?php
                        $currentYear = date("Y");
                        echo '<a class="dropdown-item" href="#" id="namhientai">' . $currentYear . '</a> ';
                        echo '<a class="dropdown-item" href="#" id="namhientai1">' . $currentYear - 1 . '</a> ';
                        echo '<a class="dropdown-item" href="#" id="namhientai2">' . $currentYear - 2 . '</a> ';
                        ?>
                    </div>
                </div>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="chart-area">
                    <div class="chartjs-size-monitor">
                        <div class="chartjs-size-monitor-expand">
                            <div class=""></div>
                        </div>
                        <div class="chartjs-size-monitor-shrink">
                            <div class=""></div>
                        </div>
                    </div>
                    <canvas id="myAreaChart" style="display: block; height: 320px; width: 613px;" width="766" height="400" class="chartjs-render-monitor"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Pie Chart -->
    <div class="col-xl-4 col-lg-5">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Doanh thu 3 năm gần nhất</h6>
                <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                        <div class="dropdown-header">Dropdown Header:</div>
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </div>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="chart-pie pt-4 pb-2">
                    <div class="chartjs-size-monitor">
                        <div class="chartjs-size-monitor-expand">
                            <div class=""></div>
                        </div>
                        <div class="chartjs-size-monitor-shrink">
                            <div class=""></div>
                        </div>
                    </div>
                    <canvas id="myPieChart" width="766" height="306" style="display: block; height: 245px; width: 613px;" class="chartjs-render-monitor"></canvas>
                </div>
                <div class="mt-4 text-center small">
                    <span class="mr-2">
                        <?php
                        $currentYear = date("Y");
                        echo '<i class="fas fa-circle text-primary">' . $currentYear . '</i> ';
                        ?>

                    </span>
                    <span class="mr-2">
                        <?php
                        $currentYear = date("Y");
                        echo '<i class="fas fa-circle text-success">' . $currentYear - 1 . '</i> ';
                        ?>
                    </span>
                    <span class="mr-2">
                        <?php
                        $currentYear = date("Y");
                        echo '<i class="fas fa-circle text-info">' . $currentYear - 2 . '</i> ';
                        ?>
                    </span>
                </div>
            </div>
        </div>
    </div>

    <!-- Top sản phẩm -->
    <div class="col-xl-5 col-lg-6">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Top sản phẩm bán chạy nhất trong tháng</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Mã sản phẩm</th>
                            <th scope="col">Tên sản phẩm</th>
                            <th scope="col">Số lượng bán</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($sanphambanchay as $spbanchay)
                        <tr>
                            <th scope="row">1</th>
                            <td>{{$spbanchay->ma_san_pham}}</td>
                            <td>{{$spbanchay->ten_san_pham}}</td>
                            <td>{{$spbanchay->tong_so_luong}}</td>
                            <td><a href="#" class="m-0 font-weight-bold text-primary" style="text-decoration:none;" data-toggle="modal" data-target=".bd-example-modal-lg">Chi tiết</a></td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Khách hàng tiềm năng -->
    <div class="col-xl-7 col-lg-6">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Khách hàng tiềm năng - nhiều đơn hàng nhất</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Mã khách hàng</th>
                            <th scope="col">Tên khách hàng</th>
                            <th scope="col">Số điện thoại</th>
                            <th scope="col">Email</th>
                            <th scope="col">Địa chỉ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($khachhangtiemnang as $khtiemnang)

                        <tr>
                            <th scope="row">1</th>
                            <td>{{$khtiemnang->ma_khach_hang}}</td>
                            <td>{{$khtiemnang->ten_khach_hang}}</td>
                            <td>{{$khtiemnang->dien_thoai}}</td>
                            <td>{{$khtiemnang->email}}</td>
                            <td>{{$khtiemnang->dia_chi}}</td>
                        </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div>
                <p>Thể loại: </p>
                <p>Tên sản phẩm: </p>
                <img src="" alt="">
                <p>Mô tả: </p>
                <p>Giá bán: </p>
            </div>
        </div>
    </div>
</div>

@endsection


