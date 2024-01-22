@extends('layout.Admin_NhanVien.Layout')
@section('Title', 'Nhân viên bán hàng')
@section('TitleNav', 'Nhân viên bán hàng')
@section('menu')
    @php
        $Menu = config('Menu_NhanVienBanHang');
    @endphp
@endsection
@section('Admin_Renderbody')

    <form class="row g-3 " style="padding: 50px" method="POST" action="{{url('NhanVien/changePass')}}"
          onsubmit="return validateForm()">
        @csrf
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Mật khẩu cũ</label>
            <input type="password" class="form-control" name='oldPassword' id="oldPass">
        </div>

        <div class="mb-3">
            <label for="newPass" class="form-label">Mật khẩu mới</label>
            <input type="password" class="form-control" name='newPassword' id="newPassword">
        </div>

        <div class="mb-3">
            <label for="confirmPassword" class="form-label">Xác nhận mật khẩu</label>
            <input type="password" class="form-control" name='confirmPassword' id="confirmPassword">
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Đổi mật khẩu</button>
            <a href="" class="btn btn-dark">Quay lại</a>
        </div>
    </form>

@endsection
@section('js')
    @if (session()->has('messageError'))
        {{--        <script>alert('fail')</script>--}}
        <script>Swal.fire('Đổi mật khẩu thất bại', '{{ session()->get('messageError') }}', 'error');</script>
    @endif
    @if (session()->has('message'))
        {{--        <script>alert('123')</script>--}}
        <script>Swal.fire('Đổi mật khẩu thành công', '{{ session()->get('message') }}', 'success');</script>
    @endif
    <script>
        function validateForm() {
            let $oldPassword = $('#oldPassword').val();
            let $newPassword = $('#newPassword').val();
            let $newPasswordConfirm = $('#confirmPassword').val();
            if ($oldPassword === null || $oldPassword === "") {
                Swal.fire('Thất bại', 'Không được để mật khẩu cũ trống', 'error');
                return false;
            }
            if ($newPassword === null || $newPassword === "") {
                Swal.fire('Thất bại', 'Không được để mật khẩu mới trống', 'error');
                return false;
            }
            if ($newPasswordConfirm === null || $newPasswordConfirm === "") {
                Swal.fire('Thất bại', 'Không được để xác nhận mật khẩu trống', 'error');
                return false;
            }
            if ($newPassword !== $newPasswordConfirm) {
                alert($newPassword + '   ' + $newPasswordConfirm);
                Swal.fire('Thất bại', 'Xác nhận mật khẩu không trùng khớp', 'error');
                return false;
            }
            return true;
        }
    </script>
@endsection
