<?php

use App\Http\Controllers\Admin\FeedbackController;
use App\Http\Controllers\Authentication\AccountController;
use App\Http\Controllers\Client\FeedbackClientController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\ShopListController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\Admin_HomeController;
use App\Http\Controllers\Admin\ChiTietSanPhamController;
use App\Http\Controllers\Admin\ChucVuController;
use App\Http\Controllers\Admin\HoaDonBanController;
use App\Http\Controllers\Admin\HoaDonNhapController;
use App\Http\Controllers\Admin\KhachHangController;
use App\Http\Controllers\Admin\MauSacController;
use App\Http\Controllers\Client\NewsController;
use App\Http\Controllers\Admin\NhaCungCapController;
use App\Http\Controllers\Admin\NhanVienController;
use App\Http\Controllers\Admin\SanPhamController;
use App\Http\Controllers\Admin\SanPhamYeuThichController;
use App\Http\Controllers\Admin\SizeController;
use App\Http\Controllers\Admin\TheLoaiController;
use App\Http\Controllers\Admin\TinTucController;
use App\Http\Controllers\Admin\VoucherController;
use App\Http\Controllers\Admin\CKEditorController;
use App\Http\Controllers\NhanVien\NhanVienBanHangController;
use App\Http\Controllers\NhanVien\NhanVienCommon;
use App\Http\Controllers\NhanVien\NhanVienKhoController;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\Client\Api\CartAPIController;
//use App\Http\Controllers\Client\Api\ProductAPIController;
use App\Http\Controllers\Client\Api\WishlistAPIController;
use App\Http\Controllers\Client\CartController;
use App\Http\Controllers\Client\PaymentController;
use App\Http\Controllers\Client\ProductController;
use App\Http\Controllers\Client\UserController;
use App\Http\Controllers\Client\WishlistController;
use App\Http\Controllers\CommonFunction\CommonFunction;
use Illuminate\Support\Facades\Session;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/logout', function () {
    Session::forget('user');
    return redirect("/login");
});

Route::get('/product-detail/{productId}',[ProductController::class,'productDetail']);
Route::get('/login',[UserController::class,'getFormLogin']);
Route::post('/loginUser',[UserController::class,'login']);
Route::get('/carts',[CartController::class,'index']);
Route::get('/checkout',[PaymentController::class,'showCheckoutView']);
Route::post('/payment',[PaymentController::class,'paymentMethod']);
Route::get('/wishlist',[WishlistController::class,'getViewWishlist']);
Route::get('/news',[NewsController::class,'index']);
Route::get('/news/{id}',[NewsController::class,'newsDetail']);
Route::get('/feedback',[FeedbackClientController::class,'index'])->name('client.feedback');
Route::post('/feedback',[FeedbackClientController::class,'sendFeedback']);
//Route::get('/', function () {
//    return view('layout/client/layout');
//});

Route::get('/product-detail/{id}',[HomeController::class,'getProductDetailByIdForQuickViewModal'])->name('product-detail');

Route::get('/shop-list', [ShopListController::class,'show'])->name('shop-list');

Route::get('/shop-list/filter', [ShopListController::class,'getPaginationWithFilter'])->name('shop-list-pagination-filter');


Route::get('/login', [AccountController::class, 'login'])->name('loginPage')->middleware('LoginCheck');
Route::post('/login', [AccountController::class, 'postLogin'])->name('postLogin');

Route::get('/forgot', [AccountController::class, 'forgot'])->name('forgotPage');
Route::post('/forgot', [AccountController::class, 'postForgot'])->name('postForgot');

Route::get('/reset/{token}', [AccountController::class, 'reset'])->name('resetPage');
Route::post('/reset', [AccountController::class, 'postReset'])->name('postReset');

Route::get('/register', [AccountController::class, 'register'])->name('registerPage');
Route::post('/register', [AccountController::class, 'postRegister'])->name('postRegister');
Route::get('/verify/{token}', [AccountController::class, 'verify'])->name('verifiedPage');

Route::get('/logout', [AccountController::class, 'logout'])->name('logout');

Route::get('/profile', [ProfileController::class, 'show'])->name('profilePage');
Route::post('/profile', [ProfileController::class, 'updateProfile'])->name('updateProfile');

Route::post('/profile/change-password', [ProfileController::class, 'changePassword'])->name('changePassword');
Route::post('/profile/change-password-third-party', [ProfileController::class, 'changePasswordThirdParty'])->name('changePasswordThirdParty');

Route::get('/auth/google/redirect', [AccountController::class, 'redirectToGoogle'])->name('redirectToGoogle');
Route::get('/auth/google/callback', [AccountController::class, 'handleGoogleCallback']);

Route::get('/auth/facebook/redirect', [AccountController::class, 'redirectToFacebook'])->name('redirectToFacebook');
Route::get('/auth/facebook/callback', [AccountController::class, 'handleFacebookCallback']);

//Thực hiện hủy hóa đơn cho khách hàng
Route::get('/huy-hoa-don', [HomeController::class, 'huyHoaDon'])->name('huy-hoa-don');

//Modal
Route::post('/showmodal', [ProfileController::class, 'showmodal2']);
Route::post('/api/addToWishlist',[WishlistAPIController::class,'addToWishlist']);
Route::get('/api/getListWishList',[WishlistAPIController::class,'getAllProductInWishlist']);
Route::get('/api/sizeOfWishList',[WishlistAPIController::class,'getSizeOfWishList']);
Route::delete('/api/deleteWishlistItem',[WishlistAPIController::class,'deleteWishlistItem']);


Route::post('/api/addToCart',[CartAPIController::class,'addToCart']);
Route::post('/api/updateQuantity',[CartAPIController::class,'updateQuantityInCart']);
Route::delete('/api/deleteCartItem',[CartAPIController::class,'deleteCartItem']);
Route::get('/api/productsInCart',[CartAPIController::class,'getUserCartItem']);
Route::get('/api/sizeOfCart',[CartAPIController::class,'getSizeOfCart']);

// Route::get('/', function () {
//    return view('layout/Admin/layout');
// });

Route::get('/', [HomeController::class, 'index'])->name('homepage');


Route::get('/thongkehoadon', [Admin_HomeController::class, 'ThongKeHoaDon'])->name('thongkehoadon');
//Modal
Route::post('/showmodaladmin', [Admin_HomeController::class, 'showmodal2']);

//Nhân viên xác nhận đơn hàng
//Thực hiện hủy hóa đơn cho khách hàng
Route::get('/xac-nhan-don', [NhanVienBanHangController::class, 'xacNhanDon'])->name('xac-nhan-don');
//Thực hiện hoàn thành đơn hàng
Route::get('/hoan-thanh-don', [NhanVienBanHangController::class, 'hoanThanhDon'])->name('hoan-thanh-don');
//Modal nhân viên bán hàng
Route::post('/showmodalnhanvienbanhang', [NhanVienBanHangController::class, 'showmodal2']);

Route::prefix('Admin')->name('Admin.')->group(function ()
{
   // Route::get('/', [Admin_HomeController::class,'ShowLayOutAdmin_Staff'])->name('ShowLayOutAdmin_Staff');
   Route::get('/', [Admin_HomeController::class,'Index'])->name('Index');
   Route::get('/loinhuan', [Admin_HomeController::class,'LoiNhuan'])->name('LoiNhuan');
   Route::get('/hoadon', [Admin_HomeController::class,'HoaDon'])->name('HoaDon');


   //Route::get('/News', [NewsController::class,'Index'])->name('News');
   //Route::resource('News', NewsController::class);
   Route::resources([
      'Feedback' => FeedbackController::class,
      'HoaDonBan' => HoaDonBanController::class,
      'HoaDonNhap' => HoaDonNhapController::class,
      'KhachHang' => KhachHangController::class,
      'MauSac' => MauSacController::class,
      'NhaCungCap' => NhaCungCapController::class,
      'NhanVien' => NhanVienController::class,
      'SanPham' => SanPhamController::class,
      'ChiTietSanPham' => ChiTietSanPhamController::class,
      'SanPhamYeuThich' => SanPhamYeuThichController::class,
      'Size' => SizeController::class,
      'TheLoai' => TheLoaiController::class,
      'TinTuc' => TinTucController::class,
      'Voucher' => VoucherController::class,
      'ChucVu' => ChucVuController::class,

  ]);
});


Route::prefix('NhanVien')->name('NhanVien.')->group(function ()
{
   Route::prefix('NhanVienKho')->name('NhanVienKho.')->group(function ()
   {
      Route::get('/',[NhanVienKhoController::class, 'index'])->name('index');
      Route::get('/show/{mahoadonnhap}',[NhanVienKhoController::class, 'show'])->name('show');
      Route::get('/create}',[NhanVienKhoController::class, 'create'])->name('create');
      Route::post('/store}',[NhanVienKhoController::class, 'store'])->name('store');
      Route::delete('/destroyCTHDN}',[NhanVienKhoController::class, 'destroyCTHDN'])->name('destroyCTHDN');
      Route::put('/createHDN}',[NhanVienKhoController::class, 'createHDN'])->name('createHDN');
      Route::get('/quaylai}',[NhanVienKhoController::class, 'quaylai'])->name('quaylai');
      Route::get('/ListSanPham}',[NhanVienKhoController::class, 'ListSanPham'])->name('ListSanPham');
      Route::get('/DetailSanPham/{masanpham}}',[NhanVienKhoController::class, 'DetailSanPham'])->name('DetailSanPham');


   });


   Route::prefix('NhanVienBanHang')->name('NhanVienBanHang.')->group(function ()
   {
      Route::get('/index',[NhanVienBanHangController::class, 'index'])->name('index');
      Route::get('/donhangchoxacnhan',[NhanVienBanHangController::class, 'DonHangChoXacNhan'])->name('DonHangChoXacNhan');
      Route::get('/donhangdanggiao',[NhanVienBanHangController::class, 'DonHangDangGiao'])->name('DonHangDangGiao');
      Route::get('/donhangdahoanthanh',[NhanVienBanHangController::class, 'DonHangDaHoanThanh'])->name('DonHangDaHoanThanh');
   });
});

Route::prefix('Admin')->name('Admin.')->group(function () {
    Route::get('/', [Admin_HomeController::class, 'Index'])->name('Index');
    Route::resources([
        'Feedback' => FeedbackController::class,
        'HoaDonBan' => HoaDonBanController::class,
        'HoaDonNhap' => HoaDonNhapController::class,
        'KhachHang' => KhachHangController::class,
        'MauSac' => MauSacController::class,
        'NhaCungCap' => NhaCungCapController::class,
        'NhanVien' => NhanVienController::class,
        'SanPham' => SanPhamController::class,
        'ChiTietSanPham' => ChiTietSanPhamController::class,
        'SanPhamYeuThich' => SanPhamYeuThichController::class,
        'Size' => SizeController::class,
        'TheLoai' => TheLoaiController::class,
        'TinTuc' => TinTucController::class,
        'Voucher' => VoucherController::class,
        'ChucVu' => ChucVuController::class,

    ]);
});
Route::prefix('NhanVien')->name('NhanVien.')->group(function () {
    Route::get('/getViewChangePass', [NhanVienCommon::class, 'getViewChangePass'])->name('viewChangePass');
    Route::post('/changePass', [NhanVienCommon::class, 'changePassword'])->name('changePassword');
    Route::get('/profile', [NhanVienCommon::class, 'getInfoEmployee'])->name('getInfoEmployee');
    Route::prefix('NhanVienKho')->name('NhanVienKho.')->group(function () {
        Route::get('/index', [NhanVienKhoController::class, 'index'])->name('index');
    });
    Route::prefix('NhanVienBanHang')->name('NhanVienBanHang.')->group(function () {
        Route::get('/index', [NhanVienBanHangController::class, 'index'])->name('index');
    });
});

Route::post('Admin/ckeditor/uploadImage', [CKEditorController::class, 'uploadImage'])->name('ckeditor.uploadImage');











// php artisan make:controller Admin\HoaDonNhapController --model=HoaDonNhap --resource --requests

// php artisan make:controller Admin\HoaDonBanController --model=HoaDonBan --resource --requests

// php artisan make:controller Admin\FeedbackClientController --model=Feedback --resource --requests

// php artisan make:controller Admin\KhachHangController --model=KhachHang --resource --requests

// php artisan make:controller Admin\MauSacController --model=MauSac --resource --requests

// php artisan make:controller Admin\NhaCungCapController --model=NhaCungCap --resource --requests

// php artisan make:controller Admin\NhanVienController --model=NhanVien --resource --requests

// php artisan make:controller Admin\SanPhamController --model=SanPham --resource --requests

// php artisan make:controller Admin\SanPhamYeuThichController --model=SanPhamYeuThich --resource --requests

// php artisan make:controller Admin\SizeController --model=Size --resource --requests


// php artisan make:controller Admin\TheLoaiController --model=TheLoai --resource --requests

// php artisan make:controller Admin\TinTucController --model=TinTuc --resource --requests

// php artisan make:controller Admin\VoucherController --model=Voucher --resource --requests
