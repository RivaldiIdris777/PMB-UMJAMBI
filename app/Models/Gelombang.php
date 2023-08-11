<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gelombang extends Model
{
    use HasFactory;
    protected $table = 'tb_gelombang';
    protected $primaryKey = 'id_gelombang';
    protected $fillable = [
        'kode_gelombang',
        'nama_gelombang',
        'status_gelombang',
    ];
    public $timestamps = false;
}
