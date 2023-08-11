<?php

namespace App\Exports;

use App\Models\Mahasiswa;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class GelombangKeduaExport implements FromCollection, ShouldAutoSize, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $data = Mahasiswa::where('gelombang', 2)->get();
        return $data;
    }

    public function map($mahasiswa): array
    {

        $provinsi = app('App\Http\Controllers\WilayahController')->provinsi();

        $id_prov = $mahasiswa->id_provinsi;
        $id_kab = $mahasiswa->id_kabupaten;
        $id_kec = $mahasiswa->id_kecamatan;
        $id_kel = $mahasiswa->id_kelurahan;

        foreach ($provinsi->data as $value) {
            if ($id_prov == $value->id) {
                $nama_prov = $value->name;
            }else {
                $nama_kel = 'Belum Diisi';
            }
        }

        // get kabupaten
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.goapi.id/v1/regional/kota?provinsi_id=" . $id_prov,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_TIMEOUT => 30000,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                // Set Here Your Requesred Headers
                'Content-Type: application/json',
                'X-API-KEY: nMoMuNvRpOw1GkiKN3S1BGXND3QGRO'
            ),
        ));
        if (curl_error($curl)) {
            $data_kab = curl_error($curl);
        } else {
            $data_kab = curl_exec($curl);
        }
        curl_close($curl);
        $data_kab = json_decode($data_kab);

        foreach ($data_kab->data as $value) {
            if ($id_kab == $value->id) {
                $nama_kab = $value->name;
            }else {
                $nama_kel = 'Belum Diisi';
            }
        }

        // get kecamatan
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.goapi.id/v1/regional/kecamatan?kota_id=" . $id_kab,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_TIMEOUT => 30000,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                // Set Here Your Requesred Headers
                'Content-Type: application/json',
                'X-API-KEY: nMoMuNvRpOw1GkiKN3S1BGXND3QGRO'
            ),
        ));
        if (curl_error($curl)) {
            $data_kec = curl_error($curl);
        } else {
            $data_kec = curl_exec($curl);
        }
        curl_close($curl);
        $data_kec = json_decode($data_kec);

        // dd($data_kec);

        foreach ($data_kec->data as $value) {
            if ($id_kec == $value->id) {
                $nama_kec = $value->name;
            }
        }

        // get kelurahan
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.goapi.id/v1/regional/kelurahan?kecamatan_id=" . $id_kec,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_TIMEOUT => 30000,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                // Set Here Your Requesred Headers
                'Content-Type: application/json',
                'X-API-KEY: nMoMuNvRpOw1GkiKN3S1BGXND3QGRO'
            ),
        ));
        if (curl_error($curl)) {
            $data_kel = curl_error($curl);
        } else {
            $data_kel = curl_exec($curl);
        }
        curl_close($curl);
        $data_kel = json_decode($data_kel);

        // dd($data_kel);

        foreach ($data_kel->data as $value) {
            if ($id_kel == $value->id) {
                $nama_kel = $value->name;
            }
        }

        $default = [
            'prov'              => $nama_prov,
            'kab'               => $nama_kab,
            'kec'               => $nama_kec,
            'kel'               => $nama_kel,
        ];

        return [
            $mahasiswa->id,
            $mahasiswa->no_registrasi,
            $mahasiswa->jalurmasuk()->first()->nama_jalur_pendaftaran,
            $mahasiswa->nama_mahasiswa,
            $this->formatNumberAsText($mahasiswa->nik),
            $mahasiswa->nisn,
            $mahasiswa->tempat_lahir,
            $mahasiswa->tanggal_lahir,
            $mahasiswa->jeniskelamin()->first()->name,
            $mahasiswa->agama()->first()->name,
            $mahasiswa->hp,
            $mahasiswa->email,
            $mahasiswa->jalan,
            $mahasiswa->rt,
            $default['kel'],
            $default['kec'],
            $default['kab'],
            $default['prov'],
            $mahasiswa->program_kuliah()->first()->nama_program_kuliah,
            $mahasiswa->prodi1()->first()->nama_prodi,
            $mahasiswa->prodi2()->first()->nama_prodi,
            $mahasiswa->nama_instansi,
            $mahasiswa->jabatan,
            $mahasiswa->jenjang_sekolah()->first()->nama,
            $mahasiswa->nama_sekolah,
            $mahasiswa->alamat_sekolah,
            $mahasiswa->jurusan_sekolah,
            $mahasiswa->tahun_lulus,
            $mahasiswa->nama_ayah,
            $mahasiswa->nama_ibu,
            $mahasiswa->alamat_orangtua,
            $mahasiswa->informasikuliah()->first()->nama,
            $mahasiswa->tgl_validasi,
            $mahasiswa->status_validasi,
            $mahasiswa->keterangan,
            $mahasiswa->gelombang()->first()->nama_gelombang,
            $mahasiswa->admin_validasi()->first()->name
        ];
    }

    public function headings(): array
    {
        return [
            '#',
            'Nomor Registrasi',
            'Jalur Masuk',
            'Nama Mahasiswa',
            'NIK',
            'NISN',
            'Tempat Lahir',
            'Tanggal Lahir',
            'Jenis Kelamin',
            'Agama',
            'Nomor Handphone',
            'Email',
            'Jalan',
            'RT',
            'Kelurahan',
            'Kecamatan',
            'Kabupaten',
            'Provinsi',
            'Program Kuliah',
            'Prodi_1',
            'Prodi_2',
            'Nama Instansi',
            'Jabatan',
            'Asal Sekolah',
            'Nama Sekolah',
            'Alamat Sekolah',
            'Jurusan Sekolah',
            'Tahun Lulus',
            'Nama Ayah',
            'Nama Ibu',
            'Alamat Orang Tua',
            'Informasi Kuliah',
            'Tanggal Validasi',
            'Status Validasi',
            'Keterangan',
            'Gelombang',
            'Admin Validasi'
        ];
    }

    private function formatNumberAsText($value)
    {
        // Format the number as text with two decimal places
        return "'" . number_format($value, 0, '', '');
    }
}
