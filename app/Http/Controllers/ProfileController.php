<?php

namespace App\Http\Controllers;

use App\Models\HoaDonBan;
use App\Models\KhachHang;
use App\Models\NhanVien;
use App\Models\TaiKhoan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function show()
    {
        if (session('loggedInUser.ten_loai_tai_khoan') == "Khách hàng") {
            $profile = KhachHang::where('tai_khoan', session('loggedInUser.tai_khoan'))->first();
            //Làm hóa đơn ở đây

            //Hóa đơn chờ xác nhận
            $hoadonchoxacnhan = DB::table('chi_tiet_hoa_don_bans')
                ->select('hoa_don_bans.ma_hoa_don_ban', 'hoa_don_bans.ngay_tao_hoa_don', 'tong_tien_hdb', 'trang_thai_thanh_toan', 'tinh_trang_hoa_don', 'khach_hangs.ten_khach_hang', 'dia_chi_giao_hang', 'so_dien_thoai_nguoi_nhan', 'khach_hangs.email')
                ->join('hoa_don_bans', 'chi_tiet_hoa_don_bans.ma_hoa_don_ban', '=', 'hoa_don_bans.ma_hoa_don_ban')
                ->join('chi_tiet_san_phams', 'chi_tiet_hoa_don_bans.ma_chi_tiet_san_pham', '=', 'chi_tiet_san_phams.ma_chi_tiet_san_pham')
                ->join('san_phams', 'chi_tiet_san_phams.ma_san_pham', '=', 'san_phams.ma_san_pham')
                ->join('khach_hangs', 'hoa_don_bans.ma_khach_hang', '=', 'khach_hangs.ma_khach_hang')
                ->where('hoa_don_bans.tinh_trang_hoa_don', '=', 'Chờ xác nhận')
                ->where('hoa_don_bans.ma_khach_hang', '=', session()->get('userInfo')->ma_khach_hang)
                ->groupBy('hoa_don_bans.ma_hoa_don_ban', 'hoa_don_bans.ngay_tao_hoa_don', 'tong_tien_hdb', 'trang_thai_thanh_toan', 'tinh_trang_hoa_don', 'khach_hangs.ten_khach_hang', 'dia_chi_giao_hang', 'so_dien_thoai_nguoi_nhan', 'khach_hangs.email')
                ->get();

            //Hóa đơn đang giao
            $hoadondanggiao = DB::table('chi_tiet_hoa_don_bans')
                ->select('hoa_don_bans.ma_hoa_don_ban', 'hoa_don_bans.ngay_tao_hoa_don', 'tong_tien_hdb', 'trang_thai_thanh_toan', 'tinh_trang_hoa_don', 'khach_hangs.ten_khach_hang', 'dia_chi_giao_hang', 'so_dien_thoai_nguoi_nhan', 'khach_hangs.email')
                ->join('hoa_don_bans', 'chi_tiet_hoa_don_bans.ma_hoa_don_ban', '=', 'hoa_don_bans.ma_hoa_don_ban')
                ->join('chi_tiet_san_phams', 'chi_tiet_hoa_don_bans.ma_chi_tiet_san_pham', '=', 'chi_tiet_san_phams.ma_chi_tiet_san_pham')
                ->join('san_phams', 'chi_tiet_san_phams.ma_san_pham', '=', 'san_phams.ma_san_pham')
                ->join('khach_hangs', 'hoa_don_bans.ma_khach_hang', '=', 'khach_hangs.ma_khach_hang')
                ->where('hoa_don_bans.tinh_trang_hoa_don', '=', 'Đang giao')
                ->where('hoa_don_bans.ma_khach_hang', '=', session()->get('userInfo')->ma_khach_hang)
                ->groupBy('hoa_don_bans.ma_hoa_don_ban', 'hoa_don_bans.ngay_tao_hoa_don', 'tong_tien_hdb', 'trang_thai_thanh_toan', 'tinh_trang_hoa_don', 'khach_hangs.ten_khach_hang', 'dia_chi_giao_hang', 'so_dien_thoai_nguoi_nhan', 'khach_hangs.email')
                ->get();

            //Hóa đơn đã hủy
            $hoadondahuy = DB::table('chi_tiet_hoa_don_bans')
                ->select('hoa_don_bans.ma_hoa_don_ban', 'hoa_don_bans.ngay_tao_hoa_don', 'tong_tien_hdb', 'trang_thai_thanh_toan', 'tinh_trang_hoa_don', 'khach_hangs.ten_khach_hang', 'dia_chi_giao_hang', 'so_dien_thoai_nguoi_nhan', 'khach_hangs.email')
                ->join('hoa_don_bans', 'chi_tiet_hoa_don_bans.ma_hoa_don_ban', '=', 'hoa_don_bans.ma_hoa_don_ban')
                ->join('chi_tiet_san_phams', 'chi_tiet_hoa_don_bans.ma_chi_tiet_san_pham', '=', 'chi_tiet_san_phams.ma_chi_tiet_san_pham')
                ->join('san_phams', 'chi_tiet_san_phams.ma_san_pham', '=', 'san_phams.ma_san_pham')
                ->join('khach_hangs', 'hoa_don_bans.ma_khach_hang', '=', 'khach_hangs.ma_khach_hang')
                ->where('hoa_don_bans.tinh_trang_hoa_don', '=', 'Đã hủy')
                ->where('hoa_don_bans.ma_khach_hang', '=', session()->get('userInfo')->ma_khach_hang)
                ->groupBy('hoa_don_bans.ma_hoa_don_ban', 'hoa_don_bans.ngay_tao_hoa_don', 'tong_tien_hdb', 'trang_thai_thanh_toan', 'tinh_trang_hoa_don', 'khach_hangs.ten_khach_hang', 'dia_chi_giao_hang', 'so_dien_thoai_nguoi_nhan', 'khach_hangs.email')
                ->get();

            //Lịch sử đơn hàng
            $lichsudonhang = DB::table('chi_tiet_hoa_don_bans')
                ->select('hoa_don_bans.ma_hoa_don_ban', 'hoa_don_bans.ngay_tao_hoa_don', 'tong_tien_hdb', 'trang_thai_thanh_toan', 'tinh_trang_hoa_don', 'khach_hangs.ten_khach_hang', 'dia_chi_giao_hang', 'so_dien_thoai_nguoi_nhan', 'khach_hangs.email')
                ->join('hoa_don_bans', 'chi_tiet_hoa_don_bans.ma_hoa_don_ban', '=', 'hoa_don_bans.ma_hoa_don_ban')
                ->join('chi_tiet_san_phams', 'chi_tiet_hoa_don_bans.ma_chi_tiet_san_pham', '=', 'chi_tiet_san_phams.ma_chi_tiet_san_pham')
                ->join('san_phams', 'chi_tiet_san_phams.ma_san_pham', '=', 'san_phams.ma_san_pham')
                ->join('khach_hangs', 'hoa_don_bans.ma_khach_hang', '=', 'khach_hangs.ma_khach_hang')
                ->where('hoa_don_bans.tinh_trang_hoa_don', '=', 'Đã hoàn thành')
                ->where('hoa_don_bans.ma_khach_hang', '=', session()->get('userInfo')->ma_khach_hang)
                ->groupBy('hoa_don_bans.ma_hoa_don_ban', 'hoa_don_bans.ngay_tao_hoa_don', 'tong_tien_hdb', 'trang_thai_thanh_toan', 'tinh_trang_hoa_don', 'khach_hangs.ten_khach_hang', 'dia_chi_giao_hang', 'so_dien_thoai_nguoi_nhan', 'khach_hangs.email')
                ->get();

            // $allsession = session()->all();
            // dd(session()->get('userInfo')->ma_khach_hang);
            return view('profile', ['profile' => $profile], compact('hoadonchoxacnhan', 'hoadondanggiao', 'hoadondahuy', 'lichsudonhang'));
        } else {
            $profile = NhanVien::where('tai_khoan', session('loggedInUser.tai_khoan'))->first();
            return view('profile', ['profile' => $profile]);
        }
    }

    public function updateProfile(Request $request)
    {
        if (session('loggedInUser.ten_loai_tai_khoan') == "Khách hàng") {
            $validator = Validator::make($request->all(), [
                'profile_name' => 'required|max:50',
                'profile_date' => 'required|date',
                'profile_address' => 'required|max:100',
                'profile_phone' => 'required|numeric|digits_between:10,11',
                'profile_gender' => 'required',
            ], [
                'profile_name.required' => 'Bạn phải nhập họ tên',
                'profile_date.required' => 'Bạn phải nhập ngày sinh',
                'profile_date.date' => 'Bạn phải nhập ngày sinh đúng định dạng',
                'profile_address.required' => 'Bạn phải nhập địa chỉ',
                'profile_phone.required' => 'Bạn phải nhập số điện thoại',
                'profile_phone.numeric' => 'Bạn phải nhập số điện thoại đúng định dạng',
                'profile_phone.digits_between' => 'Bạn phải nhập số điện thoại đúng định dạng',
                'profile_gender.required' => 'Hãy chọn giới tính',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => 400,
                    'messages' => $validator->getMessageBag(),
                ]);
            }

            if ($request->hasFile('profile_picture')) {
                $validatorImage = Validator::make($request->all(), [
                    'profile_picture' => 'mimes:jpeg,png,jpg,gif,svg|max:4096',
                ], [
                    'profile_picture.mimes' => 'Bạn phải chọn file ảnh đúng định dạng',
                    'profile_picture.max' => 'Bạn phải chọn file ảnh có dung lượng nhỏ hơn 4MB',
                ]);

                if ($validatorImage->fails()) {
                    return response()->json([
                        'status' => 400,
                        'messages' => $validatorImage->getMessageBag(),
                    ]);
                }

                $oldProfilePicture = KhachHang::where('ma_khach_hang', $request->id)->first()->anh_dai_dien;
                if ($oldProfilePicture) {
                    unlink(public_path($oldProfilePicture));
                }

                $profilePicture = $request->file('profile_picture');
                $filename = $request->id . '_' . $profilePicture->getClientOriginalName();
                $path = 'assets/img/users/' . $filename;
                $profilePicture->move(public_path('assets/img/users'), $filename);

                $updateUserInfo = KhachHang::where('ma_khach_hang', $request->id)->update([
                    'ten_khach_hang' => $request->profile_name,
                    'ngay_sinh' => $request->profile_date,
                    'dia_chi' => $request->profile_address,
                    'dien_thoai' => $request->profile_phone,
                    'gioi_tinh' => $request->profile_gender,
                    'anh_dai_dien' => $path,
                ]);
            } else {
                $updateUserInfo = KhachHang::where('ma_khach_hang', $request->id)->update([
                    'ten_khach_hang' => $request->profile_name,
                    'ngay_sinh' => $request->profile_date,
                    'dia_chi' => $request->profile_address,
                    'dien_thoai' => $request->profile_phone,
                    'gioi_tinh' => $request->profile_gender,
                ]);
            }

            if ($updateUserInfo) {
                $userInformation = KhachHang::where('ma_khach_hang', $request->id)->first();
                session()->pull('userInfo');
                session()->put('userInfo', $userInformation);
                return response()->json([
                    'status' => 200,
                    'messages' => 'Cập nhật thông tin thành công',
                ]);
            } else {
                return response()->json([
                    'status' => 400,
                    'messages' => [
                        'request_error' => [
                            0 => 'Có lỗi xảy ra, cập nhật thất bại',
                        ],
                    ],
                ]);
            }
        } else {
            $validator = Validator::make($request->all(), [
                'profile_name' => 'required|max:50',
                'profile_date' => 'required|date',
                'profile_address' => 'required|max:100',
                'profile_phone' => 'required|numeric|digits_between:10,11',
                'profile_gender' => 'required',
            ], [
                'profile_name.required' => 'Bạn phải nhập họ tên',
                'profile_date.required' => 'Bạn phải nhập ngày sinh',
                'profile_date.date' => 'Bạn phải nhập ngày sinh đúng định dạng',
                'profile_address.required' => 'Bạn phải nhập địa chỉ',
                'profile_phone.required' => 'Bạn phải nhập số điện thoại',
                'profile_phone.numeric' => 'Bạn phải nhập số điện thoại đúng định dạng',
                'profile_phone.digits_between' => 'Bạn phải nhập số điện thoại đúng định dạng',
                'profile_gender.required' => 'Hãy chọn giới tính',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => 400,
                    'messages' => $validator->getMessageBag(),
                ]);
            }

            if ($request->hasFile('profile_picture')) {
                $validatorImage = Validator::make($request->all(), [
                    'profile_picture' => 'mimes:jpeg,png,jpg,gif,svg|max:4096',
                ], [
                    'profile_picture.mimes' => 'Bạn phải chọn file ảnh đúng định dạng',
                    'profile_picture.max' => 'Bạn phải chọn file ảnh có dung lượng nhỏ hơn 4MB',
                ]);

                if ($validatorImage->fails()) {
                    return response()->json([
                        'status' => 400,
                        'messages' => $validatorImage->getMessageBag(),
                    ]);
                }

                $oldProfilePicture = NhanVien::where('ma_nhan_vien', $request->id)->first()->anh_dai_dien;
                if ($oldProfilePicture) {
                    unlink(public_path($oldProfilePicture));
                }

                $profilePicture = $request->file('profile_picture');
                $filename = $request->id . '_' . $profilePicture->getClientOriginalName();
                $path = 'assets/img/users/' . $filename;
                $profilePicture->move(public_path('assets/img/users'), $filename);

                $updateUserInfo = NhanVien::where('ma_nhan_vien', $request->id)->update([
                    'ten_nhan_vien' => $request->profile_name,
                    'ngay_sinh' => $request->profile_date,
                    'dia_chi' => $request->profile_address,
                    'dien_thoai' => $request->profile_phone,
                    'gioi_tinh' => $request->profile_gender,
                    'anh_dai_dien' => $path,
                ]);
            } else {
                $updateUserInfo = NhanVien::where('ma_nhan_vien', $request->id)->update([
                    'ten_nhan_vien' => $request->profile_name,
                    'ngay_sinh' => $request->profile_date,
                    'dia_chi' => $request->profile_address,
                    'dien_thoai' => $request->profile_phone,
                    'gioi_tinh' => $request->profile_gender,
                ]);
            }

            if ($updateUserInfo) {
                $userInformation = NhanVien::where('ma_nhan_vien', $request->id)->first();
                session()->pull('userInfo');
                session()->put('userInfo', $userInformation);
                return response()->json([
                    'status' => 200,
                    'messages' => 'Cập nhật thông tin thành công',
                ]);
            } else {
                return response()->json([
                    'status' => 400,
                    'messages' => [
                        'request_error' => [
                            0 => 'Có lỗi xảy ra, cập nhật thất bại',
                        ],
                    ],
                ]);
            }
        }
    }

    public function changePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'old_pass' => 'required',
            'new_pass' => 'required|min:6',
            'con_new_pass' => 'required|same:new_pass',
        ], [
            'old_pass.required' => 'Bạn phải nhập mật khẩu cũ',
            'new_pass.required' => 'Bạn phải nhập mật khẩu mới',
            'new_pass.min' => 'Mật khẩu mới phải có ít nhất 6 ký tự',
            'con_new_pass.required' => 'Bạn phải nhập lại mật khẩu mới',
            'con_new_pass.same' => 'Mật khẩu nhập lại không khớp',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'messages' => $validator->getMessageBag(),
            ]);
        }

        $userPassword = TaiKhoan::where('tai_khoan', session('userInfo.tai_khoan'))->first()->mat_khau;

        if (!Hash::check($request->old_pass, $userPassword)) {
            return response()->json([
                'status' => 400,
                'messages' => [
                    'old_password' => [
                        0 => 'Mật khẩu cũ không đúng',
                    ],
                ],
            ]);
        } else {
            $updatePassword = TaiKhoan::where('tai_khoan', session('userInfo.tai_khoan'))->update([
                'mat_khau' => Hash::make($request->new_pass),
            ]);

            if ($updatePassword) {
                $user = TaiKhoan::select('tai_khoans.*', 'loai_tai_khoans.ten_loai_tai_khoan')
                    ->join('loai_tai_khoans', 'tai_khoans.ma_loai_tai_khoan', '=', 'loai_tai_khoans.ma_loai_tai_khoan')
                    ->where('tai_khoans.tai_khoan', session('userInfo.tai_khoan'))
                    ->first();

                session()->forget('loggedInUser');
                session()->put('loggedInUser', $user);

                return response()->json([
                    'status' => 200,
                    'messages' => 'Cập nhật mật khẩu thành công',
                ]);
            } else {
                return response()->json([
                    'status' => 400,
                    'messages' => [
                        'request_error' => [
                            0 => 'Có lỗi xảy ra, cập nhật thất bại',
                        ],
                    ],
                ]);
            }
        }
    }

    public function changePasswordThirdParty(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'new_pass' => 'required|min:6',
            'con_new_pass' => 'required|same:new_pass',
        ], [
            'new_pass.required' => 'Bạn phải nhập mật khẩu mới',
            'new_pass.min' => 'Mật khẩu mới phải có ít nhất 6 ký tự',
            'con_new_pass.required' => 'Bạn phải nhập lại mật khẩu mới',
            'con_new_pass.same' => 'Mật khẩu nhập lại không khớp',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'messages' => $validator->getMessageBag(),
            ]);
        }

        $updatePassword = TaiKhoan::where('tai_khoan', session('userInfo.tai_khoan'))->update([
            'mat_khau' => Hash::make($request->new_pass),
        ]);

        if ($updatePassword) {
            $user = TaiKhoan::select('tai_khoans.*', 'loai_tai_khoans.ten_loai_tai_khoan')
                ->join('loai_tai_khoans', 'tai_khoans.ma_loai_tai_khoan', '=', 'loai_tai_khoans.ma_loai_tai_khoan')
                ->where('tai_khoans.tai_khoan', session('userInfo.tai_khoan'))
                ->first();

            session()->forget('loggedInUser');
            session()->put('loggedInUser', $user);

            return response()->json([
                'status' => 200,
                'messages' => 'Cập nhật mật khẩu thành công',
            ]);
        } else {
            return response()->json([
                'status' => 400,
                'messages' => [
                    'request_error' => [
                        0 => 'Có lỗi xảy ra, cập nhật thất bại',
                    ],
                ],
            ]);
        }
    }


    public function showmodal2(Request $request)
    {
        $maHoaDon = $request->input('maHoaDon');
        $tinhtrang = $request->input('tinhTrang');
        $invoiceDetails = DB::table('hoa_don_bans')
            ->join('chi_tiet_hoa_don_bans', 'hoa_don_bans.ma_hoa_don_ban', '=', 'chi_tiet_hoa_don_bans.ma_hoa_don_ban')
            ->join('chi_tiet_san_phams', 'chi_tiet_hoa_don_bans.ma_chi_tiet_san_pham', '=', 'chi_tiet_san_phams.ma_chi_tiet_san_pham')
            ->join('san_phams', 'chi_tiet_san_phams.ma_san_pham', '=', 'san_phams.ma_san_pham')
            ->join('sizes', 'chi_tiet_san_phams.ma_size', '=', 'sizes.ma_size')
            ->join('mau_sacs', 'chi_tiet_san_phams.ma_mau', '=', 'mau_sacs.ma_mau')
            ->select(
                'hoa_don_bans.ngay_tao_hoa_don',
                'san_phams.ten_san_pham',
                'san_phams.anh_dai_dien',
                'sizes.size',
                'mau_sacs.mau',
                DB::raw('(chi_tiet_hoa_don_bans.thanh_tien / chi_tiet_hoa_don_bans.so_luong_ban) as giaban'),
                'chi_tiet_hoa_don_bans.so_luong_ban',
                'chi_tiet_hoa_don_bans.thanh_tien',
                'hoa_don_bans.tong_tien_hdb'
            )
            ->where('tinh_trang_hoa_don', $tinhtrang)
            ->where('hoa_don_bans.ma_hoa_don_ban', $maHoaDon)
            ->get();



        // Kiểm tra xem collection có dữ liệu hay không
        if ($invoiceDetails->isEmpty()) {
            // Trả về JSON thông báo nếu không tìm thấy hóa đơn
            return response()->json(['error' => 'Invoice not found'], 404);
        }

        // Trả về dữ liệu hóa đơn dưới dạng JSON
        return response()->json($invoiceDetails);
    }
}
