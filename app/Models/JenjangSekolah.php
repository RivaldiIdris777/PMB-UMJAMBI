<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenjangSekolah extends Model
{
    use HasFactory;
    protected $table = 'tb_jenjang_sekolah';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama',
    ];
    public $timestamps = false;
}
