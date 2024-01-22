<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * OrderDetail
 *
 * @mixin Builder
 */
class TinTuc extends Model
{
    use HasFactory;
    protected $table = 'tin_tucs';
    protected $primaryKey = 'ma_tin_tuc';
    protected $connection = 'mysql';
    public $exists = true;
    protected $keyType = 'string';
    public $incrementing = false; // truong hop khoa chinh k phai so
    protected $fillable = ['ma_tin_tuc', 'anh_dai_dien', 'tieu_de', 'noi_dung'];
    public static function getNewsById($newsId)
    {
        return TinTuc::where(['ma_tin_tuc' => $newsId])->first();
    }
}
