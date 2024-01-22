<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;
use App\Mail\ForgotPassword;
use Illuminate\Http\Request;
use App\Models\TaiKhoan;
use App\Models\KhachHang;
use App\Models\NhanVien;
use App\Mail\VerifyEmail;
use App\Models\ResetMatKhau;
use App\Models\XacThucEmail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Laravel\Socialite\Facades\Socialite;


class AccountController extends Controller
{
    public function register()
    {
        return view('authentication.register');
    }

    public function login()
    {
        return view('authentication.login');
    }

    public function forgot()
    {
        return view('authentication.forgot');
    }

    public function reset()
    {
        $token = session('resetToken');
        $email = ResetMatKhau::where('token', $token)->first();
        if ($email) {
            if ($email->created_at < Carbon::now()->subMinutes(5)) {
                return view('authentication.expired');
            }
            return view('authentication.reset', ['token' => session('resetToken'), 'email' => $email->email]);
        }
        return view('authentication.expired');
    }

    public function verify()
    {
        $token = session('verifyEmailToken');
        session()->flush();
        $email = XacThucEmail::where('token', $token)->first();
        if ($email) {
            if ($email->created_at < Carbon::now()->subMinutes(5)) {
                return view('authentication.expired');
            }
            TaiKhoan::where('tai_khoan', $email->email)->update([
                'verified' => true,
            ]);
            XacThucEmail::where('email', $email->email)->delete();
            return view('authentication.verified', ['token' => $token, 'email' => $email->email]);
        }
        return view('authentication.expired');
    }

    public function logout()
    {
        if (session()->has('loggedInUser')) {
            session()->flush();
            return redirect()->route('homepage');
        } else {
            return redirect()->route('homepage');
        }
    }

    public function postLogin(Request $request)
    {
        $validatorEmail = Validator::make($request->all(), [
            'email' => 'required|email|max:255',
        ]);

        $validatorPassword = Validator::make($request->all(), [
            'password' => 'required|min:6|max:50',
        ]);

        if ($validatorEmail->fails()) {
            return response()->json([
                'status' => 400,
                'messages' => "Hãy nhập email hợp lệ"
            ]);
        }
        if ($validatorPassword->fails()) {
            return response()->json([
                'status' => 400,
                'messages' => "Hãy nhập mật khẩu hợp lệ"
            ]);
        }
        if (!$validatorEmail->fails() && !$validatorPassword->fails()) {
            $user = TaiKhoan::select('tai_khoans.*', 'loai_tai_khoans.ten_loai_tai_khoan')
                ->join('loai_tai_khoans', 'tai_khoans.ma_loai_tai_khoan', '=', 'loai_tai_khoans.ma_loai_tai_khoan')
                ->where('tai_khoans.tai_khoan', $request->email)
                ->first();

            if (!$user) {
                return response()->json([
                    'status' => 404,
                    'messages' => "Email không tồn tại trong hệ thống",
                ]);
            }

            if (!Hash::check($request->password, $user->mat_khau)) {
                return response()->json([
                    'status' => 401,
                    'messages' => "Mật khẩu không đúng",
                ]);
            }

            if (!$user->verified) {
                return response()->json([
                    'status' => 403,
                    'messages' => "Tài khoản chưa được xác thực, bạn cần xác thực để có thể đăng nhập",
                ]);
            }

            $accountType = $user->ten_loai_tai_khoan;

            if ($accountType == "Admin" || $accountType == "Nhân viên bán hàng" || $accountType == "Nhân viên kho") {
                $userInformation = NhanVien::where('tai_khoan', $user->tai_khoan)->first();
            }
            if ($accountType == "Khách hàng") {
                $userInformation = KhachHang::where('tai_khoan', $user->tai_khoan)->first();
            }


            if ($userInformation) {
                $request->session()->put('loggedInUser', $user);

                $request->session()->put('userInfo', $userInformation);

                return response()->json([
                    'status' => 200,
                    'accountType' => $accountType,
                    'messages' => "Đăng nhập thành công",
                ]);
            }

            return response()->json([
                'status' => 401,
                'messages' => "Không thể truy cập thông tin người dùng",
            ]);
        }
    }

    public function postForgot(Request $request)
    {
        $validatorEmail = Validator::make($request->all(), [
            'email' => 'required|email|max:255',
        ]);

        if ($validatorEmail->fails()) {
            return response()->json([
                'status' => 400,
                'messages' => "Hãy nhập email hợp lệ"
            ]);
        } else {
            $user = TaiKhoan::where('tai_khoan', $request->email)->first();
            if (!$user) {
                return response()->json([
                    'status' => 404,
                    'messages' => "Email không tồn tại trong hệ thống",
                ]);
            } else {
                $token = Str::random(64);
                session()->put("resetToken", $token);
                ResetMatKhau::create([
                    'email' => $request->email,
                    'token' => $token,
                ]);

                $details = [
                    'body' => route('resetPage', ['token' => $token]),
                ];

                Mail::to($request->email)->send(new ForgotPassword($details));

                return response()->json([
                    'status' => 200,
                    'messages' => "Chúng tôi đã gửi một Email cho bạn, vui lòng kiểm tra để đặt lại mật khẩu (Hãy kiểm tra cả hòm thư Spam)",
                ]);
            }
        }
    }

    public function postReset(Request $request)
    {
        $validatorPassword = Validator::make($request->all(), [
            'password' => 'required|min:6|max:50',
        ]);

        $validatorRepeatPassword = Validator::make($request->all(), [
            'repeat_password' => 'required|same:password',
        ]);

        if ($validatorPassword->fails()) {
            return response()->json([
                'status' => 400,
                'messages' => "Hãy nhập mật khẩu hợp lệ"
            ]);
        }

        if ($validatorRepeatPassword->fails()) {
            return response()->json([
                'status' => 400,
                'messages' => "Mật khẩu nhập lại không khớp"
            ]);
        }

        if (!$validatorRepeatPassword->fails() && !$validatorRepeatPassword->fails()) {
            $token = session()->get('resetToken');
            $updatePassword = ResetMatKhau::where('token', $token)->first();
            if (!$updatePassword) {
                return response()->json([
                    'status' => 404,
                    'messages' => "Token không tồn tại trong hệ thống",
                ]);
            }
            $updateAccount = TaiKhoan::where('tai_khoan', $updatePassword->email)->update([
                'mat_khau' => Hash::make($request->password),
            ]);
            $deleteToken = ResetMatKhau::where('email', $updatePassword->email)->delete();
            if ($updateAccount && $deleteToken) {
                session()->flush();
                return response()->json([
                    'status' => 200,
                    'messages' => "Đặt lại mật khẩu thành công",
                ]);
            } else {
                return response()->json([
                    'status' => 500,
                    'messages' => "Đặt lại mật khẩu thất bại",
                ]);
            }
        }
    }

    public function postRegister(Request $request)
    {
        // Tìm khách hàng có mã lớn nhất
        $latestCustomer = KhachHang::select('ma_khach_hang')->latest()->first();

        if ($latestCustomer) {
            // Lấy mã khách hàng hiện tại
            $currentCode = $latestCustomer->ma_khach_hang;

            // Tạo mã khách hàng mới
            $matches = [];
            preg_match('/KH(\d+)/', $currentCode, $matches);
            if (count($matches) > 0) {
                $nextNumber = (int)$matches[1] + 1;
                $nextCustomerCode = 'KH' . str_pad($nextNumber, 2, '0', STR_PAD_LEFT);
            }
        } else {
            // Nếu không có khách hàng nào trong cơ sở dữ liệu, tạo mã đầu tiên.
            $nextCustomerCode = 'KH01';
        }


        $validator = Validator::make($request->all(), [
            'name' => 'required|max:50',
            'email' => 'required|email|max:100',
            'password' => 'required|min:6|max:50',
            'cpassword' => 'required|min:6|same:password'
        ], [
            'name.required' => 'Bạn phải nhập họ tên',
            'email.required' => 'Bạn phải nhập Email',
            'email.email' => 'Email sai định dạng',
            //'email.unique' => 'Email đã tồn tại',
            'password.required' => 'Mật khẩu bắt buộc nhập',
            'password.min' => 'Mật khẩu ít nhất 6 ký tự',
            'password.max' => 'Mật khẩu không quá 50 ký tự',
            'cpassword.required' => 'Xác thực mật khẩu bắt buộc nhập',
            'cpassword.same' => 'Mật khẩu không trùng khớp',
        ]);

        $userExistedCheck = TaiKhoan::where('tai_khoan', $request->email)->first();

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'messages' => $validator->getMessageBag()
            ]);
        } else if ($userExistedCheck) {
            return response()->json([
                'status' => 500,
                'messages' => 'Email đã tồn tại trong hệ thống',
            ]);
        } else {
            $taikhoan = new TaiKhoan();
            $taikhoan->tai_khoan = $request->email;
            $taikhoan->mat_khau = Hash::make($request->password);
            $taikhoan->ma_loai_tai_khoan = 'LTK04';
            $taikhoan->verified = false;
            $taikhoan->save();

            $user = new KhachHang();
            $user->ma_khach_hang = $nextCustomerCode;
            $user->ten_khach_hang = $request->name;
            $user->email = $request->email;
            $user->tai_khoan = $request->email;
            $user->save();

            $token = Str::random(64);
            session()->put("verifyEmailToken", $token);
            XacThucEmail::create([
                'email' => $request->email,
                'token' => $token,
            ]);

            $details = [
                'body' => route('verifiedPage', ['token' => $token]),
            ];

            Mail::to($request->email)->send(new VerifyEmail($details));

            return response()->json([
                'status' => 200,
                'messages' => "Chúng tôi đã gửi một Email cho bạn, vui lòng kiểm tra Email để hoàn tất quá trình đăng ký (Hãy kiểm tra cả hòm thư Spam)",
            ]);
        }
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
    public function handleGoogleCallback()
    {
        try {
            $user = Socialite::driver('google')->user();
            $finduser = TaiKhoan::where('tai_khoan', $user->email)->first();
            if (!$finduser) {
                // Tìm khách hàng có mã lớn nhất
                $latestCustomer = KhachHang::select('ma_khach_hang')->latest()->first();

                if ($latestCustomer) {
                    // Lấy mã khách hàng hiện tại
                    $currentCode = $latestCustomer->ma_khach_hang;

                    // Tạo mã khách hàng mới
                    $matches = [];
                    preg_match('/KH(\d+)/', $currentCode, $matches);
                    if (count($matches) > 0) {
                        $nextNumber = (int)$matches[1] + 1;
                        $nextCustomerCode = 'KH' . str_pad($nextNumber, 2, '0', STR_PAD_LEFT);
                    }
                } else {
                    // Nếu không có khách hàng nào trong cơ sở dữ liệu, tạo mã đầu tiên.
                    $nextCustomerCode = 'KH01';
                }

                $taikhoan = new TaiKhoan();
                $taikhoan->tai_khoan = $user->email;
                $taikhoan->mat_khau = null;
                $taikhoan->ma_loai_tai_khoan = 'LTK04';
                $taikhoan->google_id = $user->id;
                $taikhoan->verified = true;
                $taikhoan->save();

                $khachHang = new KhachHang();
                $khachHang->ma_khach_hang = $nextCustomerCode;
                $khachHang->ten_khach_hang = $user->name;
                $khachHang->email = $user->email;
                $khachHang->tai_khoan = $user->email;
                $khachHang->anh_dai_dien = $user->avatar;
                $khachHang->save();

                $user = TaiKhoan::select('tai_khoans.*', 'loai_tai_khoans.ten_loai_tai_khoan')
                ->join('loai_tai_khoans', 'tai_khoans.ma_loai_tai_khoan', '=', 'loai_tai_khoans.ma_loai_tai_khoan')
                ->where('tai_khoans.tai_khoan', $user->email)
                ->first();
                session()->put('loggedInUser', $user);
                $userInformation = KhachHang::where('tai_khoan', $user->tai_khoan)->first();
                session()->put('userInfo', $userInformation);

                return redirect()->route('homepage');
            } else {
                TaiKhoan::where('tai_khoan', $user->email)->update([
                    'google_id' => $user->id,
                    'verified' => true,
                ]);

                KhachHang::where('tai_khoan', $user->email)->update([
                    'ten_khach_hang' => $user->name,
                    'anh_dai_dien' => $user->avatar,
                ]);

                $user = TaiKhoan::select('tai_khoans.*', 'loai_tai_khoans.ten_loai_tai_khoan')
                ->join('loai_tai_khoans', 'tai_khoans.ma_loai_tai_khoan', '=', 'loai_tai_khoans.ma_loai_tai_khoan')
                ->where('tai_khoans.tai_khoan', $user->email)
                ->first();
                session()->put('loggedInUser', $user);
                $userInformation = KhachHang::where('tai_khoan', $user->tai_khoan)->first();
                session()->put('userInfo', $userInformation);

                return redirect()->route('homepage');
            }
        } catch (\Throwable $e) {
            throw $e;
        }
    }

    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }
    public function handleFacebookCallback()
    {
        try {
            $user = Socialite::driver('facebook')->user();
            dd($user);
        } catch (\Throwable $e) {
            throw $e;
        }
    }
}