@extends('Layout.Admin_NhanVien.Layout')
@section('Title', 'Chi tiết sản phẩm')

@section('Admin_Renderbody')
<div style="padding: 20px">
    <a href="{{ route('Admin.ChiTietSanPham.create',  ['ma_san_pham'=> $Data_SanPham->ma_san_pham, 'ten_san_pham'=>$Data_SanPham->ten_san_pham]) }}" class="btn btn-primary">Thêm chi tiết sản phẩm</a>
    {{-- <form action="" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" style="float: right; display: flex;">
        <div class="input-group">
            <input type="text" name="Key_TinTuc" value="{{ request()->Key_TinTuc }}" class="form-control bg-light border-0 small" placeholder="Tìm kiếm..."
                aria-label="Search" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button class="btn btn-primary" type="submit">
                    <i class="fas fa-search fa-sm"></i>
                </button>
            </div>
        </div>
    </form> --}}
</div>

<div class="card-body">
    <div class="table-responsive">
        <table class="table ">
            {{-- <thead>
                <tr>
                    <th>Mã tin tức</th>
                    <th>Ảnh đại diện</th>
                    <th>Tiêu đề</th>
                   
                    <th class="text-center">Hành động</th>
                </tr>
            </thead> --}}
            <tbody>
                <tr>
                    <th class="col-2">Mã sản phẩm</th>
                    <td class="col-10">{{ $Data_SanPham->ma_san_pham }}</td>
                </tr>

                <tr>
                    <th class="col-2">Tên sản phẩm</th>
                    <td class="col-10">{{ $Data_SanPham->ten_san_pham }}</td>
                </tr>   

                <tr>
                    <th class="col-2">Ảnh đại diện</th>
                    <td class="col-10" style="display: flex; flex-direction: column; align-items: center; text-align: center;">
                        <img  style="width: 300px;height: 300px;"  src="{{asset('IMG_SanPham/'.$Data_SanPham->anh_dai_dien)}}" alt="Preview Image" 
                    </td>
                </tr>  

                <tr>
                    <th class="col-2">Ảnh chi tiết</th>
                    <td class="col-10">
                        <div class="row">
                            @foreach ($ListImage as $item)
                                <div class="col-md-3">
                                    <img id="img-show" src="{{ asset('IMG_SanPham/'.$item->hinh_anh)}}" alt="" style="width:100%;height:220px;margin-top: 20px;">
                                </div>
                            @endforeach
                        </div>
                    </td>
                </tr>

                <tr>
                    <th class="col-2">Đơn giá nhập</th>
                    <td class="col-10">{{ $Data_SanPham->don_gia_nhap }}</td>
                </tr>  

                <tr>
                    <th class="col-2">Đơn giá bán</th>
                    <td class="col-10">{{ $Data_SanPham->don_gia_ban }}</td>
                </tr> 

                <tr>
                    <th class="col-2">Giảm giá</th>
                    <td class="col-10">{{ $Data_SanPham->giam_gia }}</td>
                </tr> 

                <tr>
                    <th class="col-2">Thể loại</th>
                    <td class="col-10">{{ $Data_TheLoai->ten_the_loai }}</td>
                </tr> 

                <tr>
                    <th class="col-2">Mô tả</th>
                    <td class="col-10">
                        <textarea  class="form-control" name ='mo_ta' id="Show_SanPham_ckeditor" rows="3" required >{{  $Data_SanPham->mo_ta }}</textarea>
                    </td>
                </tr> 


                <tr>
                    <th class="col-2">Danh sách chi tiết</th>
                    <td class="col-10">{{count($Data_ChiTietSP[0])?"":"Không có chi tiết sản phẩm" }}</td>
                    
                    
                </tr> 
                @if(count($Data_ChiTietSP[0])!=0 || request()->Namesearch !='')
                    <tr>
                        <th class="col-2"></th>
                        <td class="col-10">
                            <form action="{{ route('Admin.SanPham.show', $Data_SanPham->ma_san_pham) }}" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" style="float: right; display: flex;">
            
                                <div class="input-group">
                                    <select style="width:200px" name="Namesearch" class="form-select " aria-label="Default select example">
                                        <option value="tat_ca" selected>Tất cả</option>
                                        <option value="ma_chi_tiet_san_pham" {{ request()->Namesearch=='ma_chi_tiet_san_pham'? 'selected':'' }}>Mã chi tiết</option>
                                        <option value="so_luong" {{ request()->Namesearch=='so_luong'? 'selected':'' }}>Số lượng</option>
                                        <option value="trang_thai" {{ request()->Namesearch=='trang_thai'? 'selected':'' }}>Trạng thái</option>
                                        <option value="ma_mau" {{ request()->Namesearch=='ma_mau'? 'selected':'' }}>Màu sắc</option>
                                        <option value="ma_size" {{ request()->Namesearch=='ma_size'? 'selected':'' }}>Size</option>
                                    </select>
                                    <input style="width:200px; display: none" type="text" id="Key_ChiTietSanPham" name="Key_ChiTietSanPham" value="{{ request()->Key_ChiTietSanPham }}" class="form-control" 
                                    placeholder="Tìm kiếm..." aria-label="Search" aria-describedby="basic-addon2">
                                    
                                    <select style="width:200px" hidden name="Select" class="form-select " aria-label="Default select example" style="margin-right: 0">
                                        <option value="" selected>---</option>
                                        @if (request()->Namesearch == 'so_luong' || request()->Namesearch == 'trang_thai')
                                            @foreach ($arrSelect as $item)
                                                <option value="{{ $item }}" {{ request()->Select == $item? 'selected':'' }}>{{ $item }}</option>
                                            @endforeach
                                        @endif

                                        @if (request()->Namesearch == 'ma_mau')
                                            @foreach ($arrSelect as $item)
                                                <option value="{{ $item->ma_mau }}" {{ request()->Select == $item->ma_mau? 'selected':'' }}>{{ $item->mau }}</option>
                                            @endforeach
                                        @endif

                                        @if (request()->Namesearch == 'ma_size')
                                            @foreach ($arrSelect as $item)
                                                <option value="{{ $item->ma_size }}" {{ request()->Select == $item->ma_size? 'selected':'' }}>{{ $item->size }}</option>
                                            @endforeach
                                        @endif
                                        
                                    </select>
                                    <div style="display: none;" class="input-group-append" id="btnSubmit">
                                        <button class="btn btn-primary" type="submit" >
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
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
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($Data_ChiTietSP[0] as $item)
                                        <tr>
                                            <td>{{$item->ma_chi_tiet_san_pham  }}</td>
                                            <td style="color:{{ $item->so_luong == 0? 'red':'' }}">{{$item->so_luong  }}</td>
                                            <td><p style="color:{{ $item->trang_thai =='1'? 'rgb(17, 255, 0)':'rgb(255, 208, 0)'}}">{{$item->trang_thai  }}</p></td>
                                            <td>{{$item->size  }}</td>
                                            <td>
                                                <div style="width:15px; height:15px; background: #{{ $item->ma_mau }}"> </div>
                                            </td>
                                            <td>
                                                {{-- <a href="" class="btn btn-success">
                                                    <i class="bi bi-journals"></i>
                                                </a> --}}
                                                <a href="{{ route('Admin.ChiTietSanPham.edit', ['ChiTietSanPham'=>$item->ma_chi_tiet_san_pham, 'ten_san_pham'=>$Data_SanPham->ten_san_pham]) }}" class="btn btn-success">
                                                    <i class="bi bi-pencil-square"></i>
                                                </a>
                                                <a href="{{ route('Admin.ChiTietSanPham.destroy', ['ChiTietSanPham'=>$item->ma_chi_tiet_san_pham, 'ma_san_pham'=>$Data_SanPham->ma_san_pham]) }}" class="btn btn-danger btn_delete_chitietsanpham">
                                                    <i class="bi bi-x-square-fill"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    
                                    @endforeach
                                </tbody>
                            </table>
                            <div>
                                {{-- dữ nguyên tham số trên URL --}}
                                {{ $Data_ChiTietSP[0]->appends(request()->all())->links() }} 
                            </div>
                            <form method="POST" action="" id="from_delete_chitietsanpham">
                                @csrf @method('DELETE')
                            </form>
                        </td>
                    </tr>
                @endif
                
                <tr>
                    <th class="col-2">Tổng số lượng chi tiết sản phẩm</th>
                    <td class="col-10 ">{{ $Data_ChiTietSP[1]}}</td>
                </tr>
            </tbody>
        </table>
        <a href="{{ route('Admin.SanPham.index') }}" class="btn btn-dark">Quay lại</a>
    </div>
</div>
@endsection
@section('js')
    <script>

        if ('{{ request()->Namesearch }}' != '' || '{{ request()->Sort }}'!='' || '{{ request()->page }}'!='')
        {
            // Sử dụng hàm scrollIntoView để cuộn trang đến phần tử mục tiêu.
            document.getElementById('scrocllView').scrollIntoView();
        }
         
        $('.btn_delete_chitietsanpham').click(function(ev){
            ev.preventDefault();// k cho load lại trang
            var _herf = $(this).attr('href'); // lấy link của thẻ a hiện tại đang click vào
            $('#from_delete_chitietsanpham').attr('action', _herf); // gán action của vào form là href của thẻ a vừa click vào
            //$('#from_delete_sanpham').submit();
            Swal.fire({
                title: 'Bạn muốn xóa chi tiết sản phẩm này không?',
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
                $('#from_delete_chitietsanpham').submit();
            }
            });
        });


        ClassicEditor
        .create( document.querySelector( '#Show_SanPham_ckeditor' ),
        {
            ckfinder: {
                uploadUrl:"{{ route('ckeditor.uploadImage', ['_token'=>csrf_token(), 'isCheck' => 'SanPham']) }}"
            }
        })
        .catch( error => {
            console.error( error );
        } );

        function hiden(checkNameSearch)
        {
            document.querySelector("select[name='Select']").setAttribute("hidden", true);
            document.getElementById("Key_ChiTietSanPham").style.display = "none";
            document.getElementById("btnSubmit").style.display ='none';
            if(checkNameSearch ==='trang_thai' || 
            checkNameSearch ==='ma_mau' || 
            checkNameSearch ==='ma_size' || 
            checkNameSearch ==='so_luong')
            {
                document.getElementById("Key_ChiTietSanPham").value ='';   
            }
            else if(checkNameSearch ==='ma_chi_tiet_san_pham')
            {
                document.querySelector("select[name='Select']").value = '';
                document.getElementById("btnSubmit").style.display ='block';
            }
            else
            {
                document.getElementById("Key_ChiTietSanPham").value ='';
                document.querySelector("select[name='Select']").value = '';
            }
                
        }

        function load()
        {
            if ('{{ request()->Namesearch }}' === 'so_luong' || 
            '{{ request()->Namesearch }}' === 'trang_thai'||
            '{{ request()->Namesearch }}' === 'ma_mau'||
            '{{ request()->Namesearch }}' === 'ma_size')
            {
                hiden('{{ request()->Namesearch }}');
                document.querySelector("select[name='Select']").removeAttribute("hidden");
            }
            else if('{{ request()->Namesearch }}' === 'ma_chi_tiet_san_pham')
            {
                hiden('{{ request()->Namesearch }}');
                document.getElementById("Key_ChiTietSanPham").style.display = "block";
            }
            else
            {
                hiden('{{ request()->Namesearch }}');
            }
        }
        load();

        var url = "{{ route('Admin.SanPham.show', $Data_SanPham->ma_san_pham) }}";
        document.addEventListener("DOMContentLoaded", function() 
        {
            var selectElementNamesearch = document.querySelector("select[name='Namesearch']");
            selectElementNamesearch.addEventListener("change", function() 
            {
                var selectedValueNamesearch = selectElementNamesearch.value;
                // Đặt giá trị Namesearch vào selectedValueNamesearch và tải lại trang
                //window.location.href = "{{ route('Admin.SanPham.index') }}?Namesearch=" + selectedValueNamesearch;
                var removeRequest =[];
                if(selectedValueNamesearch === 'ma_chi_tiet_san_pham')
                    removeRequest = ['Select'];
                else if(selectedValueNamesearch === 'tat_ca')
                    removeRequest = ['Key_ChiTietSanPham', 'Select']
                else
                    removeRequest = ['Key_ChiTietSanPham', 'Select'];
                window.location.href = NewURL({Namesearch:selectedValueNamesearch, page:1}, removeRequest, url);
            });
        });
        document.addEventListener("DOMContentLoaded", function() {
            var selectElementSelect = document.querySelector("select[name='Select']");
            
            selectElementSelect.addEventListener("change", function() {
                var selectedValueSelect = selectElementSelect.value;
                window.location.href = NewURL({Select:selectedValueSelect}, [], url);
                
            });
        });
        
    </script>
    @if (session()->has('ThemChiTietSanPham_ThanhCong'))
        <script>Swal.fire('Thêm thành công',  '{{ session()->get('ThemChiTietSanPham_ThanhCong') }}' ,'success');</script>
    @endif 

    @if (session()->has('XoaChiTietSanPham_ThanhCong'))
        <script>Swal.fire('Xóa thành công',  '{{ session()->get('XoaChiTietSanPham_ThanhCong') }}' ,'success');</script>
    @endif 

    @if (session()->has('XoaChiTietSanPham_Error'))
        <script>Swal.fire('Xóa không thành công',  '{{ session()->get('XoaChiTietSanPham_Error') }}' ,'error');</script>
    @endif 

    @if (session()->has('SuaChiTietSanPham_ThanhCong'))
        <script>Swal.fire('Xóa thành công',  '{{ session()->get('SuaChiTietSanPham_ThanhCong') }}' ,'success');</script>
    @endif 

    
@endsection