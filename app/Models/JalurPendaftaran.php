<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JalurPendaftaran extends Model
{
    use HasFactory;
    protected $table = 'tb_jalur_pendaftaran';
    protected $primaryKey = 'id_jalur_pendaftaran';
    protected $fillable = [
        'nama_jalur_pendaftaran',
        'statusjalur_pendaftaran',
    ];
    public $timestamps = false;

    public function mahasiswa()
    {
        return $this->hasMany(Mahasiswa::class);
    }
}
