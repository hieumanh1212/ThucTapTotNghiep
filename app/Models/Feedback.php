<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 * OrderDetail
 *
 * @mixin Builder
 */
class Feedback extends Model
{
    use HasFactory;
    protected $table='feedback';

    protected $primaryKey = 'ma_feedback';
    protected $keyType = 'string';  
    protected $fillable = ['ma_feedback',  
                        'ho_ten', 
                        'noi_dung', 
                        'email', 
                        'so_dien_thoai'];
}
