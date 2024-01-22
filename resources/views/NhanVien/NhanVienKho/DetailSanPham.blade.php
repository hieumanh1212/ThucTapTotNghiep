@extends('Layout.Admin_NhanVien.Layout')
@section('Title', 'Chi tiết sản phẩm')
@section('TitleNav', 'Nhân viên kho')
@section('Admin_Renderbody')

<div style="padding: 20px">

    <form action="" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" style="float: right; display: flex;">
        <div class="input-group">
            <input type="text" name="Key_DetailSanPhamNVK" value="{{ request()->Key_DetailSanPhamNVK }}" class="form-control bg-light border-0 small" placeholder="Tìm kiếm..."
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

        <table class="table">
            <thead>
                <tr>
                    <th>
                        <div class="row">
                            <div class="col-6" style=" margin: 0; padding:0">
                                Mã chi tiết sản phẩm
                            </div>
                            <div class="col-6" style=" margin: 0; padding:0">
                                <a   onclick="sort('ma_chi_tiet_san_pham', 'asc')" class="bi bi-arrow-up-short" style=""></i>
                                <a   onclick="sort('ma_chi_tiet_san_pham', 'desc')" class="bi bi-arrow-down-short" style="display: block;"></a>
                            </div>
                        </div>
                    </th>

                    <th>
                        <div class="row">
                            <div class="col-6" style=" margin: 0; padding:0">
                                Số lượng 
                            </div>
                            <div class="col-6" style=" margin: 0; padding:0">
                                <a   onclick="sort('so_luong', 'asc')" class="bi bi-arrow-up-short" style=""></i>
                                <a   onclick="sort('so_luong', 'desc')" class="bi bi-arrow-down-short" style="display: block;"></a>
                            </div>
                        </div>
                    </th>
                    <th>Trạng thái</th>
                    <th>Size</th>
                    <th>Màu sắc</th>
                    {{-- <th>Hành động</th> --}}
                </tr>
            </thead>
            <tbody>
                @foreach ($ListChiTietSP[0] as $item)
                    <tr>
                        <td>{{$item->ma_chi_tiet_san_pham  }}</td>
                        <td style="color:{{ $item->so_luong == 0? 'red':'' }}">{{$item->so_luong  }}</td>
                        <td><p style="color:{{ $item->trang_thai =='1'? 'rgb(17, 255, 0)':'rgb(255, 208, 0)'}}">{{$item->trang_thai  }}</p></td>
                        <td>{{$item->size  }}</td>
                        <td>
                            <div style="width:15px; height:15px; background: #{{ $item->ma_mau }}"> </div>
                        </td>
                        {{-- <td>
                            <a href="" class="btn btn-success">
                                <i class="bi bi-journals"></i>
                            </a>
                            <a href="{{ route('Admin.ChiTietSanPham.edit', ['ChiTietSanPham'=>$item->ma_chi_tiet_san_pham, 'ten_san_pham'=>$Data_SanPham->ten_san_pham]) }}" class="btn btn-success">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <a href="{{ route('Admin.ChiTietSanPham.destroy', ['ChiTietSanPham'=>$item->ma_chi_tiet_san_pham, 'ma_san_pham'=>$Data_SanPham->ma_san_pham]) }}" class="btn btn-danger btn_delete_chitietsanpham">
                                <i class="bi bi-x-square-fill"></i>
                            </a>
                        </td> --}}
                    </tr>
                
                @endforeach
            </tbody>
        </table>
        <div>
            {{-- dữ nguyên tham số trên URL --}}
            {{ $ListChiTietSP[0]->appends(request()->all())->links() }} 
        </div>

                
        <div style="margin-bottom: 20px">
            <th class="col-2">Tổng số lượng chi tiết sản phẩm</th>
            <td class="col-10 ">{{ $ListChiTietSP[1]}}</td>
        </div>
            
        
        <a href="{{ route('NhanVien.NhanVienKho.ListSanPham') }}" class="btn btn-dark">Quay lại</a>
      
        
    </div>
</div>
@endsection
@section('js')
    <script>
        var url = "{{ route('NhanVien.NhanVienKho.DetailSanPham', $masanpham)}}";
    </script>
    

    
@endsection