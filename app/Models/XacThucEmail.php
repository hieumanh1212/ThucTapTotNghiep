<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class XacThucEmail extends Model
{
    use HasFactory;
    protected $table = 'xac_thuc_emails';
    protected $fillable = [
        'email',
        'token',
    ];
}
