<?php

namespace App\Http\Controllers;

use App\Models\Agama;
use App\Models\Gelombang;
use App\Models\JalurPendaftaran;
use App\Models\JenjangSekolah;
use App\Models\User;
use App\Models\Transaksi;
use App\Models\Mahasiswa;
use App\Models\Prodi;
use App\Models\ProgramKuliah;
use Carbon\Carbon;
use App\Models\DokumenMahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Yajra\Datatables\Datatables;
use PDF;

class MenuUserController extends Controller
{
    public $title;
    public $folder;

    public function __construct()
    {
        $this->title = 'Lengkapi Berkas';
        $this->folder = 'users.menu';
    }


    public function MenuRegistrasi() {
        // get user data
        $user = User::where('id', Auth::user()->id)->get();

        // get transaksi data
        $transaksi = Transaksi::where('id_user', $user[0]->id)->get();

        // get mahasiswa data
        $mahasiswa =  Mahasiswa::where('email', $user[0]->email)->get();

        $dokumenMahasiswa = DokumenMahasiswa::where('nik', $user[0]->nik)->get();

        return view($this->folder . '.index', [
            'title' => $this->title,
            'transaksi' => $transaksi,
            'mahasiswa' => $mahasiswa,
            'dokumenMahasiswa' => $dokumenMahasiswa
        ]);
    }

    public function viewTransaksi(){
        $folder = 'users.transaksi';
        $title = 'Konfirmasi Pembayaran';

        // get user data
        $user = User::where('id', Auth::user()->id)->get();

        // get transaksi data
        $transaksi = Transaksi::where('id_user', $user[0]->id)->get();

        return view($folder . '.index', [
            'title' => $title,
            'transaksi' => $transaksi,
        ]);
    }

    // Transaksi
    public function showTransaksi($id) {
        $title = 'Detail Transaksi';
        $folder = 'users.menu';

        $link = 'transaksi';

        $transaksi = Transaksi::where('id', $id)->first();

        return view($this->folder.'.showtransaksi', [
            'title' => $title,
            'transaksi' => $transaksi,
            'link' => $link
        ]);
    }

    // Mahasiswa
    public function createMahasiswa()
    {
        $folder = 'users.mahasiswa';
        $title = 'Daftar Calon Mahasiswa';
        $link = 'mahasiswa';

        $provinsi = app('App\Http\Controllers\WilayahController')->provinsi();
        $jalur_pendaftaran = JalurPendaftaran::all();
        $agama = Agama::all();
        $jenjang_sekolah = JenjangSekolah::all();
        $programKuliah = ProgramKuliah::all();
        $prodi = Prodi::all();
        $jenis_kelamin = DB::table('tb_jenis_kelamin')->select('*')->get();
        $info_kuliah = DB::table('tb_info_kuliah')->select('*')->get();

        return view($folder . '.add', [
            'link' => $link,
            'info_kuliah' => $info_kuliah,
            'prodi' => $prodi,
            'programKuliah' => $programKuliah,
            'jenjangSekolah' => $jenjang_sekolah,
            'provinsi' => $provinsi,
            'jalur_pendaftaran' => $jalur_pendaftaran,
            'jenis_kelamin' => $jenis_kelamin,
            'agama' => $agama,
            'title' => $title
        ]);
    }

    public function storeMahasiswa(Request $request)
    {
        $messages = [
            'nik' => [
                'required' => 'NIK Tidak Boleh Kosong',
                'unique' => 'NIK Sudah Terdaftar'
            ],
            'jalur_pendaftaran' => [
                'required' => 'Jalur Pendaftaran Tidak Boleh Kosong',
            ],
            'image' => [
                'required' => 'Gambar tidak boleh kosong',
                'jpeg'      => 'Gambar harus format jpeg,jpg,png',
                'jpg'      => 'Gambar harus format jpeg,jpg,png',
                'png'      => 'Gambar harus format jpeg,jpg,png',
            ],
            'nisn' => [
                'required' => 'NISN Tidak Boleh Kosong',
            ],
            'nama' => [
                'required' => 'Nama Lengkap Tidak Boleh Kosong',
            ],
            'tempat_lahir' => [
                'required' => 'Tempat Lahir Tidak Boleh Kosong',
            ],
            'tanggal_lahir' => [
                'required' => 'Tanggal Lahir Tidak Boleh Kosong',
            ],
            'agama' => [
                'required' => 'Agama Tidak Boleh Kosong',
            ],
            'jenis_kelamin' => [
                'required' => 'Jenis Kelamin Tidak Boleh Kosong',
            ],
            'provinsi' => [
                'required' => 'Provinsi Tidak Boleh Kosong',
            ],
            'kota' => [
                'required' => 'Kota/kabupaten Tidak Boleh Kosong',
            ],
            'kecamatan' => [
                'required' => 'Kecamatan Tidak Boleh Kosong',
            ],
            'kelurahan' => [
                'required' => 'Kelurahan Tidak Boleh Kosong',
            ],
            'jalan' => [
                'required' => 'Jalan Tidak Boleh Kosong',
            ],
            'rt' => [
                'required' => 'RT/RW Tidak Boleh Kosong',
            ],
            'hp' => [
                'required' => 'Nomor Handphone/WhatsApp Tidak Boleh Kosong',
                'numeric' => 'Nomor Handphone/WhatsApp Harus Angka',
            ],
            'email' => [
                'required' => 'Email Tidak Boleh Kosong',
                'email' => 'Email Tidak Valid'
            ],
            'prodi1' => [
                'required' => 'Program Studi Pertama Tidak Boleh Kosong',
            ],
            'prodi2' => [
                'required' => 'Program Studi Kedua Tidak Boleh Kosong',
                'different' => 'Program Studi Kedua Tidak Boleh Sama',
            ],
            'id_program_kuliah' => [
                'required' => 'Program Perkuliahan Tidak Boleh Kosong',
            ],
            'ayah' => [
                'required' => 'Nama Ayah/Wali Tidak Boleh Kosong',
            ],
            'ibu' => [
                'required' => 'Nama Ibu/Wali Tidak Boleh Kosong',
            ],
            'alamat_ortu' => [
                'required' => 'Alamat Orang Tua/Wali Tidak Boleh Kosong',
            ],
            'jenis_sekolah' => [
                'required' => 'Jenis Sekolah Tidak Boleh Kosong',
            ],
            'asal_sekolah' => [
                'required' => 'Asal Sekolah Tidak Boleh Kosong',
            ],
            'jurusan' => [
                'required' => 'Jurusan Sekolah Tidak Boleh Kosong',
            ],
            'tahun_lulus' => [
                'required' => 'Tahun Lulus Tidak Boleh Kosong',
            ],
            'alamat_sekolah' => [
                'required' => 'Alamat Sekolah Tidak Boleh Kosong',
                'min' => 'Minimal Huruf :attribute',
            ],

        ];

        $this->validate($request, [
            'jalur_pendaftaran' => 'required',
            'image' => 'required|image|mimes:jpeg,jpg,png',
            'nik' => 'required|unique:tb_mahasiswa,nik,nik,nik',
            'nisn' => 'required',
            'nama' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'agama' => 'required',
            'jenis_kelamin' => 'required',
            'provinsi' => 'required',
            'kota' => 'required',
            'kecamatan' => 'required',
            'kelurahan' => 'required',
            'jalan' => 'required',
            'rt' => 'required',
            'hp' => 'required|numeric',
            'email' => 'required|email',
            'jenis_sekolah' => 'required',
            'asal_sekolah' => 'required',
            'jurusan' => 'required',
            'tahun_lulus' => 'required',
            'alamat_sekolah' => 'required|min:6',
            'ayah' => 'required',
            'ibu' => 'required',
            'alamat_ortu' => 'required|min:6',
            'info_kuliah' => 'required',
            'id_program_kuliah' => 'required',
            'prodi1' => 'required',
            'prodi2' => 'required|different:prodi1',

        ], $messages);

        $image = $request->file('image');

        $path = 'app/public/mahasiswas/' . $image->hashName();

        $compress = Image::make($image)->fit(4000, 6000);

        $compress->save(\storage_path($path), 30);


        $awal = date('Y');
        $kode_prodi = $request->prodi1;
        $kode_program_kuliah = sprintf("%02s", $request->id_program_kuliah);
        $nourutakhir = DB::table('tb_mahasiswa')->select('no_registrasi')->orderBy('id', 'desc')->first();
        // dd($nourutakhir);

        $no = 1;
        if ($nourutakhir) {

            // substr()
            $nobaru = substr($nourutakhir->no_registrasi, -4);
            $no_registrasi = $awal . "-" . $kode_prodi . "-" . $kode_program_kuliah . "-" . sprintf("%04s", abs($nobaru + 1));
        } else {
            $no_registrasi = $awal . "-" . $kode_prodi . "-" . $kode_program_kuliah . "-" . sprintf("%04s", $no);
        }

        // dd($no_registrasi);

        $gelombang = DB::table('tb_gelombang')->where('status_gelombang', '=', 'Y')->first();

        $cek_data = DB::table('tb_mahasiswa')->where('nik', '=', $request->nik)->get();

        // dd($cek_data);

        if (count($cek_data) > 0) {
            DB::table('tb_mahasiswa')->where('nik', '=', $request->nik)->delete();
        }

        $simpan = DB::table('tb_mahasiswa')->insert([
            'id_jalur_pendaftaran'  => $request->jalur_pendaftaran,
            'gambar'                => $image->hashName(),
            'no_registrasi'         => $no_registrasi,
            'nik'                   => $request->nik,
            'nisn'                  => $request->nisn,
            'nama_mahasiswa'        => $request->nama,
            'tempat_lahir'          => $request->tempat_lahir,
            'tanggal_lahir'         => date('Y-m-d', strtotime(str_replace('/', '-', $request->tanggal_lahir))),
            'jenis_kelamin'         => $request->jenis_kelamin,
            'agama'                 => $request->agama,
            'id_provinsi'           => $request->provinsi,
            'id_kabupaten'          => $request->kota,
            'id_kecamatan'          => $request->kecamatan,
            'id_kelurahan'          => $request->kelurahan,
            'rt'                    => $request->rt,
            'jalan'                 => $request->jalan,
            'hp'                    => $request->hp,
            'email'                 => $request->email,
            'id_asal_sekolah'       => $request->jenis_sekolah,
            'nama_sekolah'          => $request->asal_sekolah,
            'alamat_sekolah'        => $request->alamat_sekolah,
            'jurusan_sekolah'       => $request->jurusan,
            'tahun_lulus'           => $request->tahun_lulus,
            'prodi1'                => $request->prodi1,
            'prodi2'                => $request->prodi2,
            'nama_instansi'         => $request->pekerjaan,
            'jabatan'               => $request->jabatan,
            'nama_ayah'             => $request->ayah,
            'nama_ibu'              => $request->ibu,
            'alamat_orangtua'       => $request->alamat_ortu,
            'informasi_kuliah'      => $request->info_kuliah,
            'id_program_kuliah'     => $request->id_program_kuliah,
            'gelombang'             => $gelombang->id_gelombang,
        ]);
        if ($simpan) {
            Session::flash('message', "Data Berhasil Disimpan");
        } else {
            Session::flash('message', "Gagal Berhasil Disimpan");
        }

        return redirect()->route('usermenu.index');
    }

    public function showMahasiswa(Mahasiswa $mahasiswa, $id)
    {
        $folder = 'admins.mahasiswa';
        $title = 'Detail Pendaftaran Calon Mahasiswa';

        $provinsi = app('App\Http\Controllers\WilayahController')->provinsi();

        $data   =  Mahasiswa::where('id', $id)->get();

        $id_prov = $data[0]->id_provinsi;
        $id_kab = $data[0]->id_kabupaten;
        $id_kec = $data[0]->id_kecamatan;
        $id_kel = $data[0]->id_kelurahan;

        foreach ($provinsi->data as $value) {
            if ($id_prov == $value->id) {
                $nama_prov = $value->name;
            }else {
                $nama_kel = 'Belum Diisi';
            }
        }

        // dd($nama_prov);

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

        // dd($data_kab);

        foreach ($data_kab->data as $value) {
            if ($id_kab == $value->id) {
                $nama_kab = $value->name;
            }else {
                $nama_kel = 'Belum Diisi';
            }
        }

        // dd($nama_kab);

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

        // dd($nama_kec);

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

        // dd($nama_kel);

        $default = [
            'prov'              => $nama_prov,
            'kab'               => $nama_kab,
            'kec'               => $nama_kec,
            'kel'               => $nama_kel,
        ];

        return view($folder . '.biodata', [
            'default' => $default,
            'data' => $data,
            'title' => $this->title
        ]);
    }

    // Dokumen Mahasiswa
    public function createDokumen()
    {
        $folder = 'users.dokumenmahasiswa';
        $link = 'mahasiswa';
        $title = 'Upload Berkas Persyaratan Calon Mahasiswa';
        return view($folder . '.add', [
            'title' => $title,
            'link' => $link
        ]);
    }

    public function storeDokumen(Request $request)
    {
        $id = Mahasiswa::where('email', $request->email)->get();

        $no_registrasi = $id[0]->no_registrasi;

        $data = Mahasiswa::where('no_registrasi', $no_registrasi)->first();

        $message = [
            'd_ktp' => [
                'jpeg' => 'File KTP Wajib di upload Format Jpg, PNG, Jpeg',
                'jpg' => 'File KTP Wajib di upload Jpg, PNG, Jpeg',
                'png' => 'File KTP Wajib di upload Jpg, PNG, Jpeg'
            ],
            'd_kk' => [
                'jpeg' => 'File KK Wajib di upload Format Jpg, PNG, Jpeg',
                'jpg' => 'File KK Wajib di upload Jpg, PNG, Jpeg',
                'png' => 'File KK Wajib di upload Jpg, PNG, Jpeg'
            ],
            'dokumen_wajib' => [
                'required' => 'Harus memasukkan file dokumen wajib',
                'pdf' => 'File Harus Format PDF',
                'size:5120' => 'Maksimum File 5 mb'
            ],
            'dokumen_pendukung' => [
                'required' => 'Harus memasukkan file dokumen pendukung',
                'pdf' => 'File Harus Format PDF',
                'size:5120' => 'Maksimum File 5 mb'
            ],

        ];

        $this->validate($request, [
            'd_ktp' => 'mimes:jpg,jpeg,png',
            'd_kk' => 'mimes:jpg,jpeg,png',
            'dokumen_pendukung' => 'required|mimes:pdf|file|max:5242880',
            'dokumen_wajib' => 'required|mimes:pdf|file|max:5242880',
        ]);

        $date = date('Y-m-d');
        $no_registrasi = $data->no_registrasi;
        $nama_mahasiswa = $data->nama_mahasiswa;
        $nik_mahasiswa = $data->nik;
        $id_mahasiswa = $data->id;

        // d_ktp
        $imagektp = $request->file('d_ktp');
        $nameKtp = $no_registrasi  . "-" . "KTP" . "-" . $nama_mahasiswa . "." . $request->file('d_ktp')->getClientOriginalExtension();
        $pathktp = 'app/public/ktp/'.$nameKtp;
        $compressktp = Image::make($imagektp)->fit(1920, 1080);
        // $compressktp->resize(4000, 6000);
        $compressktp->save(\storage_path($pathktp), 50);

        // d_kk
        $imagekk = $request->file('d_kk');
        $nameKK = $no_registrasi  . "-" . "KK" . "-" . $nama_mahasiswa . "." . $request->file('d_kk')->getClientOriginalExtension();
        $pathKK = 'app/public/kk/' . $nameKK;
        $compresskk = Image::make($imagekk)->fit(1080, 1000);
        // $compresskk->resize(4000, 6000);
        $compresskk->save(\storage_path($pathKK), 30);

        // dokumen_kelengkapan
        $dokumen = $request->file('dokumen_pendukung');
        $nameDokumen = $no_registrasi  . "-" . "dokumen_pendukung" . "-" . $nama_mahasiswa . "." . $request->file('dokumen_pendukung')->getClientOriginalExtension();
        $pathDokumen = 'public/dokumen_pendukung';
        $dokumen->storeAs($pathDokumen, $nameDokumen);

        // dokumen_wajib
        $dokumenwajib = $request->file('dokumen_wajib');
        $nameDokumenwajib = $no_registrasi  . "-" . "dokumen_wajib" . "-" . $nama_mahasiswa . "." . $request->file('dokumen_wajib')->getClientOriginalExtension();
        $pathDokumenwajib = 'public/dokumen_wajib';
        $dokumenwajib->storeAs($pathDokumenwajib, $nameDokumenwajib);

        $simpan = DB::table('tb_dokumenmahasiswa')->insert([
            'd_ktp'          => $nameKtp,
            'tgl_upload_ktp' => Carbon::now(),
            'd_kk'           => $nameKK,
            'tgl_upload_kk' => Carbon::now(),
            'nik'           => $nik_mahasiswa,
            'dokumen_wajib' => $nameDokumenwajib,
            'tgl_upload_dokumen_wajib' => Carbon::now(),
            'dokumen_pendukung' => $nameDokumen,
            'tgl_upload_dokumen_pendukung' => Carbon::now(),
            'id_mahasiswa' => $id_mahasiswa,
        ]);

        if ($simpan) {
            Session::flash('message', "Data Berhasil Disimpan");
        } else {
            Session::flash('message', "Gagal Berhasil Disimpan");
        }

        return redirect()->route('usermenu.index');
    }

    public function showDokumen($id)
    {
        $folder = 'users.dokumenMahasiswa';
        $title = 'Detail File Calon Mahasiswa';

        $data = Mahasiswa::where('nik', $id)->first();
        $dokumen = DokumenMahasiswa::where('nik', $id)->get();

        return view($folder . '.show', [
            'title' => $title,
            'data' => $data,
            'dokumen' => $dokumen,
        ]);
    }
}
