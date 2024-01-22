<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TheLoai extends Model
{
    use HasFactory;
    protected $table='the_loais';
    protected $primaryKey = 'ma_the_loai';
    protected $keyType = 'string';  
    protected $fillable = ['ma_the_loai',  'ten_the_loai'];
    public function getProductsByCategoryId($categoryId){
        return DB::table('san_phams')
                    ->join('the_loais','the_loais.ma_the_loai','=','san_phams.ma_the_loai')
                    ->where('the_loais.ma_the_loai','=',$categoryId)
                    ->select('san_phams.*')->get();
    }
}
