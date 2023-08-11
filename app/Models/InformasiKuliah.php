<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InformasiKuliah extends Model
{
    use HasFactory;
    protected $table = 'tb_info_kuliah';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'nama',
    ];
}
