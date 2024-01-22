@extends('Layout.Admin_NhanVien.Layout')
@section('Title', 'Sản phẩm')
@section('TitleNav', 'Nhân viên kho')
@section('Admin_Renderbody')

    <div style="padding: 20px">

        <form action="" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" style="float: right; display: flex;">
            <div class="input-group">
                <input type="text" name="Key_SanPhamNVK" value="{{ request()->Key_SanPhamNVK }}" class="form-control bg-light border-0 small" placeholder="Tìm kiếm..."
                    aria-label="Search" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">
                        <i class="fas fa-search fa-sm"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped ">
                <thead>
                    <tr>
                        <th>
                            <div class="row">
                                <div class="col-6" style=" margin: 0; padding:0">
                                    Mã sản phẩm 
                                </div>
                                <div class="col-6" style=" margin: 0; padding:0">
                                    <a   onclick="sort('ma_san_pham', 'asc')" class="bi bi-arrow-up-short" style=""></i>
                                    <a   onclick="sort('ma_san_pham', 'desc')" class="bi bi-arrow-down-short" style="display: block;"></a>
                                </div>
                            </div>
                        </th>

                        <th style="text-align: center; vertical-align: middle;">Ảnh đại diện</th>
                        <th>
                            <div class="row">
                                <div class="col-6" style=" margin: 0; padding:0">
                                    Tên sản phẩm 
                                </div>
                                <div class="col-6" style=" margin: 0; padding:0">
                                    <a   onclick="sort('ten_san_pham', 'asc')" class="bi bi-arrow-up-short" style=""></i>
                                    <a   onclick="sort('ten_san_pham', 'desc')" class="bi bi-arrow-down-short" style="display: block;"></a>
                                </div>
                            </div>
                        </th>
                        <th>Thể loại</th>   
                        <th>
                            <div class="row">
                                <div class="col-6" style=" margin: 0; padding:0">
                                    Tổng số lượng
                                </div>
                                <div class="col-6" style=" margin: 0; padding:0">
                                    <a   onclick="sort('tong_so_luong', 'asc')" class="bi bi-arrow-up-short" style=""></i>
                                    <a   onclick="sort('tong_so_luong', 'desc')" class="bi bi-arrow-down-short" style="display: block;"></a>
                                </div>
                            </div>
                        </th>   
                        <th>
                            <div class="row">
                                <div class="col-6" style=" margin: 0; padding:0">
                                    Đơn giá nhập
                                </div>
                                <div class="col-6" style=" margin: 0; padding:0">
                                    <a   onclick="sort('don_gia_nhap', 'asc')" class="bi bi-arrow-up-short" style=""></i>
                                    <a   onclick="sort('don_gia_nhap', 'desc')" class="bi bi-arrow-down-short" style="display: block;"></a>
                                </div>
                            </div>
                        </th>
                        <th>
                            <div class="row">
                                <div class="col-6" style=" margin: 0; padding:0">
                                   Đơn giá bán
                                </div>
                                <div class="col-6" style=" margin: 0; padding:0">
                                    <a   onclick="sort('don_gia_ban', 'asc')" class="bi bi-arrow-up-short" style=""></i>
                                    <a   onclick="sort('don_gia_ban', 'desc')" class="bi bi-arrow-down-short" style="display: block;"></a>
                                </div>
                            </div>
                        </th>
                        <th>
                            <div class="row">
                                <div class="col-6" style=" margin: 0; padding:0">
                                    Giảm giá
                                </div>
                                <div class="col-6" style=" margin: 0; padding:0">
                                    <a   onclick="sort('giam_gia', 'asc')" class="bi bi-arrow-up-short" style=""></i>
                                    <a   onclick="sort('giam_gia', 'desc')" class="bi bi-arrow-down-short" style="display: block;"></a>
                                </div>
                            </div>
                        </th>   
                        <th class="text-center">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($Data_SanPham as $item)
                        <tr>
                            <td>{{ $item->ma_san_pham }}</td>
                            <td><img style="width:95px; height:81px" src="{{ asset('IMG_SanPham/'.$item->anh_dai_dien) }}" alt=""></td>
                            <td>{{ $item->ten_san_pham }}</td>
                            <td>{{ $item->ten_the_loai }}</td>
                            <td>{{ $item->tong_so_luong}}</td>
                            <td>{{ $item->don_gia_nhap }}</td>
                            <td>{{ $item->don_gia_ban }}</td>
                            <td>{{ $item->giam_gia }}</td>
                            <td class="text-center">
                                <a href="{{ route('NhanVien.NhanVienKho.DetailSanPham', $item->ma_san_pham) }}" class="btn btn-success">
                                    <i class="bi bi-journals"></i>
                                </a>
                               
                            </td>
                        </tr>
                    @endforeach 
                </tbody>
            </table>
            <div>
                {{-- dữ nguyên tham số trên URL --}}
                {{ $Data_SanPham->appends(request()->all())->links() }} 
            </div>
           
        </div>
    </div>
    
@endsection
@section('js')
    
    <script>

        var url = "{{ route('NhanVien.NhanVienKho.ListSanPham') }}";

        
    </script>

    
@endsection
