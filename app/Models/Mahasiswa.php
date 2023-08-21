<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Mahasiswa extends Model
{
    use HasFactory;
    protected $table = 'tb_mahasiswa';
    protected $primaryKey = 'id';
    protected $fillable = [
        'tgl_validasi',
        'status_validasi',
        'keterangan',
        'admin_validasi'
    ];
    public $timestamps = true;

    public function agama()
    {
        return $this->belongsTo(Agama::class, 'agama', 'id');
    }
    public function jenjang_sekolah()
    {
        return $this->hasOne(JenjangSekolah::class, 'id', 'id_asal_sekolah');
    }
    public function prodi1()
    {
        return $this->hasOne(Prodi::class, 'id_prodi', 'prodi1');
    }
    public function prodi2()
    {
        return $this->hasOne(Prodi::class, 'id_prodi', 'prodi2');
    }
    public function program_kuliah()
    {
        return $this->hasOne(ProgramKuliah::class, 'id_program_kuliah', 'id_program_kuliah');
    }
    public function jalurmasuk()
    {
        return $this->hasOne(Jalurmasuk::class,'id_jalur_pendaftaran','id_jalur_pendaftaran');
    }

    public function jalurpendaftaran()
    {
        return $this->belongsTo(Jalurpendaftaran::class, 'id_jalur_pendaftaran','id_jalur_pendaftaran');
    }

    public function jeniskelamin()
    {
        return $this->belongsTo(JenisKelamin::class, 'jenis_kelamin', 'id');
    }

    public function provinsi()
    {
        return $this->belongsTo(Provinsi::class, 'id_provinsi', 'id');
    }

    public function informasikuliah()
    {
        return $this->hasOne(InformasiKuliah::class, 'id', 'informasi_kuliah');
    }

    public function gelombang()
    {
        return $this->belongsTo(Gelombang::class, 'gelombang', 'id_gelombang');
    }

    public function admin_validasi()
    {
        return $this->hasOne(User::class, 'id', 'admin_validasi');
    }

    public function dokumen()
    {
        return $this->hasOne(DokumenMahasiswa::class, 'nik', 'nik');
    }

    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => asset('/storage/mahasiswas/' . $value),
        );
    }
}
