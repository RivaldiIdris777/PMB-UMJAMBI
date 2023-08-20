<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $table = 'tb_transaksi';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_user',
        'jumlah_pembayaran',
        'berkas',
        'id_program_kuliah',
        'id_prodi',
        'tanggal_upload',
        'tanggal_validasi',
        'status_validasi',
        'operator_validasi'

    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function programstudi()
    {
        return $this->hasOne(Prodi::class, 'id_prodi', 'id_prodi');
    }

    public function programkuliah()
    {
        return $this->hasOne(ProgramKuliah::class, 'id_program_kuliah', 'id_program_kuliah');
    }

    public function operatorvalidasi()
    {
        return $this->hasOne(User::class, 'id', 'operator_validasi');
    }

}
