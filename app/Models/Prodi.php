<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    use HasFactory;
    protected $table = 'tb_prodi';
    protected $primaryKey = 'id_prodi';
    protected $fillable = ['nama_prodi'];
    public $timestamps = false;

    public function mahasiswa()
    {
        return $this->hasMany(Mahasiswa::class);
    }
}
