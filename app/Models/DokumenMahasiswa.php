<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DokumenMahasiswa extends Model
{
    use HasFactory;
    protected $table = 'tb_dokumenmahasiswa';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_mahasiswa',
        'nik',
        'd_ktp',
        'tgl_upload_ktp',
        'tgl_validasi_ktp',
        'ktp_status',
        'd_kk',
        'tgl_upload_kk',
        'tgl_validasi_kk',
        'kk_status',
        'dokumen_wajib',
        'tgl_upload_dokumen_wajib',
        'tgl_validasi_dokumen_wajib',
        'dokumen_wajib_status',
        'dokumen_pendukung',
        'tgl_upload_dokumen_pendukung',
        'tgl_validasi_dokumen_pendukung',
        'dokumen_pendukung_status',
        'status_kelengkapan',
        'keterangan',
        'email_validasi',
        'admin_validasi'
    ];
    public $timestamps = false;
    public $incrementing = false;

    public function mahasiswa()
    {
        return $this->hasMany(Mahasiswa::class);
    }

    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_validasi', 'id');
    }

    protected function ktp(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => asset('/storage/ktp/' . $value),
        );
    }

    protected function kk(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => asset('/storage/kk/' . $value),
        );
    }

    protected function pdf(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => asset('/storage/pdf/' . $value),
        );
    }


}
