<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\TaiKhoan;
use Exception;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getFormLogin(){
        return view('client/Login');
    }
    public function login(Request $request){
        try {
            $account = new TaiKhoan();
            $user = $account->checkLogin($request);
            if ($user){
                $request->session()->put('user',$user);
//            dd($request->session()->get('user'));
                return redirect("/");
            }else{
                return "username or password wrong";
            }
        }catch(Exception $e){
            return $e->getMessage();
        }
    }
}
