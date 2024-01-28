@extends('Layout.Admin_NhanVien.Layout')
@section('Title', 'Tạo hóa đơn nhập')
@section('TitleNav', 'Nhân viên kho')
@section('Admin_Renderbody')

    @php
        $sl = [];
        $mct = [];
    @endphp
    {{-- thuộc tính novalidate boolean vào tệp <form>. Điều này vô hiệu hóa chú giải công cụ phản hồi mặc định của trình duyệt  --}}
    <form class="row g-3 needs-validation" novalidate style="padding: 50px" method="POST"  action="{{ route('NhanVien.NhanVienKho.store') }}" enctype="multipart/form-data">
        @csrf @method('POST')
        

        <div class="row">
            <div class="col-6">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Mã hóa đơn nhập</label>
                    <input type="text" class="form-control" name ='ma_hoa_don_nhap' readonly id="exampleFormControlInput1" value="{{ $auto_ma_hoa_don_nhap }}" >
                    
                </div>
            </div>

            <div class="col-6">
                <div class="mb-3">
                    <label for="exampleFormControlInput2" class="form-label">Ngày tạo</label>
                    <input type="text" class="form-control" name ='ngay_nhap' readonly id="exampleFormControlInput1" value="{{$ngaynhap }}" >
                   
                </div>
            </div>
        </div>
        

        <div class="row">
            <div class="col-6">
                <div class="mb-3">
                    <label for="exampleFormControlInput3" class="form-label">Mã nhân viên</label>
                    <input type="text" class="form-control"  name ='ma_nhan_vien' readonly id="exampleFormControlInput3"   value="{{ $nhanvien->ma_nhan_vien }}">
                </div>
            </div>

            <div class="col-6">
                <div class="mb-3">
                    <label for="exampleFormControlInput3" class="form-label">Tên nhân viên</label>
                    <input type="text" class="form-control"  name ='ten_nhan_vien' readonly id="exampleFormControlInput3"   value="{{ $nhanvien->ten_nhan_vien }}">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <label for="exampleFormControlInput3" class="form-label">Nhà cung cấp</label>
                <select id="exampleFormControlInput3" {{ $List_CTHDB[1]!=0? 'disabled':'' }} name="ma_nha_cung_cap" class="form-select " aria-label="Default select example" required>
                    <option value="" selected>---</option>
                    @foreach ($nhacungcap as $item)
                        <option value="{{ $item->ma_nha_cung_cap }}" {{ request()->ma_nha_cung_cap == $item->ma_nha_cung_cap?'selected':'' }} >{{ $item->ten_nha_cung_cap }}</option>
                    @endforeach
                    
                </select>
                <div class="invalid-feedback">
                    Bạn cần chọn nhà cung cấp.
                </div>
            </div>

            <div class="col-6">
                <label for="exampleFormControlInput3" class="form-label">Sản phẩm</label>
                <select id="exampleFormControlInput3"  name="ma_san_pham" class="form-select " aria-label="Default select example" required>
                    <option value="" selected>---</option>
                    @foreach ($sanpham as $item)
                        <option value="{{ $item->ma_san_pham }}" {{ request()->ma_san_pham == $item->ma_san_pham ? 'selected':'' }} >{{ $item->ten_san_pham }}</option>
                    @endforeach
                    
                </select>
                <div class="invalid-feedback">
                    Bạn cần chọn nhà cung cấp.
                </div>
            </div>
        </div>
        @if ($list_CTSP[1]!=0)
            <h4 for="exampleFormControlInput2" class="form-label">Danh sách chi tiết sản phẩm</h4>
            <div class="row" style="margin-top: 20px">
                <div class="col-12">
                    
                        <table class="table">
                        <thead>
                            <tr>
                                <th> Mã chi tiết sản phẩm</th>
            
                                <th>Số lượng còn
                                </th>
                                <th>Đơn giá nhập</th>
                                <th>Size</th>
                                <th>Màu sắc</th>
                                <th>Số lượng nhập</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $index = 1;
                            @endphp
                            @foreach ($list_CTSP[0] as $item)
                                <tr>
                                    
                                    <td name ='ma_chi_tiet_san_pham*{{ $index}}'> {{$item->ma_chi_tiet_san_pham  }}</td>
                                    
                                    <input style="display: none;" type="text" class="form-control"  name ='ma_chi_tiet_san_pham*{{ $index}}'  id="exampleFormControlInput3"   value="{{$item->ma_chi_tiet_san_pham  }}">
                                    
                                    <td style="color:{{ $item->so_luong == 0? 'red':'' }}">{{$item->so_luong  }}</td>
                                    
                                    <td>{{$item->don_gia_nhap  }}</td>
                                    
                                    <input style="display: none;" type="text" class="form-control"  name ='don_gia_nhap'  id="exampleFormControlInput3"   value="{{$item->don_gia_nhap  }}">
                                    
                                    <td>{{$item->size  }}</td>
                                    <td>
                                        <div style="width:15px; height:15px; background: #{{ $item->ma_mau }}"> </div>
                                    </td>
                                    <td>
                                        <input style="width: 150px" type="number" class="form-control" min='0'  name ='so_luong_nhap*{{ $index}}'  id="exampleFormControlInput3"  >
                                    </td>
                                    <td>
                                    <button class="btn btn-success">
                                        <i class="bi bi-plus-square-fill"></i>
                                    </button>

                                    </td>
                                </tr>
                                <input style="width: 150px" type="hidden" class="form-control" name ='index' value="{{ $index++}}"  id="exampleFormControlInput3"  >
                            @endforeach
                            
                        </tbody>
                    </table>
                

                </div>
            </div>

        @endif
       
        @if($List_CTHDB[1]!=0)
            <h4 for="exampleFormControlInput2" class="form-label">Chi tiết hóa đơn nhập</h4>
            <div class="row" style="margin-top: 20px">
                <div class="col-12">
                        <table class="table">
                        <thead>
                            <tr>
                                <th>Mã sản phẩm</th>
                                <th>Tên sản phẩm</th>
                                <th> Mã chi tiết sản phẩm</th>
                                <th>Size</th>
                                <th>Màu sắc</th>
                                <th> Số lượng nhập</th>
                                <th>Đơn giá nhập</th>
                                <th>Thành tiền</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @foreach ($List_CTHDB[0] as $item)
                                @php
                                    array_push($sl, $item->so_luong_nhap);
                                    array_push($mct, $item->ma_chi_tiet_san_pham);
                                @endphp
                                <tr>
                                    
                                    <td> {{$item->ma_san_pham  }}</td>

                                    <td> {{$item->ten_san_pham  }}</td>

                                    <td> {{$item->ma_chi_tiet_san_pham  }}</td>
                                    
                                    <td>{{$item->size }}</td>
                                    <td>
                                        <div style="width:15px; height:15px; background: #{{ $item->ma_mau }}"> </div>
                                    </td>
                                    <td >{{$item->so_luong_nhap  }}</td>
                                    <td>{{$item->don_gia_nhap  }}</td>
                                    <td>{{$item->thanh_tien  }}</td>
                                    <td>
                                        <a class=" btn btn-danger btn_delete_CTHDN" href="{{ route('NhanVien.NhanVienKho.destroyCTHDN', 
                                        [
                                            'ma_hoa_don_nhap' => $auto_ma_hoa_don_nhap, 
                                            'ma_chi_tiet_san_pham' => $item->ma_chi_tiet_san_pham,
                                            'ma_san_pham'
                                        ]) }}">
                                            <i class="bi bi-x-square-fill"></i>
                                        </a>
                                    </td>
                                    
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                

                </div>
            </div>
            <div class="row" style="margin-top: 20px">
                <h4>Tổng tiền: {{ $List_CTHDB[2] }}</h4>
            </div>
        @endif
            

        <div class="col-12">
            <a href="{{ route('NhanVien.NhanVienKho.createHDN',
            [
                'tong_tien' => $List_CTHDB[2],
                'sl' =>$sl ,
                'mct' =>$mct, 
                'mhdn' => $auto_ma_hoa_don_nhap,
                'msp' =>request()->ma_san_pham,
                'mncc' => request()->ma_nha_cung_cap
            ]) }}"class="btn btn-primary btn_tao_CTHDN">Tạo hóa đơn</a>


            <a href="{{ route('NhanVien.NhanVienKho.quaylai',
            [
                'tong_tien' => $List_CTHDB[2],
                'sl' =>$sl ,
                'mct' =>$mct, 
                'mhdn' => $auto_ma_hoa_don_nhap,
                'msp' =>request()->ma_san_pham,
                'mncc' => request()->ma_nha_cung_cap
            ]) }}"class="btn btn-dark btn_quaylai">Quay lại</a>
        </div>
    </form>
    <form method="POST" action="" id="from_delete_CTHDN">
        @csrf @method('DELETE')
    </form>

    <form method="POST" action="" id="from_tao_CTHDN">
        @csrf @method('PUT')
    </form>

    <form method="POST" action="" id="from_quaylai">
        @csrf @method('GET')
    </form>
@endsection
@section('js')
    <script>
        
        if ('{{ request()->ma_nha_cung_cap }}' != '' || '{{ request()->ma_nhan_vien }}'!='' )
        {
            // Sử dụng hàm scrollIntoView để cuộn trang đến phần tử mục tiêu.
            document.getElementById('scrocllView').scrollIntoView();
        }
        var url = "{{ route('NhanVien.NhanVienKho.create') }}";
        document.addEventListener("DOMContentLoaded", function() {
            var selectElementSanPham = document.querySelector("select[name='ma_san_pham']");
            
            selectElementSanPham.addEventListener("change", function() {
                var selectedValueSanPham = selectElementSanPham.value;
                console.log(selectedValueSanPham)
                if(document.querySelector("select[name='ma_nha_cung_cap']").value != '')
                    window.location.href = NewURL({ma_san_pham:selectedValueSanPham, ma_nha_cung_cap:document.querySelector("select[name='ma_nha_cung_cap']").value}, [], url);
                
            });
        });


        $('.btn_delete_CTHDN').click(function(ev){
            ev.preventDefault();// k cho load lại trang
            var _herf = $(this).attr('href'); // lấy link của thẻ a hiện tại đang click vào
            $('#from_delete_CTHDN').attr('action', _herf); // gán action của vào form là href của thẻ a vừa click vào
            
            Swal.fire({
                title: 'Bạn muốn xóa chi tiết này không?',
                text: "",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText:'Không',
                confirmButtonText: 'Có'
            }).then((result) => {
            if (result.isConfirmed) 
            {
                //Swal.fire('Xóa thành công!','','success');
                $('#from_delete_CTHDN').submit();
            }
            });
        });


        $('.btn_tao_CTHDN').click(function(ev){
            ev.preventDefault();// k cho load lại trang
            var _herf = $(this).attr('href'); // lấy link của thẻ a hiện tại đang click vào
            $('#from_tao_CTHDN').attr('action', _herf); // gán action của vào form là href của thẻ a vừa click vào
            $('#from_tao_CTHDN').submit();
        });



        $('.btn_quaylai').click(function(ev){
            ev.preventDefault();// k cho load lại trang
            var _herf = $(this).attr('href'); // lấy link của thẻ a hiện tại đang click vào
            $('#from_quaylai').attr('action', _herf); // gán action của vào form là href của thẻ a vừa click vào
            
            Swal.fire({
                title: 'Bạn muốn thoát không?',
                text: "",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText:'Tiếp tục',
                confirmButtonText: 'Có'
            }).then((result) => {
            if (result.isConfirmed) 
            {
                //Swal.fire('Xóa thành công!','','success');
                $('#from_quaylai').submit();
            }
            });
        });
    </script>
    @if (session()->has('XoaChiTiet_ThanhCong'))
        <script>Swal.fire('Xóa thành công', '{{ session()->get('XoaChiTiet_ThanhCong') }}' ,'success');</script>
    @endif 

    @if (session()->has('ThemChiTiet_ThanhCong'))
        <script>Swal.fire('Thêm thành công', '{{ session()->get('ThemChiTiet_ThanhCong') }}' ,'success');</script>
    @endif 

    @if (session()->has('TaoHDN_error'))
        <script>Swal.fire('Tạo không thành công', '{{ session()->get('TaoHDN_error') }}' ,'error');</script>
    @endif 
@endsection