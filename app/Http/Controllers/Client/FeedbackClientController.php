<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\CommonFunction\CommonFunction;
use App\Http\Controllers\Controller;
use App\Models\Feedback;
use App\Models\TinTuc;
use Illuminate\Http\Request;

class FeedbackClientController extends Controller
{
    public function index(){
        return view('client/Feedback');
    }
    public function sendFeedback(Request $request){
        $genId = new CommonFunction();
        $dataOfFeedback = [
            'ma_feedback' => $genId->autoGenerateId('FB',Feedback::class,'ma_feedback'),
            'ho_ten' => $request->name,
            'noi_dung' => $request->message,
            'email' => $request->email,
            'so_dien_thoai'=>$request->phoneNumber
        ];
        Feedback::create($dataOfFeedback);
        return view('client/Feedback')->with('message', 'Bạn đã gửi feedback thành công');
    }
}
