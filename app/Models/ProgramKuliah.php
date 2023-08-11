<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramKuliah extends Model
{
    use HasFactory;
    protected $table = 'tb_program_kuliah';
    protected $primaryKey = 'id_program_kuliah';
    protected $fillable = [];
    public $timestamps = false;

    public function mahasiswa()
    {
        return $this->hasMany(Mahasiswa::class);
    }
}
