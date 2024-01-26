<?php

namespace App\Http\Controllers\NhanVien;

use App\Http\Controllers\Controller;
use App\Models\NhaCungCap;
use Illuminate\Http\Request;
use App\Models\NhanVien;
use App\Http\Controllers\CommonFunction\CommonFunction;
use App\Models\ChiTietHoaDonNhap;
use App\Models\ChiTietSanPham;
use App\Models\HoaDonNhap;
use App\Models\SanPham;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class NhanVienKhoController extends Controller
{
    public function index()
    {
        session(['User' => 'NhanVienKho']);
        $myHDN =  DB::table('hoa_don_nhaps')
                ->join('nhan_viens', 'nhan_viens.ma_nhan_vien', '=', 'hoa_don_nhaps.ma_nhan_vien')
                ->join('nha_cung_caps', 'nha_cung_caps.ma_nha_cung_cap', '=', 'hoa_don_nhaps.ma_nha_cung_cap')
                ->select('hoa_don_nhaps.*', 'nha_cung_caps.*', 'nhan_viens.*')
                ->where('hoa_don_nhaps.ma_nhan_vien', '=', session()->get('userInfo')->ma_nhan_vien);

        if(isset(request()->Key_NVKHoaDonNhap))
        {
            $myHDN = $myHDN->where('ma_hoa_don_nhap', 'like', '%'.request()->Key_NVKHoaDonNhap.'%');
            $myHDN = $myHDN->orwhere('ngay_nhap', 'like', '%'.request()->Key_NVKHoaDonNhap.'%');
            $myHDN = $myHDN->orwhere('ten_nha_cung_cap', 'like', '%'.request()->Key_NVKHoaDonNhap.'%');
            $myHDN = $myHDN->orwhere('nhan_viens.ma_nhan_vien', 'like', '%'.request()->Key_NVKHoaDonNhap.'%');
            $myHDN = $myHDN->orwhere('ten_nhan_vien', 'like', '%'.request()->Key_NVKHoaDonNhap.'%');
            $myHDN = $myHDN->orwhere('tong_tien_hdn', 'like', '%'.request()->Key_NVKHoaDonNhap.'%');
        }
        if(isset(request()->NameSort))
            $myHDN = $myHDN->orderBy(request()->NameSort, request()->Sort);
            
        $myHDN = $myHDN->latest('hoa_don_nhaps.created_at')->paginate(5);
        return view('NhanVien.NhanVienKho.MyHoaDonNhap',
        [
            'My_HDN' =>$myHDN
        ]);
    }


    public function show($mahoadonnhap)
    {

        $HDN =  DB::table('hoa_don_nhaps')
                ->join('nhan_viens', 'nhan_viens.ma_nhan_vien', '=', 'hoa_don_nhaps.ma_nhan_vien')
                ->join('nha_cung_caps', 'nha_cung_caps.ma_nha_cung_cap', '=', 'hoa_don_nhaps.ma_nha_cung_cap')
                ->select('hoa_don_nhaps.*', 'nhan_viens.*', 'nha_cung_caps.*')
                ->where('hoa_don_nhaps.ma_hoa_don_nhap', '=', $mahoadonnhap)
                ->first();
        

        $listCTHDN = DB::table('chi_tiet_hoa_don_nhaps')
                ->join('chi_tiet_san_phams', 'chi_tiet_san_phams.ma_chi_tiet_san_pham', '=', 'chi_tiet_hoa_don_nhaps.ma_chi_tiet_san_pham')
                ->join('sizes', 'chi_tiet_san_phams.ma_size', '=', 'sizes.ma_size')
                ->join('mau_sacs', 'chi_tiet_san_phams.ma_mau', '=', 'mau_sacs.ma_mau')
                ->join('san_phams', 'san_phams.ma_san_pham', '=', 'chi_tiet_san_phams.ma_san_pham')
                ->select('chi_tiet_hoa_don_nhaps.*', 'sizes.*', 'mau_sacs.*', 'chi_tiet_san_phams.*', 'san_phams.*')
                ->where('chi_tiet_hoa_don_nhaps.ma_hoa_don_nhap', '=', $mahoadonnhap);
               

        return view('NhanVien.NhanVienKho.DetailHoaDonNhap',
        [
            'Data_HoaDonNhap' =>$HDN,
            'List_CTHDN' =>[$listCTHDN->get(), $listCTHDN->count()]
        ]);
    }





    public function create()
    {
        $AutoGenerateId = new CommonFunction();
        $mahoadon = $AutoGenerateId->autoGenerateId('HDN', HoaDonNhap::class, 'ma_hoa_don_nhap');
        
        $ngaynhap =Carbon::now('Asia/Ho_Chi_Minh');

        $ListChiTietSP = DB::table('chi_tiet_san_phams')

        ->join('san_phams', 'chi_tiet_san_phams.ma_san_pham', '=', 'san_phams.ma_san_pham')
        ->join('mau_sacs', 'chi_tiet_san_phams.ma_mau', '=', 'mau_sacs.ma_mau')
        ->join('sizes', 'chi_tiet_san_phams.ma_size', '=', 'sizes.ma_size')
        ->select('chi_tiet_san_phams.*', 'mau_sacs.*', 'sizes.*', 'san_phams.*')
        ->where('chi_tiet_san_phams.ma_san_pham', '=', request()->ma_san_pham);
        


        $listCTHDB = DB::table('chi_tiet_hoa_don_nhaps')
        ->join('chi_tiet_san_phams', 'chi_tiet_san_phams.ma_chi_tiet_san_pham', '=', 'chi_tiet_hoa_don_nhaps.ma_chi_tiet_san_pham')
        ->join('san_phams', 'chi_tiet_san_phams.ma_san_pham', '=', 'san_phams.ma_san_pham')
        ->join('mau_sacs', 'chi_tiet_san_phams.ma_mau', '=', 'mau_sacs.ma_mau')
        ->join('sizes', 'chi_tiet_san_phams.ma_size', '=', 'sizes.ma_size')
        ->select('chi_tiet_san_phams.*', 'mau_sacs.*', 'sizes.*', 'san_phams.*','chi_tiet_hoa_don_nhaps.*')
        ->where('chi_tiet_hoa_don_nhaps.ma_hoa_don_nhap', '=', request()->ma_hoa_don_nhap);


        if(isset(request()->ma_hoa_don_nhap))
        {
            $mahoadon = request()->ma_hoa_don_nhap;
            $ngaynhap = request()->ngay_nhap;
            
        }
            
        if(isset(request()->ma_san_pham)) 
        {
            
            
        }
        return view('NhanVien.NhanVienKho.CreateHoaDonNhap',
        [
            'auto_ma_hoa_don_nhap' => $mahoadon,
            "nhanvien" => NhanVien::find(session()->get('userInfo')->ma_nhan_vien),
            'nhacungcap' => NhaCungCap::all(),
            'sanpham' => SanPham::all(),
            'ngaynhap' => $ngaynhap,
            'list_CTSP' => [$ListChiTietSP->get(), $ListChiTietSP->count()],
            'List_CTHDB' =>[$listCTHDB->get(), $listCTHDB->count(), $listCTHDB->sum('thanh_tien')]
        ]);
    }


    public function store(Request $request)
    {
    
        //dd($request->all());
        $manhacungcap ='';
        if(!HoaDonNhap::find($request->ma_hoa_don_nhap))
        {
            
            HoaDonNhap::create
            (
                [
                    'ma_hoa_don_nhap' => $request->ma_hoa_don_nhap,
                    'ngay_nhap'=> $request->ngay_nhap,
                    'tong_tien_hdn'=> $request->tong_tien_hdn,
                    'ma_nha_cung_cap'=> $request->ma_nha_cung_cap, 
                    'ma_nhan_vien' =>$request->ma_nhan_vien
                ]
            );
            $manhacungcap = HoaDonNhap::find($request->ma_hoa_don_nhap);
        }
        

        $soluongnhap = 0;
        $machitietsp ='';
        for($i=1; $i<=$request->index; $i++)
        {
            if(isset($request->all()['so_luong_nhap'.'*'.$i]))
            {
                $soluongnhap = $request->all()['so_luong_nhap'.'*'.$i];   
                $machitietsp =  $request->all()['ma_chi_tiet_san_pham'.'*'.$i];
            }
                
        }
        $detail = ChiTietHoaDonNhap::where('ma_hoa_don_nhap', '=', $request->ma_hoa_don_nhap)
                ->where('ma_chi_tiet_san_pham', '=', $machitietsp);
        
        if($detail->count() == 0)
        {
            ChiTietHoaDonNhap::create
            (
                [
                    'ma_chi_tiet_san_pham' =>$machitietsp,
                    'ma_hoa_don_nhap'=> $request->ma_hoa_don_nhap,
                    'so_luong_nhap'=> $soluongnhap,
                    'thanh_tien'=> $soluongnhap*$request->don_gia_nhap
                ]
            );
        }
        else
        {
            $detail->update(
            [
                'so_luong_nhap' => $soluongnhap,
                'thanh_tien' => $soluongnhap*$request->don_gia_nhap
            ]
            );
        }
        $manhacungcap = HoaDonNhap::find($request->ma_hoa_don_nhap);
        return redirect()->route('NhanVien.NhanVienKho.create', 
        [
            'ma_nha_cung_cap' =>$manhacungcap->ma_nha_cung_cap, 
            'ma_san_pham'=>$request->ma_san_pham,
            'ma_chi_tiet_san_pham'=>$machitietsp,
            'ma_hoa_don_nhap'=>$request->ma_hoa_don_nhap,
            'ngay_nhap'=>$request->ngay_nhap,

        ])->with('ThemChiTiet_ThanhCong', 'Thêm thành công chi tiết sản phẩm: '.$machitietsp);
    }

    public function destroyCTHDN(Request $request)
    {
        ChiTietHoaDonNhap::where('ma_hoa_don_nhap', '=', $request->ma_hoa_don_nhap)
                ->where('ma_chi_tiet_san_pham', '=', $request->ma_chi_tiet_san_pham)->delete();
        $hoadonnhap = HoaDonNhap::find($request->ma_hoa_don_nhap);
        $chitietsp = ChiTietSanPham::find($request->ma_chi_tiet_san_pham);
        return redirect()->route('NhanVien.NhanVienKho.create', 
        [
            'ma_nha_cung_cap' =>$hoadonnhap->ma_nha_cung_cap, 
            'ma_san_pham'=>$chitietsp->ma_san_pham,
            'ma_chi_tiet_san_pham'=>$request->ma_chi_tiet_san_pham,
            'ma_hoa_don_nhap'=>$hoadonnhap->ma_hoa_don_nhap,
            'ngay_nhap'=>$hoadonnhap->ngay_nhap,
        ])->with('XoaChiTiet_ThanhCong', 'Xóa thành công chi tiết sản phẩm: '.$request->ma_chi_tiet_san_pham);
    }


    public function createHDN(Request $request)
    {
        //dd( $request->all() );
        if($request->tong_tien!=0)
        {
            for($i=0; $i<count($request->sl); $i++)
            {
                $chitietsp = ChiTietSanPham::where('ma_chi_tiet_san_pham', '=', $request->mct[$i])->first();
                $chitietsp->update(['so_luong' => $chitietsp->so_luong + $request->sl[$i]]);
            }
            HoaDonNhap::where('ma_hoa_don_nhap', '=', $request->mhdn)
            ->update(['tong_tien_hdn' => $request->tong_tien]);
            return redirect()->route('NhanVien.NhanVienKho.index')->with('TaoHDN_thanhcong', 'Tạo thành công hóa đơn nhập: '.$request->mhdn);
        }

        //$hoadonnhap = HoaDonNhap::find($request->mhdn);
        return redirect()->route('NhanVien.NhanVienKho.create', 
        [
            'ma_nha_cung_cap' =>$request->mncc, 
            'ma_san_pham'=>$request->msp,
        ])->with('TaoHDN_error', 'Tạo không thành công bạn cần thêm chi tiết hóa đơn nhập');
    }


    public function quaylai(Request $request)
    {
        if($request->tong_tien!=0)
        {
            for($i=0; $i<count($request->sl); $i++)
            {
                $chitiethdn = ChiTietHoaDonNhap::where('ma_chi_tiet_san_pham', '=', $request->mct[$i])
                ->where('ma_hoa_don_nhap', '=', $request->mhdn)->delete();
            }     
        }
        if(HoaDonNhap::find($request->mhdn))
            HoaDonNhap::find($request->mhdn)->delete();
        return redirect('NhanVien/NhanVienKho');
    }

    public function ListSanPham()
    {
        $Data_SanPham = DB::table('san_phams')
        ->join('the_loais', 'san_phams.ma_the_loai', '=', 'the_loais.ma_the_loai')
        ->leftJoin('chi_tiet_san_phams', 'san_phams.ma_san_pham', '=', 'chi_tiet_san_phams.ma_san_pham')
        ->select('san_phams.ma_san_pham', 
                'san_phams.ten_san_pham', 
                'san_phams.don_gia_nhap', 
                'san_phams.don_gia_ban', 
                'san_phams.giam_gia', 
                'san_phams.anh_dai_dien', 
                'san_phams.mo_ta', 
                'san_phams.ma_the_loai', 
                'the_loais.ten_the_loai',
                DB::raw('COALESCE(SUM(chi_tiet_san_phams.so_luong), 0) as tong_so_luong')
            )
        ->groupBy('san_phams.ma_san_pham', 
        'san_phams.ten_san_pham', 
        'san_phams.don_gia_nhap', 
        'san_phams.don_gia_ban', 
        'san_phams.giam_gia', 
        'san_phams.anh_dai_dien', 
        'san_phams.mo_ta', 
        'san_phams.ma_the_loai', 
        'the_loais.ten_the_loai');


        if(isset(request()->Key_SanPhamNVK))
        {
            $Data_SanPham = $Data_SanPham->where('san_phams.ma_san_pham', 'like', '%'.request()->Key_SanPhamNVK.'%');
            $Data_SanPham = $Data_SanPham->orwhere('san_phams.ten_san_pham', 'like', '%'.request()->Key_SanPhamNVK.'%');
            $Data_SanPham = $Data_SanPham->orwhere('ten_the_loai', 'like', '%'.request()->Key_SanPhamNVK.'%');
            $Data_SanPham = $Data_SanPham->orwhere('don_gia_nhap', 'like', '%'.request()->Key_SanPhamNVK.'%');
            $Data_SanPham = $Data_SanPham->orwhere('don_gia_ban', 'like', '%'.request()->Key_SanPhamNVK.'%');
            $Data_SanPham = $Data_SanPham->orwhere('giam_gia', 'like', '%'.request()->Key_SanPhamNVK.'%');
            //$Data_SanPham = $Data_SanPham->having('tong_so_luong', 'like', '%'.request()->Key_SanPhamNVK.'%');
        }
        if(isset(request()->NameSort))
            $Data_SanPham = $Data_SanPham->orderBy(request()->NameSort, request()->Sort);
        $Data_SanPham = $Data_SanPham->latest('san_phams.created_at')->paginate(5);
        return view('NhanVien.NhanVienKho.ListSanPham', ['Data_SanPham'=> $Data_SanPham]);

    }
    public function DetailSanPham($masanpham)
    {
        
        $ListChiTietSP = DB::table('chi_tiet_san_phams')
                        ->join('mau_sacs', 'chi_tiet_san_phams.ma_mau', '=', 'mau_sacs.ma_mau')
                        ->join('sizes', 'chi_tiet_san_phams.ma_size', '=', 'sizes.ma_size')
                        ->select('chi_tiet_san_phams.*', 'mau_sacs.*', 'sizes.*')
                        ->where('chi_tiet_san_phams.ma_san_pham', '=', $masanpham);
        $SumChiTietSP = $ListChiTietSP->get()->sum('so_luong');

        if(isset(request()->Key_DetailSanPhamNVK))
        {
            $ListChiTietSP = $ListChiTietSP->where('ma_chi_tiet_san_pham', 'like', '%'.request()->Key_DetailSanPhamNVK.'%');
            $ListChiTietSP = $ListChiTietSP->orwhere('so_luong', 'like', '%'.request()->Key_DetailSanPhamNVK.'%');
            $ListChiTietSP = $ListChiTietSP->orwhere('mau', 'like', '%'.request()->Key_DetailSanPhamNVK.'%');
            $ListChiTietSP = $ListChiTietSP->orwhere('size', 'like', '%'.request()->Key_DetailSanPhamNVK.'%');
            $ListChiTietSP = $ListChiTietSP->orwhere('trang_thai', 'like', '%'.request()->Key_DetailSanPhamNVK.'%');
     
        }
        if(isset(request()->NameSort))
            $ListChiTietSP = $ListChiTietSP->orderBy(request()->NameSort, request()->Sort);
        $ListChiTietSP  = $ListChiTietSP ->latest('chi_tiet_san_phams.created_at')->paginate(5);
        return view('NhanVien.NhanVienKho.DetailSanPham', 
        [
            'masanpham' => $masanpham, 
            'ListChiTietSP'=>[$ListChiTietSP, $SumChiTietSP],
        ]);
    }
}
