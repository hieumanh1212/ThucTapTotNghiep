@extends('Layout.Admin_NhanVien.Layout')
@section('Title', 'Thống kê')
@section('Admin_Renderbody')


<div class="dropdown no-arrow">
    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="text-decoration: none;">
        <h4 class="m-0 font-weight-bold text-primary">Chọn Năm</h4>
    </a>
    <div class="dropdown-menu dropdown-menu-left shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
        <?php
        $currentYear = date("Y");
        echo '<a class="dropdown-item" href="#" id="namhientai">' . $currentYear . '</a> ';
        echo '<a class="dropdown-item" href="#" id="namhientai1">' . ($currentYear - 1) . '</a> ';
        echo '<a class="dropdown-item" href="#" id="namhientai2">' . ($currentYear - 2) . '</a> ';
        ?>
    </div>
</div>
<h3 class="text-xl font-weight-bold text-primary text-uppercase mb-2 text-center" id="namdangchon">Năm 2023</h3>



<!-- 4 cái bên trên  -->
<div class="row">

    <!-- Quý 1 -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xl font-weight-bold text-primary text-uppercase mb-1">
                            Lợi nhuận quý 1</div>
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-5">(Tháng 1 - Tháng 3)</div>
                        <div class="h6 mb-1 font-weight-bold text-gray-800" id="tiennhaphangquy1">Tiền nhập hàng: {{ $tiennhaphangquy1_hientai_dinhdang }}</div>
                        <div class="h6 mb-2 font-weight-bold text-gray-800" id="tiendoanhthuquy1">Tiền doanh thu: {{ $doanhthuquy1_hientai_dinhdang }}</div>
                        <div class="h6 mb-5 font-weight-bold text-primary text-uppercase" id="tienloinhuanquy1">Lợi nhuận: {{ $loinhuanquy1_hientai }}</div>
                        <!-- Bán được bao nhiêu % -->
                        <div class="text-xl font-weight-bold text-primary text-uppercase mb-1">
                            Đã bán được</div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800" id="soluongdabanquy1">{{ $soluongdabanquy1_hientai }}%</div>
                            </div>
                            <div class="col">
                                <div class="progress progress-sm mr-2">
                                    <div class="progress-bar bg-primary" role="progressbar" id="soluongdabanquy1%" style="width: {{ $soluongdabanquy1_hientai }}%" aria-valuenow="{{ $soluongdabanquy1_hientai }}" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Quý 2 -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xl font-weight-bold text-success text-uppercase mb-1">
                            Lợi nhuận quý 2</div>
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-5"> (Tháng 4 - Tháng 6) </div>
                        <div class="h6 mb-1 font-weight-bold text-gray-800" id="tiennhaphangquy2">Tiền nhập hàng: {{ $tiennhaphangquy2_hientai_dinhdang }}</div>
                        <div class="h6 mb-2 font-weight-bold text-gray-800" id="tiendoanhthuquy2">Tiền doanh thu: {{ $doanhthuquy2_hientai_dinhdang }}</div>
                        <div class="h6 mb-5 font-weight-bold text-success text-uppercase" id="tienloinhuanquy2">Lợi nhuận: {{ $loinhuanquy2_hientai }}</div>
                        <!-- Bán được bao nhiêu % -->
                        <div class="text-xl font-weight-bold text-success text-uppercase mb-1">
                            Đã bán được</div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800" id="soluongdabanquy2">{{ $soluongdabanquy2_hientai }}%</div>
                            </div>
                            <div class="col">
                                <div class="progress progress-sm mr-2">
                                    <div class="progress-bar bg-success" role="progressbar" id="soluongdabanquy2%" style="width: {{ $soluongdabanquy2_hientai }}%" aria-valuenow="{{ $soluongdabanquy2_hientai }}" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Quý 3 -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xl font-weight-bold text-info text-uppercase mb-1">
                            Lợi nhuận quý 3</div>
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-5">
                            (Tháng 7 - Tháng 9)</div>
                        <div class="h6 mb-1 font-weight-bold text-gray-800" id="tiennhaphangquy3">Tiền nhập hàng: {{ $tiennhaphangquy3_hientai_dinhdang }}</div>
                        <div class="h6 mb-2 font-weight-bold text-gray-800" id="tiendoanhthuquy3">Tiền doanh thu: {{ $doanhthuquy3_hientai_dinhdang }}</div>
                        <div class="h6 mb-5 font-weight-bold text-info text-uppercase" id="tienloinhuanquy3">Lợi nhuận: {{ $loinhuanquy3_hientai }}</div>
                        <!-- Bán được bao nhiêu % -->
                        <div class="text-xl font-weight-bold text-info text-uppercase mb-1">
                            Đã bán được</div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800" id="soluongdabanquy3">{{ $soluongdabanquy3_hientai }}%</div>
                            </div>
                            <div class="col">
                                <div class="progress progress-sm mr-2">
                                    <div class="progress-bar bg-info" role="progressbar" id="soluongdabanquy3%" style="width: {{ $soluongdabanquy3_hientai }}%" aria-valuenow="{{ $soluongdabanquy3_hientai }}" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Quý 4 -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xl font-weight-bold text-warning text-uppercase mb-1">
                            Lợi nhuận quý 4</div>
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-5">
                            (Tháng 10 - Tháng 12)</div>
                        <div class="h6 mb-1 font-weight-bold text-gray-800" id="tiennhaphangquy4">Tiền nhập hàng: {{ $tiennhaphangquy4_hientai_dinhdang }}</div>
                        <div class="h6 mb-2 font-weight-bold text-gray-800" id="tiendoanhthuquy4">Tiền doanh thu: {{ $doanhthuquy4_hientai_dinhdang }}</div>
                        <div class="h6 mb-5 font-weight-bold text-warning text-uppercase" id="tienloinhuanquy4">Lợi nhuận: {{ $loinhuanquy4_hientai }}</div>
                        <!-- Bán được bao nhiêu % -->
                        <div class="text-xl font-weight-bold text-warning text-uppercase mb-1">
                            Đã bán được</div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800" id="soluongdabanquy4">{{ $soluongdabanquy4_hientai }}%</div>
                            </div>
                            <div class="col">
                                <div class="progress progress-sm mr-2">
                                    <div class="progress-bar bg-warning" role="progressbar" id="soluongdabanquy4%" style="width: {{ $soluongdabanquy4_hientai }}%" aria-valuenow="{{ $soluongdabanquy4_hientai }}" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- Biểu đồ  -->
<div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">So sánh lợi nhuận 3 nằm gần nhất</h6>
        </div>
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
                <canvas id="myAreaChart2" style="display: block; height: 320px; width: 587px;" width="733" height="400" class="chartjs-render-monitor"></canvas>
            </div>
            <hr>
        </div>
    </div>

<script>
    var namdangchon = document.getElementById("namdangchon");
    var currentDate = new Date();
    var currentYear = currentDate.getFullYear();
    //Quý 1
    var tiennhaphangquy1 = document.getElementById("tiennhaphangquy1");
    var tiendoanhthuquy1 = document.getElementById("tiendoanhthuquy1");
    var tienloinhuanquy1 = document.getElementById("tienloinhuanquy1");
    var soluongdabanquy1 = document.getElementById("soluongdabanquy1");
    var soluongdabanquy1phantram = document.getElementById("soluongdabanquy1%");
    //Quý 2
    var tiennhaphangquy2 = document.getElementById("tiennhaphangquy2");
    var tiendoanhthuquy2 = document.getElementById("tiendoanhthuquy2");
    var tienloinhuanquy2 = document.getElementById("tienloinhuanquy2");
    var soluongdabanquy2 = document.getElementById("soluongdabanquy2");
    var soluongdabanquy2phantram = document.getElementById("soluongdabanquy2%");
    //Quý 3
    var tiennhaphangquy3 = document.getElementById("tiennhaphangquy3");
    var tiendoanhthuquy3 = document.getElementById("tiendoanhthuquy3");
    var tienloinhuanquy3 = document.getElementById("tienloinhuanquy3");
    var soluongdabanquy3 = document.getElementById("soluongdabanquy3");
    var soluongdabanquy3phantram = document.getElementById("soluongdabanquy3%");
    //Quý 4
    var tiennhaphangquy4 = document.getElementById("tiennhaphangquy4");
    var tiendoanhthuquy4 = document.getElementById("tiendoanhthuquy4");
    var tienloinhuanquy4 = document.getElementById("tienloinhuanquy4");
    var soluongdabanquy4 = document.getElementById("soluongdabanquy4");
    var soluongdabanquy4phantram = document.getElementById("soluongdabanquy4%");
    //Năm hiện tại
    document.getElementById("namhientai").addEventListener("click", function(event) {
        event.preventDefault(); // Ngăn chặn hành động mặc định của liên kết (chuyển hướng trang)
        namdangchon.innerHTML = "Năm " + currentYear;
        //Quý 1
        tiennhaphangquy1.innerHTML = "Tiền nhập hàng: {{ $tiennhaphangquy1_hientai_dinhdang }}";
        tiendoanhthuquy1.innerHTML = "Tiền doanh thu: {{ $doanhthuquy1_hientai_dinhdang }}";
        tienloinhuanquy1.innerHTML = "Lợi nhuận: {{ $loinhuanquy1_hientai }}";
        soluongdabanquy1.innerHTML = "{{ $soluongdabanquy1_hientai }}%";
        soluongdabanquy1phantram.style.width = "{{ $soluongdabanquy1_hientai }}%"
        //Quý 2
        tiennhaphangquy2.innerHTML = "Tiền nhập hàng: {{ $tiennhaphangquy2_hientai_dinhdang }}";
        tiendoanhthuquy2.innerHTML = "Tiền doanh thu: {{ $doanhthuquy2_hientai_dinhdang }}";
        tienloinhuanquy2.innerHTML = "Lợi nhuận: {{ $loinhuanquy2_hientai }}";
        soluongdabanquy2.innerHTML = "{{ $soluongdabanquy2_hientai }}%";
        soluongdabanquy2phantram.style.width = "{{ $soluongdabanquy2_hientai }}%"
        //Quý 3
        tiennhaphangquy3.innerHTML = "Tiền nhập hàng: {{ $tiennhaphangquy3_hientai_dinhdang }}";
        tiendoanhthuquy3.innerHTML = "Tiền doanh thu: {{ $doanhthuquy3_hientai_dinhdang }}";
        tienloinhuanquy3.innerHTML = "Lợi nhuận: {{ $loinhuanquy3_hientai }}";
        soluongdabanquy3.innerHTML = "{{ $soluongdabanquy3_hientai }}%";
        soluongdabanquy3phantram.style.width = "{{ $soluongdabanquy3_hientai }}%"
        //Quý 4
        tiennhaphangquy4.innerHTML = "Tiền nhập hàng: {{ $tiennhaphangquy4_hientai_dinhdang }}";
        tiendoanhthuquy4.innerHTML = "Tiền doanh thu: {{ $doanhthuquy4_hientai_dinhdang }}";
        tienloinhuanquy4.innerHTML = "Lợi nhuận: {{ $loinhuanquy4_hientai }}";
        soluongdabanquy4.innerHTML = "{{ $soluongdabanquy4_hientai }}%";
        soluongdabanquy4phantram.style.width = "{{ $soluongdabanquy4_hientai }}%"
    });
    //Năm hiện tại -1
    document.getElementById("namhientai1").addEventListener("click", function(event) {
        event.preventDefault(); // Ngăn chặn hành động mặc định của liên kết (chuyển hướng trang)
        namdangchon.innerHTML = "Năm " + (currentYear - 1);
        //Quý 1
        tiennhaphangquy1.innerHTML = "Tiền nhập hàng: {{ $tiennhaphangquy1_hientai1_dinhdang }}";
        tiendoanhthuquy1.innerHTML = "Tiền doanh thu: {{ $doanhthuquy1_hientai1_dinhdang }}";
        tienloinhuanquy1.innerHTML = "Lợi nhuận: {{ $loinhuanquy1_hientai1 }}";
        soluongdabanquy1.innerHTML = "{{ $soluongdabanquy1_hientai1 }}%";
        soluongdabanquy1phantram.style.width = "{{ $soluongdabanquy1_hientai1 }}%"
        //Quý 2
        tiennhaphangquy2.innerHTML = "Tiền nhập hàng: {{ $tiennhaphangquy2_hientai1_dinhdang }}";
        tiendoanhthuquy2.innerHTML = "Tiền doanh thu: {{ $doanhthuquy2_hientai1_dinhdang }}";
        tienloinhuanquy2.innerHTML = "Lợi nhuận: {{ $loinhuanquy2_hientai1 }}";
        soluongdabanquy2.innerHTML = "{{ $soluongdabanquy2_hientai1 }}%";
        soluongdabanquy2phantram.style.width = "{{ $soluongdabanquy2_hientai1 }}%"
        //Quý 3
        tiennhaphangquy3.innerHTML = "Tiền nhập hàng: {{ $tiennhaphangquy3_hientai1_dinhdang }}";
        tiendoanhthuquy3.innerHTML = "Tiền doanh thu: {{ $doanhthuquy3_hientai1_dinhdang }}";
        tienloinhuanquy3.innerHTML = "Lợi nhuận: {{ $loinhuanquy3_hientai1 }}";
        soluongdabanquy3.innerHTML = "{{ $soluongdabanquy3_hientai1 }}%";
        soluongdabanquy3phantram.style.width = "{{ $soluongdabanquy3_hientai1 }}%"
        //Quý 4
        tiennhaphangquy4.innerHTML = "Tiền nhập hàng: {{ $tiennhaphangquy4_hientai1_dinhdang }}";
        tiendoanhthuquy4.innerHTML = "Tiền doanh thu: {{ $doanhthuquy4_hientai1_dinhdang }}";
        tienloinhuanquy4.innerHTML = "Lợi nhuận: {{ $loinhuanquy4_hientai1 }}";
        soluongdabanquy4.innerHTML = "{{ $soluongdabanquy4_hientai1 }}%";
        soluongdabanquy4phantram.style.width = "{{ $soluongdabanquy4_hientai1 }}%"
    });
    //Năm hiện tại - 2
    document.getElementById("namhientai2").addEventListener("click", function(event) {
        event.preventDefault(); // Ngăn chặn hành động mặc định của liên kết (chuyển hướng trang)
        namdangchon.innerHTML = "Năm " + (currentYear - 2);
        //Quý 1
        tiennhaphangquy1.innerHTML = "Tiền nhập hàng: {{ $tiennhaphangquy1_hientai2_dinhdang }}";
        tiendoanhthuquy1.innerHTML = "Tiền doanh thu: {{ $doanhthuquy1_hientai2_dinhdang }}";
        tienloinhuanquy1.innerHTML = "Lợi nhuận: {{ $loinhuanquy1_hientai2 }}";
        soluongdabanquy1.innerHTML = "{{ $soluongdabanquy1_hientai2 }}%";
        soluongdabanquy1phantram.style.width = "{{ $soluongdabanquy1_hientai2 }}%"
        //Quý 2
        tiennhaphangquy2.innerHTML = "Tiền nhập hàng: {{ $tiennhaphangquy2_hientai2_dinhdang }}";
        tiendoanhthuquy2.innerHTML = "Tiền doanh thu: {{ $doanhthuquy2_hientai2_dinhdang }}";
        tienloinhuanquy2.innerHTML = "Lợi nhuận: {{ $loinhuanquy2_hientai2 }}";
        soluongdabanquy2.innerHTML = "{{ $soluongdabanquy2_hientai2 }}%";
        soluongdabanquy2phantram.style.width = "{{ $soluongdabanquy2_hientai2 }}%"
        //Quý 3
        tiennhaphangquy3.innerHTML = "Tiền nhập hàng: {{ $tiennhaphangquy3_hientai2_dinhdang }}";
        tiendoanhthuquy3.innerHTML = "Tiền doanh thu: {{ $doanhthuquy3_hientai2_dinhdang }}";
        tienloinhuanquy3.innerHTML = "Lợi nhuận: {{ $loinhuanquy3_hientai2 }}";
        soluongdabanquy3.innerHTML = "{{ $soluongdabanquy3_hientai2 }}%";
        soluongdabanquy3phantram.style.width = "{{ $soluongdabanquy3_hientai2 }}%"
        //Quý 4
        tiennhaphangquy4.innerHTML = "Tiền nhập hàng: {{ $tiennhaphangquy4_hientai2_dinhdang }}";
        tiendoanhthuquy4.innerHTML = "Tiền doanh thu: {{ $doanhthuquy4_hientai2_dinhdang }}";
        tienloinhuanquy4.innerHTML = "Lợi nhuận: {{ $loinhuanquy4_hientai2 }}";
        soluongdabanquy4.innerHTML = "{{ $soluongdabanquy4_hientai2 }}%";
        soluongdabanquy4phantram.style.width = "{{ $soluongdabanquy4_hientai2 }}%"
    });


    //Lấy dữ liệu sang JS
    var loinhuanquy1_hientai = '{{ $loinhuanquy1_hientai }}';
    var loinhuanquy2_hientai = '{{ $loinhuanquy2_hientai }}';
    var loinhuanquy3_hientai = '{{ $loinhuanquy3_hientai }}';
    var loinhuanquy4_hientai = '{{ $loinhuanquy4_hientai }}';

    var loinhuanquy1_hientai1 = '{{ $loinhuanquy1_hientai1 }}';
    var loinhuanquy2_hientai1 = '{{ $loinhuanquy2_hientai1 }}';
    var loinhuanquy3_hientai1 = '{{ $loinhuanquy3_hientai1 }}';
    var loinhuanquy4_hientai1 = '{{ $loinhuanquy4_hientai1 }}';

    var loinhuanquy1_hientai2 = '{{ $loinhuanquy1_hientai2 }}';
    var loinhuanquy2_hientai2 = '{{ $loinhuanquy2_hientai2 }}';
    var loinhuanquy3_hientai2 = '{{ $loinhuanquy3_hientai2 }}';
    var loinhuanquy4_hientai2 = '{{ $loinhuanquy4_hientai2 }}';

</script>


@endsection