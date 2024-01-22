@extends('Layout.Admin_NhanVien.Layout')
@section('Title', 'Màu sắc')

@section('Admin_Renderbody')
    <div style="padding: 20px">
        <a href="{{ route('Admin.MauSac.create') }}" class="btn btn-primary">Thêm màu sắc</a>
        <form action="" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" style="float: right; display: flex;">
            <div class="input-group">
                <input type="text" name="Key_MauSac" value="" class="form-control bg-light border-0 small" placeholder="Tìm kiếm..."
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
                                Mã màu
                            </div>
                        </div>
                    </th>

                    <th>
                        <div class="row">
                            <div class="col-6" style=" margin: 0; padding:0">
                                Tên màu
                            </div>
                        </div>
                    </th>
                    <th>
                        <div class="row">
                            <div class="col-6" style=" margin: 0; padding:0">
                                Màu
                            </div>
                        </div>
                    </th>
                    <th class="text-center">Hành động</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($colors as $color)
                    <tr>
                        <td>{{ $color->ma_mau }}</td>
                        <td>{{ $color->mau}}</td>
                        <td><div style="background-color: #{{$color->ma_mau}}; width: 30px; height: 30px;"></div></td>

                        <td class="text-center">
                            <a href="{{ route('Admin.MauSac.edit', $color->ma_mau) }}" class="btn btn-success">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <a href="{{ route('Admin.MauSac.destroy', $color->ma_mau) }}" class="btn btn-danger btn_delete_mausac">
                                <i class="bi bi-x-square-fill"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div>
                {{ $colors->appends(request()->all())->links() }}
            </div>
            <form method="POST" action="" id="from_delete_MauSac">
                @csrf @method('DELETE')
            </form>
        </div>
    </div>
@endsection
@section('js')
    <script>
        var url = "{{ route('Admin.MauSac.index') }}";
        $('.btn_delete_mausac').click(function(ev){
            ev.preventDefault();// k cho load lại trang
            var _herf = $(this).attr('href'); // lấy link của thẻ a hiện tại đang click vào
            $('#from_delete_MauSac').attr('action', _herf); // gán action của vào form là href của thẻ a vừa click vào

            Swal.fire({
                title: 'Bạn muốn xóa màu này không?',
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
                    $('#from_delete_MauSac').submit();
                }
            });
        });
    </script>
    @if (session()->has('message'))
        <script>Swal.fire('Thành công',  '{{ session()->get('message') }}' ,'success');</script>
    @endif
    @if (session()->has('errorColor'))
        <script>Swal.fire('Lỗi',  '{{ session()->get('errorColor') }}' ,'error');</script>
    @endif
@endsection
