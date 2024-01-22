<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\AnhSanPham;
use App\Models\ChiTietSanPham;
use App\Models\MauSac;
use App\Models\SanPham;
use App\Models\Size;
use App\Models\TheLoai;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function productDetail($productId)
    {
        $productImages = AnhSanPham::where('ma_san_pham', '=', $productId)->get();
        $product = (new SanPham())->getProductsAndCategoriesByProductId($productId);
        $productDetail = ChiTietSanPham::where('ma_san_pham', '=', $productId)->get();
        $sizes = (new Size())->getSizesByProductId($productId);
        $colors = (new MauSac())->getColorsByProductId($productId);
        $categoryId = $product->ma_the_loai;
        $relatedProducts = (new TheLoai())->getProductsByCategoryId($categoryId);
        $sizeLeft = new Collection();
        foreach ($colors as $color) {
            $sizeLeft->put($color->ma_mau,(new Size())->getSizeFromColorAndProduct($color->ma_mau,$productId));
        }
//        dd($sizeLeft);
        return view('client/ProductDetail',
            ['productImages' => $productImages,
            'productDetails' => $productDetail,
            'product' => $product,
            'sizes' => $sizes,
            'colors' => $colors,
            'relatedProducts' => $relatedProducts,
            'sizesLeft'=> $sizeLeft]);
    }
}
