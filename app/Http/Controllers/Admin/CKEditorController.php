<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CKEditorController extends Controller
{
   
    public function uploadImage(Request $request)
    {
        //dd($request->input('isCheck'));
        //return $request->isCheck;
        if($request->hasFile('upload'))
        {
            //dd($request->all());
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            
            
            $fileName = $fileName.'_'.time().'.'.$extension;

            isset($request->isCheck)? $folder = $request->isCheck: $folder = "IMG_Media_CKEditor";

            $request->file('upload')->move(public_path($folder),$fileName);
             
            $url =asset($folder."/".$fileName);
            return response()->json(['fileName' => $fileName, 'uploaded' =>1, 'url'=>$url]);
        }
    }
}
