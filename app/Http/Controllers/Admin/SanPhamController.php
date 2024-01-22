<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\CommonFunction\CommonFunction;
use App\Http\Controllers\Controller;
use App\Models\SanPham;
use App\Models\TheLoai;
use App\Http\Requests\StoreSanPhamRequest;
use App\Http\Requests\UpdateSanPhamRequest;
use App\Models\AnhSanPham;
use App\Models\ChiTietSanPham;
use App\Models\MauSac;
use App\Models\Size;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\DSchemaB;

class SanPhamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function CreateArr($max, $min)
    {
        $arr =[];
        if($max<50)
            return ['0-'.$max];
        $temp = floor($max/4);
        if($min>=$temp)
            $min = 0;
        for($i=1; $i<=3; $i++)
        {
            array_push($arr, $min.'-'.$temp*$i);
            $min = $temp*$i + 1;
        }
        array_push($arr, ($temp*3+1).'-'.$max);
        return $arr;
        
    }
    public function index()
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

        

        $arrGia = [];
        if(isset(request()->Namesearch) && request()->Namesearch!='tat_ca')
        {
            if(request()->Namesearch =='tong_so_luong')
            {
                $tongSlMax = $Data_SanPham->get()->max('tong_so_luong');
                $tongSlMin = $Data_SanPham->get()->min('tong_so_luong');
                $arrGia = $this->CreateArr($tongSlMax, $tongSlMin);
            }
            else if(request()->Namesearch =='giam_gia')
            $arrGia = $this->CreateArr(100, 0,'giam_gia');
            else if(request()->Namesearch =='don_gia_nhap')
                $arrGia = $this->CreateArr($Data_SanPham->get()->max('don_gia_nhap'), $Data_SanPham->get()->min('don_gia_nhap'));
            else if(request()->Namesearch =='don_gia_ban')
                $arrGia = $this->CreateArr($Data_SanPham->get()->max('don_gia_ban'), $Data_SanPham->get()->min('don_gia_ban'));

            
            if(isset(request()->Key_SanPham) || isset(request()->TheLoai))
            {
                $checkRequest_ma_san_pham = '';
                if(request()->Namesearch == 'ma_san_pham')
                    $checkRequest_ma_san_pham ='san_phams.';
                $Key_Search =(request()->Key_SanPham? request()->Key_SanPham: request()->TheLoai);
                $Data_SanPham =$Data_SanPham->where($checkRequest_ma_san_pham.''.request()->Namesearch, 'like', '%'.$Key_Search.'%');
            }

            else if(isset(request()->Gia))
            {
                
                if(request()->Namesearch =='tong_so_luong')
                {
                    if(request()->Gia==0)
                        $Data_SanPham =$Data_SanPham->having(request()->Namesearch,'=',0);
                    else
                    {
                        $gia = explode('-', request()->Gia);// tách chuỗi thành mảng 
                        $Data_SanPham =$Data_SanPham->havingBetween(request()->Namesearch, [$gia[0], $gia[1]]);
                    }
                }
                else
                {
                    $gia = explode('-', request()->Gia);
                    $Data_SanPham =$Data_SanPham
                    ->where(request()->Namesearch, '>=', $gia[0])
                    ->where(request()->Namesearch, '<=', $gia[1]);
                }
            }
        }
        if(isset(request()->NameSort))
            $Data_SanPham = $Data_SanPham->orderBy(request()->NameSort, request()->Sort);
        $Data_SanPham = $Data_SanPham->latest('san_phams.created_at')->paginate(5);

        //dd( DB::getSchemaBuilder()->getColumnListing('san_phams'));
        // $columnNames = !empty($Data_SanPham) ? array_keys((array) $Data_SanPham[0]) : []; // in ra cac cot sau khi join
        return view('Admin.SanPham.SanPham', ['Data_SanPham'=> $Data_SanPham, 'Data_TheLoai'=>TheLoai::all(), 'ArrGia'=>$arrGia]);
    
    }

    public function create()
    {
        $AutoGenerateId = new CommonFunction(); 
        return view('Admin.SanPham.CreateSanPham', ['auto_ma_san_pham' => $AutoGenerateId->autoGenerateId('SP', SanPham::class, 'ma_san_pham'),'Data_TheLoai'=>TheLoai::all()]);
    }

    public function store(StoreSanPhamRequest $request)
    {
       
        $Giam_Gia =  0;
        if(isset($request->giam_gia))
            $Giam_Gia = $request->giam_gia;
        if(SanPham::create([
            'ma_san_pham' => $request->ma_san_pham,
            'ten_san_pham' => $request->ten_san_pham,
            'don_gia_nhap' => $request->don_gia_nhap,
            'don_gia_ban' => $request->don_gia_ban,
            'giam_gia' => $Giam_Gia,
            'anh_dai_dien' => $this->uploadImage($request),
            'mo_ta' => $request->mo_ta,
            'ma_the_loai' => $request->ma_the_loai
        ]))
        {
            $ListImage = explode(',', $request->image_list);
            $AutoGenerateId = new CommonFunction();
            foreach($ListImage as $item)
            {
                AnhSanPham::create([
                    'ma_anh' =>  $AutoGenerateId->autoGenerateId('A', AnhSanPham::class, 'ma_anh'),
                    'hinh_anh'=>$item,
                    'ma_san_pham'=> $request->ma_san_pham
                ]);
            }
            return redirect('Admin/SanPham')->with('ThemSanPham_ThanhCong', 'Thêm thành công mã sản phẩm: '.$request->ma_san_pham);
        }
        return redirect('Admin/SanPham')->with('ThemSanPham_Error', 'Thêm không thành công mã sản phẩm: '.$request->ma_san_pham);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SanPham  $sanPham
     * @return \Illuminate\Http\Response
     */
    public function show($masanPham)
    {
        
        $product = SanPham::where('ma_san_pham', $masanPham)->first();
        
        $ListChiTietSP = DB::table('chi_tiet_san_phams')
                        ->join('mau_sacs', 'chi_tiet_san_phams.ma_mau', '=', 'mau_sacs.ma_mau')
                        ->join('sizes', 'chi_tiet_san_phams.ma_size', '=', 'sizes.ma_size')
                        ->select('chi_tiet_san_phams.*', 'mau_sacs.*', 'sizes.*')
                        ->where('chi_tiet_san_phams.ma_san_pham', '=', $masanPham);
        $SumChiTietSP = $ListChiTietSP->get()->sum('so_luong');
        $arrSelect =[];      
        if(isset(request()->Namesearch) && request()->Namesearch != 'tat_ca')
        {
            if(request()->Namesearch == 'ma_chi_tiet_san_pham' || 
            request()->Namesearch == 'trang_thai' || 
            request()->Namesearch == 'ma_mau'||
            request()->Namesearch == 'ma_size')
            {
                $checkTable = '';
                if(request()->Namesearch =='trang_thai')
                    $arrSelect = ['0', '1'];
                else if(request()->Namesearch =='ma_mau' || request()->Namesearch =='ma_size')
                {
                    $arrSelect = DB::table('chi_tiet_san_phams')
                        ->join('mau_sacs', 'chi_tiet_san_phams.ma_mau', '=', 'mau_sacs.ma_mau')
                        ->join('sizes', 'chi_tiet_san_phams.ma_size', '=', 'sizes.ma_size')
                        ->where('ma_san_pham', '=', $masanPham);

                    request()->Namesearch =='ma_mau'? $checkTable = 'mau_sacs.' :$checkTable = 'sizes.';
                    request()->Namesearch =='ma_mau'? $arrSelect = $arrSelect ->select('mau_sacs.ma_mau','mau'): $arrSelect = $arrSelect ->select('sizes.ma_size','size');
                    $arrSelect = $arrSelect->distinct($checkTable.''.request()->Namesearch)->get();
                }

                
                $Key_Search =(request()->Key_ChiTietSanPham? request()->Key_ChiTietSanPham: request()->Select);
                $ListChiTietSP =$ListChiTietSP->where($checkTable.''.request()->Namesearch, 'like', '%'.$Key_Search.'%');
            }
            else
            {
                $arrSelect = $this->CreateArr($ListChiTietSP->get()->max('so_luong'),$ListChiTietSP->get()->min('so_luong'));
                if(isset(request()->Select))
                {
                    $soluong = explode('-', request()->Select);
                    $ListChiTietSP =$ListChiTietSP
                    ->where(request()->Namesearch, '>=', $soluong[0])
                    ->where(request()->Namesearch, '<=', $soluong[1]);
                }
                
            }
        }
        if(isset(request()->NameSort))
            $ListChiTietSP = $ListChiTietSP->orderBy(request()->NameSort, request()->Sort);
        $ListChiTietSP  = $ListChiTietSP ->latest('chi_tiet_san_phams.created_at')->paginate(5);
        // $columnNames = !empty($ListChiTietSP) ? array_keys((array) $ListChiTietSP[0]) : []; // in ra cac cot sau khi join
        // dd($columnNames);

        return view('Admin.SanPham.DetailSanPham', 
        [
            'Data_SanPham' => $product, 
            'Data_TheLoai'=>TheLoai::where('ma_the_loai', $product->ma_the_loai)->first(),
            'Data_ChiTietSP'=>[$ListChiTietSP, $SumChiTietSP],
            'ListImage' => AnhSanPham::where('ma_san_pham', $masanPham)->get(),
            'arrSelect'=>$arrSelect
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SanPham  $sanPham
     * @return \Illuminate\Http\Response
     */
    public function edit($masanPham)
    {
        // $a = SanPham::where('ma_san_pham', $masanPham)->first();
        return view('Admin.SanPham.EditSanPham', 
        [
            'Data_SanPham' => SanPham::where('ma_san_pham', $masanPham)->first(), 
            'Data_TheLoai'=>TheLoai::all(),
            'ListImage' => AnhSanPham::where('ma_san_pham', $masanPham)->get()
        ]);  

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSanPhamRequest  $request
     * @param  \App\Models\SanPham  $sanPham
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSanPhamRequest $request,  $masanPham)
    {
     
        $olddata = SanPham::find($masanPham);
        if(isset($olddata))
        {
            $giam_gia = 0;
            if(isset($request->giam_gia))
                $giam_gia = $request->giam_gia;

            $fileName = $this->uploadImage($request);
            if($fileName!='')
                $olddata->anh_dai_dien = $fileName;
            $olddata->ten_san_pham = $request->ten_san_pham;
            $olddata->don_gia_nhap = $request->don_gia_nhap; 
            $olddata->don_gia_ban = $request->don_gia_ban; 
            $olddata->giam_gia = $giam_gia; 
            $olddata->mo_ta = $request->mo_ta; 
            $olddata->ma_the_loai = $request->ma_the_loai; 
            $olddata->save();
            
            if(isset($request->image_list))
            {
                AnhSanPham::Where('ma_san_pham', $masanPham)->delete();
                $ListImage = explode(',', $request->image_list);
                $AutoGenerateId = new CommonFunction();
                foreach($ListImage as $item)
                {
                    AnhSanPham::create([
                        'ma_anh' =>  $AutoGenerateId->autoGenerateId('A', AnhSanPham::class, 'ma_anh'),
                        'hinh_anh'=>$item,
                        'ma_san_pham'=> $request->ma_san_pham
                    ]);
                }
            }
            return redirect('Admin/SanPham')->with('SuaSanPham_ThanhCong', 'Sửa thành công mã sản phẩm: '.$masanPham);
        }
        
        return redirect('Admin/SanPham')->with('SuaSanPham_Error', 'Sửa không thành công mã sản phẩm: '.$masanPham);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SanPham  $sanPham
     * @return \Illuminate\Http\Response
     */
    public function destroy( $masanPham)
    {
        
       $ListChiTietSP = DB::table('chi_tiet_san_phams')->where('ma_san_pham', $masanPham)->get();
       $ListImage = DB::table('anh_san_phams')->where('ma_san_pham', $masanPham)->get();
       if($ListChiTietSP->count() != 0)
       {
            $checkExist = false;
            foreach($ListChiTietSP as $item)
            {
                if(DB::table('chi_tiet_hoa_don_bans')->where('ma_chi_tiet_san_pham', $item->ma_chi_tiet_san_pham)->count()!=0||
                DB::table('chi_tiet_hoa_don_nhaps')->where('ma_chi_tiet_san_pham', $item->ma_chi_tiet_san_pham)->count()!=0)
                {
                    $checkExist = true;
                    break;
                }
            }
            if(!$checkExist)
            {
                
                AnhSanPham::Where('ma_san_pham', $masanPham)->delete();
                foreach($ListChiTietSP as $item)
                {
                    ChiTietSanPham::Where('ma_san_pham', $item->ma_san_pham)->delete();
                }  
                SanPham::Where('ma_san_pham', $masanPham)->delete();
                return redirect('Admin/SanPham')->with('XoaSanPham_ThanhCong', 'Xóa thành công mã sản phẩm: '.$masanPham);
            } 
            return redirect('Admin/SanPham')->with('XoaSanPham_Error', 'Xóa không thành công mã sản phẩm: '.$masanPham.' (Đã tồn tại trong hóa đơn nhập/bán).'); 
        }
        else
        {
            AnhSanPham::Where('ma_san_pham', $masanPham)->delete();
            SanPham::Where('ma_san_pham', $masanPham)->delete();
            return redirect('Admin/SanPham')->with('XoaSanPham_ThanhCong', 'Xóa thành công mã sản phẩm: '.$masanPham);
        }
    }

    public function uploadImage($request)
    {
        $fileName = '';
        if ($request->hasFile('anh_dai_dien')) 
        {
            $file = $request->anh_dai_dien;
           $fileName = $file->getClientOriginalName();
            $ext = $request->anh_dai_dien->extension();
            $fileName = time().'-SanPham.'.$ext;
            $file->move(public_path('IMG_SanPham/'), $fileName);
        }
        return $fileName;
    }
}
