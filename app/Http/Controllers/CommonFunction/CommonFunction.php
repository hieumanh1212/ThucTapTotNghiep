<?php

namespace App\Http\Controllers\CommonFunction;

use App\Http\Controllers\Controller;
use App\Models\ChiTietHoaDonBan;
use App\Models\HoaDonBan;
use App\Models\SanPham;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class CommonFunction extends Controller
{
    public function splitId($lastId,$prefix): int 
    {
        return (int) substr($lastId,strlen($prefix));
    }
    public function autoGenerateId($prefix,$model,$primaryKeyName){
        $records = $model::orderBy($primaryKeyName, 'desc')->get();
        
        if(count($records)==0)
            return $prefix."01";
        
        $numberOfRecords = $records->count();

        $lastId = $records[0]->$primaryKeyName;
        
        $lastNumber = $this->splitId($lastId,$prefix);
        $genId = (int)$lastNumber<9?"0".($lastNumber+1):($lastNumber+1);

        return $prefix.$genId;
    }
}
