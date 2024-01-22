@extends('Layout.Admin_NhanVien.Layout')
@section('Title', 'Size')

@section('Admin_Renderbody')
    <div style="padding: 20px">
        <a href="{{ route('Admin.Size.create') }}" class="btn btn-primary">Thêm size</a>
        <form action="" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" style="float: right; display: flex;">
            <div class="input-group">
                <input type="text" name="Key_Size" value="{{ request()->Key_Size }}" class="form-control bg-light border-0 small" placeholder="Tìm kiếm..."
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
                                    Mã size
                                </div>
                                <div class="col-6" style=" margin: 0; padding:0">
                                    <a   onclick="sort('ma_size', 'asc')" class="bi bi-arrow-up-short" style=""></i>
                                    <a   onclick="sort('ma_size', 'desc')" class="bi bi-arrow-down-short" style="display: block;"></a>
                                </div>
                            </div>
                        </th>
                        
                        <th>
                            <div class="row">
                                <div class="col-6" style=" margin: 0; padding:0">
                                    Tên size
                                </div>
                                <div class="col-6" style=" margin: 0; padding:0">
                                    <a   onclick="sort('size', 'asc')" class="bi bi-arrow-up-short" style=""></i>
                                    <a   onclick="sort('size', 'desc')" class="bi bi-arrow-down-short" style="display: block;"></a>
                                </div>
                            </div>
                        </th>

                        
                        <th class="text-center">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($Data_Size as $item)
                        <tr>
                            <td>{{ $item->ma_size }}</td>
                            <td>{{ $item->size}}</td>

                            
                            <td class="text-center">
                                {{-- <a href="" class="btn btn-success">
                                    <i class="bi bi-journals"></i>
                                </a> --}}
                                <a href="{{ route('Admin.Size.edit', $item->ma_size) }}" class="btn btn-success">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <a href="{{ route('Admin.Size.destroy', $item->ma_size) }}" class="btn btn-danger btn_delete_size">
                                    <i class="bi bi-x-square-fill"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div>
                {{ $Data_Size->appends(request()->all())->links() }} {{-- dữ nguyên tham số trên URL --}}
            </div>
            <form method="POST" action="" id="from_delete_size">
                @csrf @method('DELETE')
            </form>
        </div>
    </div>
@endsection
@section('js')
    <script>
        var url = "{{ route('Admin.Size.index') }}";
        $('.btn_delete_size').click(function(ev){
            ev.preventDefault();// k cho load lại trang
            var _herf = $(this).attr('href'); // lấy link của thẻ a hiện tại đang click vào
            $('#from_delete_size').attr('action', _herf); // gán action của vào form là href của thẻ a vừa click vào
            
            Swal.fire({
                title: 'Bạn muốn xóa thể loại này không?',
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
                $('#from_delete_size').submit();
            }
            });
        });
    </script>
    @if (session()->has('XoaSize_ThanhCong'))
        <script>Swal.fire('Xóa thành công',  '{{ session()->get('XoaSize_ThanhCong') }}' ,'success');</script>
    @endif 

    @if (session()->has('XoaSize_Error'))
        <script>Swal.fire('Xóa thành công',  '{{ session()->get('XoaSize_Error') }}' ,'error');</script>
    @endif 

    @if (session()->has('SuaSize_ThanhCong'))
        <script>Swal.fire('Sửa thành công', '{{ session()->get('SuaSize_ThanhCong') }}' ,'success');</script>
    @endif 
    @if (session()->has('ThemSize_ThanhCong'))
        <script>Swal.fire('Thêm thành công', '{{ session()->get('ThemSize_ThanhCong') }}' ,'success');</script>
    @endif

    @if (session()->has('ThemSize_Error'))
        <script>Swal.fire('Thêm thành công', '{{ session()->get('ThemSize_Error') }}' ,'error');</script>
    @endif
@endsection
