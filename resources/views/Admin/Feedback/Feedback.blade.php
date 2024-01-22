@extends('Layout.Admin_NhanVien.Layout')
@section('Title', 'Feedback')

@section('Admin_Renderbody')
    <div style="padding: 20px">
 
        <form action="" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" style="float: right; display: flex;">
            <div class="input-group">
                <input type="text" name="Key_Feedback" value="{{ request()->Key_Feedback }}" class="form-control bg-light border-0 small" placeholder="Tìm kiếm..."
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
                                    Mã Feeback
                                </div>
                                <div class="col-6" style=" margin: 0; padding:0">
                                    <a   onclick="sort('ma_feedback', 'asc')" class="bi bi-arrow-up-short" style=""></i>
                                    <a   onclick="sort('ma_feedback', 'desc')" class="bi bi-arrow-down-short" style="display: block;"></a>
                                </div>
                            </div>
                        </th>

                        <th>
                            <div class="row">
                                <div class="col-6" style=" margin: 0; padding:0">
                                    Họ tên
                                </div>
                                <div class="col-6" style=" margin: 0; padding:0">
                                    <a   onclick="sort('ho_ten', 'asc')" class="bi bi-arrow-up-short" style=""></i>
                                    <a   onclick="sort('ho_ten', 'desc')" class="bi bi-arrow-down-short" style="display: block;"></a>
                                </div>
                            </div>
                        </th>

                        <th>
                            <div class="row">
                                <div class="col-6" style=" margin: 0; padding:0">
                                    Nội dung
                                </div>
                                <div class="col-6" style=" margin: 0; padding:0">
                                    <a   onclick="sort('noi_dung', 'asc')" class="bi bi-arrow-up-short" style=""></i>
                                    <a   onclick="sort('noi_dung', 'desc')" class="bi bi-arrow-down-short" style="display: block;"></a>
                                </div>
                            </div>
                        </th>

                        <th>
                            <div class="row">
                                <div class="col-6" style=" margin: 0; padding:0">
                                    Email
                                </div>
                                <div class="col-6" style=" margin: 0; padding:0">
                                    <a   onclick="sort('email', 'asc')" class="bi bi-arrow-up-short" style=""></i>
                                    <a   onclick="sort('email', 'desc')" class="bi bi-arrow-down-short" style="display: block;"></a>
                                </div>
                            </div>
                        </th>

                        <th>
                            <div class="row">
                                <div class="col-6" style=" margin: 0; padding:0">
                                    Số điện thoại
                                </div>
                                <div class="col-6" style=" margin: 0; padding:0">
                                    <a   onclick="sort('so_dien_thoai', 'asc')" class="bi bi-arrow-up-short" style=""></i>
                                    <a   onclick="sort('so_dien_thoai', 'desc')" class="bi bi-arrow-down-short" style="display: block;"></a>
                                </div>
                            </div>
                        </th>
              
                    
                        <th class="text-center">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($Data_Feedback as $item)
                        <tr>
                            <td>{{ $item->ma_feedback }}</td>
                            <td>{{ $item->ho_ten}}</td>
                            <td>{{ $item->noi_dung}}</td>
                            <td>{{ $item->email}}</td>
                            <td>{{ $item->so_dien_thoai}}</td>
                            
                            <td class="text-center">
                                {{-- <a href="" class="btn btn-success">
                                    <i class="bi bi-journals"></i>
                                </a> --}}
                                {{-- <a href="{{ route('Admin.Feedback.edit', $item->ma_feedback) }}" class="btn btn-success">
                                    <i class="bi bi-pencil-square"></i>
                                </a> --}}
                                <a href="{{ route('Admin.Feedback.destroy', $item->ma_feedback) }}" class="btn btn-danger btn_delete_Feedback">
                                    <i class="bi bi-x-square-fill"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div>
                {{ $Data_Feedback->appends(request()->all())->links() }} {{-- dữ nguyên tham số trên URL --}}
            </div>
            <form method="POST" action="" id="from_delete_Feedback">
                @csrf @method('DELETE')
            </form>
        </div>
    </div>
@endsection
@section('js')
    <script>
        var url = "{{ route('Admin.Feedback.index') }}";
  
        $('.btn_delete_Feedback').click(function(ev){
            ev.preventDefault();// k cho load lại trang
            var _herf = $(this).attr('href'); // lấy link của thẻ a hiện tại đang click vào
            $('#from_delete_Feedback').attr('action', _herf); // gán action của vào form là href của thẻ a vừa click vào
            
            Swal.fire({
                title: 'Bạn muốn xóa Feedback này không?',
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
                $('#from_delete_Feedback').submit();
            }
            });
        });
    </script>
    @if (session()->has('XoaFeedback_ThanhCong'))
        <script>Swal.fire('Xóa thành công',  '{{ session()->get('XoaFeedback_ThanhCong') }}' ,'success');</script>
    @endif 
@endsection