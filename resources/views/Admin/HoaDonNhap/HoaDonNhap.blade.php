@extends('Layout.Admin_NhanVien.Layout')
@section('Title', 'Hóa đơn nhập')

@section('Admin_Renderbody')
    <div style="padding: 20px">
        {{-- <a href="{{ route('Admin.HoaDon.create') }}" class="btn btn-primary">Thêm thể loại</a> --}}
        <form action="" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" style="float: right; display: flex;">
            <div class="input-group">
                <input type="text" name="Key_HoaDonNhap" value="{{ request()->Key_HoaDonNhap }}" class="form-control bg-light border-0 small" placeholder="Tìm kiếm..."
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
                                    Mã hóa đơn nhập
                                </div>
                                <div class="col-6" style=" margin: 0; padding:0">
                                    <a   onclick="sort('ma_hoa_don_nhap', 'asc')" class="bi bi-arrow-up-short" style=""></i>
                                    <a   onclick="sort('ma_hoa_don_nhap', 'desc')" class="bi bi-arrow-down-short" style="display: block;"></a>
                                </div>
                            </div>
                        </th>
                        
                        <th>
                            <div class="row">
                                <div class="col-6" style=" margin: 0; padding:0">
                                    Ngày nhập 
                                </div>
                                <div class="col-6" style=" margin: 0; padding:0">
                                    <a   onclick="sort('ngay_nhap', 'asc')" class="bi bi-arrow-up-short" style=""></i>
                                    <a   onclick="sort('ngay_nhap', 'desc')" class="bi bi-arrow-down-short" style="display: block;"></a>
                                </div>
                            </div>
                        </th>

                        <th>
                            <div class="row">
                                <div class="col-6" style=" margin: 0; padding:0">
                                    Mã nhân viên  
                                </div>
                                <div class="col-6" style=" margin: 0; padding:0">
                                    <a   onclick="sort('nhan_viens.ma_nhan_vien', 'asc')" class="bi bi-arrow-up-short" style=""></i>
                                    <a   onclick="sort('nhan_viens.ma_nhan_vien', 'desc')" class="bi bi-arrow-down-short" style="display: block;"></a>
                                </div>
                            </div>
                        </th>

                        <th>
                            <div class="row">
                                <div class="col-6" style=" margin: 0; padding:0">
                                    Tên nhân viên  
                                </div>
                                <div class="col-6" style=" margin: 0; padding:0">
                                    <a   onclick="sort('ten_nhan_vien', 'asc')" class="bi bi-arrow-up-short" style=""></i>
                                    <a   onclick="sort('ten_nhan_vien', 'desc')" class="bi bi-arrow-down-short" style="display: block;"></a>
                                </div>
                            </div>
                        </th>

                        <th>
                            <div class="row">
                                <div class="col-6" style=" margin: 0; padding:0">
                                    Tên nhà cung cấp 
                                </div>
                                <div class="col-6" style=" margin: 0; padding:0">
                                    <a   onclick="sort('ten_nha_cung_cap', 'asc')" class="bi bi-arrow-up-short" style=""></i>
                                    <a   onclick="sort('ten_nha_cung_cap', 'desc')" class="bi bi-arrow-down-short" style="display: block;"></a>
                                </div>
                            </div>
                        </th>

                        <th>
                            <div class="row">
                                <div class="col-6" style=" margin: 0; padding:0">
                                    Tổng tiền
                                </div>
                                <div class="col-6" style=" margin: 0; padding:0">
                                    <a   onclick="sort('tong_tien_hdn', 'asc')" class="bi bi-arrow-up-short" style=""></i>
                                    <a   onclick="sort('tong_tien_hdn', 'desc')" class="bi bi-arrow-down-short" style="display: block;"></a>
                                </div>
                            </div>
                        </th>

                        
                        
                        <th class="text-center">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($Data_HoaDonNhap as $item)
                        <tr>
                            <td>{{ $item->ma_hoa_don_nhap }}</td>
                            <td>{{ $item->ngay_nhap }}</td>
                            <td>{{ $item->ma_nhan_vien }}</td>
                            <td>{{ $item->ten_nhan_vien }}</td>
                            <td>{{ $item->ten_nha_cung_cap }}</td>
                            <td>{{ $item->tong_tien_hdn}}</td>
                            <td class="text-center">
                                <a href="{{ route('Admin.HoaDonNhap.show', $item->ma_hoa_don_nhap) }}" class="btn btn-success">
                                    <i class="bi bi-journals"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div>
                {{ $Data_HoaDonNhap->appends(request()->all())->links() }} {{-- dữ nguyên tham số trên URL --}}
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        var url = "{{ route('Admin.HoaDonNhap.index') }}";
    </script>
   
@endsection