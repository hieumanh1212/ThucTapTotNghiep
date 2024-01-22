<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\TinTuc;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(){
        $news = TinTuc::all();
        return view('client/News',['news' => $news]);
    }
    public function newsDetail($newsId){
        $news = TinTuc::getNewsById($newsId);
//        dd($news);
        return view('client/NewsDetail',['news' => $news]);
    }
}
