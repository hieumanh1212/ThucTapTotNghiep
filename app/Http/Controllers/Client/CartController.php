<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\SanPham;
use App\Models\TheLoai;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(){
        return view('client/Cart');
    }
}
