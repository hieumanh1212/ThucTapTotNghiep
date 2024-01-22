<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResetMatKhau extends Model
{
    use HasFactory;
    protected $table = 'reset_mat_khaus';

    protected $fillable = [
        'email',
        'token',
    ];
}
