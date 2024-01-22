<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\SanPham;
use App\Models\TheLoai;
use Illuminate\Http\Request;

class ShopListController extends Controller
{
    public function show(Request $request)
    {
        $query = SanPham::select('san_phams.*', 'the_loais.ten_the_loai')
            ->join('the_loais', 'san_phams.ma_the_loai', '=', 'the_loais.ma_the_loai');

        // Apply filtering based on keyword
        if (!empty($request->keyword)) {
            $query->where(function ($q) use ($request) {
                $q->where('ten_san_pham', 'like', '%' . $request->keyword . '%')
                    ->orWhere('ten_the_loai', 'like', '%' . $request->keyword . '%');
            });
        }

        $countFound = $query->count();
        if ($request->category) {
            $categoryName = TheLoai::where('ma_the_loai', $request->category)->first()->ten_the_loai;
        }

        $dataFilter = [
            'count' => $countFound ?? 0,
            'keyword' => $request->keyword ?? '',
            'sortOrder' => $request->sortOrder ?? 'default',
            'color' => $request->color ?? '',
            'category' => $request->category ?? '',
            'categoryName' => $categoryName ?? '',
            'minPrice' => $request->minPrice ?? '',
            'maxPrice' => $request->maxPrice ?? '',
            'pageNumber' => $request->pageNumber ?? 1,
        ];

        return view('client.shop-list', compact('dataFilter'));
    }

    public function getPaginationWithFilter(Request $request)
    {
        $offset = ($request->pageNumber - 1) * $request->pageSize;

        $query = SanPham::select('san_phams.*', 'the_loais.ten_the_loai')
            ->join('the_loais', 'san_phams.ma_the_loai', '=', 'the_loais.ma_the_loai');

        // Apply filtering based on keyword
        if (!empty($request->keyword)) {
            $query->where(function ($q) use ($request) {
                $q->where('ten_san_pham', 'like', '%' . $request->keyword . '%')
                    ->orWhere('ten_the_loai', 'like', '%' . $request->keyword . '%');
            });
        }

        // Apply sorting based on sortOrder
        if ($request->sortOrder == 'lowToHigh') {
            $query->orderBy('don_gia_ban', 'asc');
        } elseif ($request->sortOrder == 'highToLow') {
            $query->orderBy('don_gia_ban', 'desc');
        }

        // Apply filtering based on category
        if (!empty($request->category)) {
            $query->where('san_phams.ma_the_loai', '=', $request->category);
        }

        // Apply filtering based on price range
        if (!empty($request->minPrice)) {
            $query->where('don_gia_ban', '>=', $request->minPrice);
        }

        if (!empty($request->maxPrice)) {
            $query->where('don_gia_ban', '<=', $request->maxPrice);
        }

        $clone = $query->clone();
        $results = $query->limit($request->pageSize)->offset($offset)->get();

        return response()->json([
            'startOrder' => $offset + 1,
            'countFound' => $clone->count(),
            'data' => $results,
            'total' => SanPham::select('san_phams.*', 'the_loais.ten_the_loai')
                ->join('the_loais', 'san_phams.ma_the_loai', '=', 'the_loais.ma_the_loai')->count(),
        ]);
    }
}
