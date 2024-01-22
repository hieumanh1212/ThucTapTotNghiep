@extends('Layout.Admin_NhanVien.Layout')
@section('Title', 'Sản phẩm')

@section('Admin_Renderbody')
    <div style="padding: 20px">
        <a href="{{ route('Admin.SanPham.create') }}" class="btn btn-primary">Thêm sản phẩm</a>
        <form action="{{ route('Admin.SanPham.index') }}" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" style="float: right; display: flex;">
            
            <div class="input-group">
                {{-- <div style="margin: 0; padding: 0; height: 38px" >
                    <a href="" class="bi bi-arrow-up-short" style=""></i>
                    <a href="" class="bi bi-arrow-down-short" style="display: block;"></a>
                </div> --}}
                <select style="width:200px" name="Namesearch" class="form-select " aria-label="Default select example">
                    <option value="tat_ca" selected>Tất cả</option>
                    <option value="ten_san_pham" {{ request()->Namesearch=='ten_san_pham'? 'selected':'' }}>Tên sản phẩm</option>
                    <option value="ma_san_pham" {{ request()->Namesearch=='ma_san_pham'? 'selected':'' }}>Mã sản phẩm</option>
                    <option value="tong_so_luong" {{ request()->Namesearch=='tong_so_luong'? 'selected':'' }}>Tổng số lượng</option>
                    <option value="ten_the_loai" {{ request()->Namesearch=='ten_the_loai'? 'selected':'' }}>Tên thể loại</option>
                    <option value="don_gia_nhap" {{ request()->Namesearch=='don_gia_nhap'? 'selected':'' }}>Đơn giá nhập</option>
                    <option value="don_gia_ban" {{ request()->Namesearch=='don_gia_ban'? 'selected':'' }}>Đơn giá bán</option>
                    <option value="giam_gia" {{ request()->Namesearch=='giam_gia'? 'selected':'' }}>Giảm giá</option>
                </select>
                <input style="width:200px; display: none" type="text" id="Key_SanPham" name="Key_SanPham" value="{{ request()->Key_SanPham }}" class="form-control" 
                placeholder="Tìm kiếm..." aria-label="Search" aria-describedby="basic-addon2">
                
                <select style="width:200px" hidden name="TheLoai" class="form-select " aria-label="Default select example" style="margin-right: 0">
                    <option value="" selected>---</option>
                    @foreach ($Data_TheLoai as $item)
                        <option value="{{ $item->ten_the_loai }}" {{ request()->TheLoai == $item->ten_the_loai? 'selected':'' }}>{{ $item->ten_the_loai }}</option>
                    @endforeach
                </select>
                
                <select style="width:200px" hidden  name="Gia" class="form-select " aria-label="Default select example">
                    <option value="" selected>---</option>
                    @if (request()->Namesearch =='giam_gia' || 
                    request()->Namesearch =='don_gia_nhap'|| 
                    request()->Namesearch =='don_gia_ban' ||
                    request()->Namesearch =='tong_so_luong')
                        @foreach ($ArrGia as $item)
                            <option value="{{ $item }}" {{ request()->Gia == $item? 'selected':""  }}>{{ $item }}</option>
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
                                <a href="{{ route('Admin.SanPham.show', $item->ma_san_pham) }}" class="btn btn-success">
                                    <i class="bi bi-journals"></i>
                                </a>
                                <a href="{{ route('Admin.SanPham.edit', $item->ma_san_pham) }}" class="btn btn-success">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <a href="{{ route('Admin.SanPham.destroy', $item->ma_san_pham) }}" class="btn btn-danger btn_delete_sanpham">
                                    <i class="bi bi-x-square-fill"></i>
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
            <form method="POST" action="" id="from_delete_sanpham">
                @csrf @method('DELETE')
            </form>
        </div>
    </div>
    
@endsection
@section('js')
    
    <script>
        
        function hiden(checkNameSearch)
        {
            document.querySelector("select[name='TheLoai']").setAttribute("hidden", true);
            document.querySelector("select[name='Gia']").setAttribute("hidden", true);
            document.getElementById("Key_SanPham").style.display = "none";
            document.getElementById("btnSubmit").style.display ='none';
            if(checkNameSearch ==='ten_the_loai')
            {
                document.getElementById("Key_SanPham").value ='';
                document.querySelector("select[name='Gia']").value = '';
                
            }
            else if(checkNameSearch ==='ten_san_pham' || checkNameSearch ==='ma_san_pham')
            {
                document.querySelector("select[name='TheLoai']").value = '';
                document.querySelector("select[name='Gia']").value = '';
                document.getElementById("btnSubmit").style.display ='block';
            }
            else if(checkNameSearch ==='don_gia_nhap' || 
            checkNameSearch ==='don_gia_ban'||
            checkNameSearch ==='giam_gia'||
            checkNameSearch ==='tong_so_luong')
            {
                document.getElementById("Key_SanPham").value ='';
                document.querySelector("select[name='TheLoai']").value = '';
            }
            else
            {
                document.getElementById("Key_SanPham").value ='';
                document.querySelector("select[name='TheLoai']").value = '';
                document.querySelector("select[name='Gia']").value = '';
            }
                
        }

        function load()
        {
            if ('{{ request()->Namesearch }}' === 'ten_the_loai') 
            {
                hiden('ten_the_loai');
                document.querySelector("select[name='TheLoai']").removeAttribute("hidden");
            }
            else if('{{ request()->Namesearch }}' === 'ten_san_pham' || '{{ request()->Namesearch }}' === 'ma_san_pham')
            {
                hiden('{{ request()->Namesearch }}');
                document.getElementById("Key_SanPham").style.display = "block";
            }
            else if('{{ request()->Namesearch }}' === 'don_gia_nhap' || 
            '{{ request()->Namesearch }}' === 'don_gia_ban' ||
            '{{ request()->Namesearch }}' === 'giam_gia'||
            '{{ request()->Namesearch }}' === 'tong_so_luong')
            {
                hiden('{{ request()->Namesearch }}');
                document.querySelector("select[name='Gia']").removeAttribute("hidden");
            }
            else
            {
                hiden('{{ request()->Namesearch }}');
            }
        }
        load();


        
        $('.btn_delete_sanpham').click(function(ev){
            ev.preventDefault();// k cho load lại trang
            var _herf = $(this).attr('href'); // lấy link của thẻ a hiện tại đang click vào
            $('#from_delete_sanpham').attr('action', _herf); // gán action của vào form là href của thẻ a vừa click vào
            //$('#from_delete_sanpham').submit();
            Swal.fire({
                title: 'Bạn muốn xóa sản phẩm này không?',
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
                $('#from_delete_sanpham').submit();
            }
            });
        });

        var url = "{{ route('Admin.SanPham.index') }}";
        document.addEventListener("DOMContentLoaded", function() 
        {
            var selectElementNamesearch = document.querySelector("select[name='Namesearch']");
            selectElementNamesearch.addEventListener("change", function() 
            {
                var selectedValueNamesearch = selectElementNamesearch.value;
                // Đặt giá trị Namesearch vào selectedValueNamesearch và tải lại trang
                //window.location.href = "{{ route('Admin.SanPham.index') }}?Namesearch=" + selectedValueNamesearch;
                var removeRequest =[];
                if(selectedValueNamesearch === 'ten_the_loai')
                    removeRequest = ['Key_SanPham', 'Gia']
                else if(selectedValueNamesearch === 'ma_san_pham' || selectedValueNamesearch === 'ten_san_pham')
                    removeRequest = ['TheLoai', 'Gia']
                else if (selectedValueNamesearch === 'tat_ca')
                    removeRequest = ['TheLoai', 'Key_SanPham', 'Gia']
                else
                    removeRequest = ['TheLoai', 'Key_SanPham', 'Gia']
                window.location.href = NewURL({Namesearch:selectedValueNamesearch, page:1}, removeRequest, url);
            });
        });

        document.addEventListener("DOMContentLoaded", function() {
            var selectElementTheLoai = document.querySelector("select[name='TheLoai']");
            
            selectElementTheLoai.addEventListener("change", function() {
                var selectedValueTheLoai = selectElementTheLoai.value;
                //window.location.href = "{{ route('Admin.SanPham.index') }}?Namesearch=" + '{{ request()->Namesearch }}' + "&TheLoai=" + selectedValueTheLoai;
                window.location.href = NewURL({TheLoai:selectedValueTheLoai}, [], url);
                
            });
        });

        document.addEventListener("DOMContentLoaded", function() {
            var selectElementGia = document.querySelector("select[name='Gia']");
            
            selectElementGia.addEventListener("change", function() {
                var selectedValueGia = selectElementGia.value;
                //window.location.href = "{{ route('Admin.SanPham.index') }}?Namesearch=" + '{{ request()->Namesearch }}' + "&Gia=" + selectedValueGia;
                window.location.href = NewURL({Gia:selectedValueGia}, [], url);
            });
        });


        

        
        
    </script>

    @if (session()->has('XoaSanPham_ThanhCong'))
        <script>Swal.fire('Xóa thành công',  '{{ session()->get('XoaSanPham_ThanhCong') }}' ,'success');</script>
    @endif 

    @if (session()->has('XoaSanPham_Error'))
        <script>Swal.fire('Xóa không thành công',  '{{ session()->get('XoaSanPham_Error') }}' ,'error');</script>
    @endif 

    @if (session()->has('SuaSanPham_ThanhCong'))
        <script>Swal.fire('Sửa thành công', '{{ session()->get('SuaSanPham_ThanhCong') }}' ,'success');</script>
    @endif 
    @if (session()->has('ThemSanPham_ThanhCong'))
        <script>Swal.fire('Thêm thành công', '{{ session()->get('ThemSanPham_ThanhCong') }}' ,'success');</script>
    @endif     
@endsection
