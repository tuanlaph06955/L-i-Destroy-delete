<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // protected $primaryKey = '<tên khóa chính>'; ---- Khai báo khóa chính cho bảng trong DB
    protected $fillable = [
        'title', 'content', 'time',
    ];
}
