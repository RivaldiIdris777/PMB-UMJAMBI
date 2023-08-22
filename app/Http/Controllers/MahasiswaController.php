<?php

namespace App\Http\Controllers;

use App\Models\Agama;
use App\Models\Gelombang;
use App\Models\JalurPendaftaran;
use App\Models\JenjangSekolah;
use App\Models\Mahasiswa;
use App\Models\Prodi;
use App\Models\Provinsi;
use App\Models\ProgramKuliah;
use App\Http\Controllers\WilayahController;
use Carbon\Carbon;
use Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Yajra\Datatables\Datatables;
use PDF;
use Maatwebsite\Excel\Facades\Excel;


class MahasiswaController extends Controller
{
    public $title;
    public $folder;

    public function __construct()
    {
        $this->title = 'Data Mahasiswa';
        $this->folder = 'admins.mahasiswa';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $gelombang = Gelombang::all();
        // dd($request->gelombang);

        if ($request->ajax()) {
            // $data = Mahasiswa::select('*');
            return DataTables::of(Mahasiswa::select('*'))
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="' . route('mahasiswa.show', $row->id) . '" class="btn btn-sm btn-info text-white"><i class="bx bx-show-alt"></i></a>';
                    $btn .= '<a href="' . route('mahasiswa.edit', $row->id) . '" class="btn btn-sm btn-warning text-white"><i class="bx bx-pencil"></i></a>';
                    $btn .= '<a href="' . url('mahasiswa/print/' . $row->id) . '" class="btn btn-sm btn-primary"><i class="bx bx-printer"></i></a>';
                    $btn .= '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" class="btn btn-sm btn-danger deleteMahasiswa"><i class="bx bx-trash-alt"></i></a>';
                    return $btn;
                })
                ->filter(function ($instance) use ($request) {
                    if ($request->get('gelombang') != null) {
                        $instance->where('gelombang', $request->get('gelombang'));
                    }
                    if (!empty($request->get('search'))) {
                        $instance->where(function ($w) use ($request) {
                            $search = $request->get('search');
                            $w->Where('nama_mahasiswa', 'LIKE', "%$search%");
                        });
                    }
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view($this->folder . '.index', ['title' => $this->title, 'gelombang' => $gelombang]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $provinsi = app('App\Http\Controllers\WilayahController')->provinsi();
        $jalur_pendaftaran = JalurPendaftaran::all();
        $agama = Agama::all();
        $jenjang_sekolah = JenjangSekolah::all();
        $programKuliah = ProgramKuliah::all();
        $prodi = Prodi::all();
        $jenis_kelamin = DB::table('tb_jenis_kelamin')->select('*')->get();
        $info_kuliah = DB::table('tb_info_kuliah')->select('*')->get();
        if (Auth::user()->role == 'admin') {
            $link = 'mahasiswa';
        } else {
            $link = 'biodata';
        }

        return view($this->folder . '.add', [
            'link' => $link,
            'info_kuliah' => $info_kuliah,
            'prodi' => $prodi,
            'programKuliah' => $programKuliah,
            'jenjangSekolah' => $jenjang_sekolah,
            'provinsi' => $provinsi,
            'jalur_pendaftaran' => $jalur_pendaftaran,
            'jenis_kelamin' => $jenis_kelamin,
            'agama' => $agama, 'title' => $this->title
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
        return redirect()->route('mahasiswa.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $provinsi = app('App\Http\Controllers\WilayahController')->provinsi();

        if (Auth::user()->role == 'admin') {
            $data = Mahasiswa::where('id', $id)->get();
        }

        $data  =  Mahasiswa::where('id', $id)->get();

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

        return view($this->folder . '.show', [
            'default' => $default,
            'data' => $data,
            'title' => $this->title
        ]);
    }

    public function showbymahasiswa(Mahasiswa $mahasiswa)
    {
        $nik = Auth::user()->nik;

        $cekdata = Mahasiswa::where('nik', $nik)->firstOrFail();

        if($cekdata == null) {
            return redirect()->back();
        }

        $provinsi = app('App\Http\Controllers\WilayahController')->provinsi();

        if (Auth::user()->role == 'user') {
            $cekdata = Mahasiswa::where('nik', $nik)->first();
        }

        $data   =  Mahasiswa::find($cekdata)->firstOrFail();

        $id_prov = $data->id_provinsi;
        $id_kab = $data->id_kabupaten;
        $id_kec = $data->id_kecamatan;
        $id_kel = $data->id_kelurahan;

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

        return view($this->folder . '.biodata2', [
            'default' => $default,
            'data' => $data,
            'title' => $this->title
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // dd($id);
        if (Auth::user()->role == 'user') {

            $data = Mahasiswa::where('nik', $id)->first();

            if(!$data) {
                return redirect()->route();
            }

            $link = 'biodata';

            $provinsi = app('App\Http\Controllers\WilayahController')->provinsi();
            $jalur_pendaftaran = JalurPendaftaran::all();
            $agama = Agama::all();
            $jenjang_sekolah = JenjangSekolah::all();
            $programKuliah = ProgramKuliah::all();
            $prodi = Prodi::all();
            $jenis_kelamin = DB::table('tb_jenis_kelamin')->select('*')->get();
            $info_kuliah = DB::table('tb_info_kuliah')->select('*')->get();

            $data = Mahasiswa::where('nik', $id)->first();

            $id_prov = $data->id_provinsi;
            $id_kab = $data->id_kabupaten;
            $id_kec = $data->id_kecamatan;
            $id_kel = $data->id_kelurahan;

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

            $default = [
                'prov'              => $nama_prov,
                'kab'               => $nama_kab,
                'kec'               => $nama_kec,
                'kel'               => $nama_kel,
            ];

            return view($this->folder . '.edit', [
                'default' => $default,
                'data' => $data,
                'link' => $link,
                'info_kuliah' => $info_kuliah,
                'prodi' => $prodi,
                'programKuliah' => $programKuliah,
                'jenjangSekolah' => $jenjang_sekolah,
                'provinsi' => $provinsi,
                'jalur_pendaftaran' => $jalur_pendaftaran,
                'jenis_kelamin' => $jenis_kelamin,
                'agama' => $agama, 'title' => $this->title
            ]);
        } else {
            $link = 'mahasiswa';
            $provinsi = app('App\Http\Controllers\WilayahController')->provinsi();
            $jalur_pendaftaran = JalurPendaftaran::all();
            $agama = Agama::all();
            $jenjang_sekolah = JenjangSekolah::all();
            $programKuliah = ProgramKuliah::all();
            $prodi = Prodi::all();
            $jenis_kelamin = DB::table('tb_jenis_kelamin')->select('*')->get();
            $info_kuliah = DB::table('tb_info_kuliah')->select('*')->get();

            $data = Mahasiswa::where('id', $id)->first();

            $id_prov = $data->id_provinsi;
            $id_kab = $data->id_kabupaten;
            $id_kec = $data->id_kecamatan;
            $id_kel = $data->id_kelurahan;

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

            $default = [
                'prov'              => $nama_prov,
                'kab'               => $nama_kab,
                'kec'               => $nama_kec,
                'kel'               => $nama_kel,
            ];

            return view($this->folder . '.edit', [
                'default' => $default,
                'data' => $data,
                'link' => $link,
                'info_kuliah' => $info_kuliah,
                'prodi' => $prodi,
                'programKuliah' => $programKuliah,
                'jenjangSekolah' => $jenjang_sekolah,
                'provinsi' => $provinsi,
                'jalur_pendaftaran' => $jalur_pendaftaran,
                'jenis_kelamin' => $jenis_kelamin,
                'agama' => $agama, 'title' => $this->title
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Data $data)
    {
        //
        // dd($request);

        if(Auth::user()->role == 'user') {
            return redirect()->route('mahasiswa.edit');
        }else {
            $mahasiswa = Mahasiswa::findOrFail($data->id);

            if($request->file('image') == "") {

                $messages = [
                    'nik' => [
                        'required' => 'NIK Tidak Boleh Kosong',
                        'unique' => 'NIK Sudah Terdaftar'
                    ],
                    'jalur_pendaftaran' => [
                        'required' => 'Jalur Pendaftaran Tidak Boleh Kosong',
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

                $simpan = DB::table('tb_mahasiswa')->update([
                    'id_jalur_pendaftaran'  => $request->jalur_pendaftaran,
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
                    'id_kelurahan'          => $request->desa,
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
                    'informasi_kuliah'      => $request->informasi_kuliah,
                    'id_program_kuliah'     => $request->id_program_kuliah,
                    'gelombang'             => $gelombang->id_gelombang,
                ]);
            }else {

                //hapus old image
                Storage::disk('local')->delete('public/mahasiswas/'.$data->gambar);

                // Reupload Image
                $image = $request->file('image');

                $path = 'app/public/mahasiswas/' . $image->hashName();

                $compress = Image::make($image)->fit(4000, 6000);

                $compress->save(\storage_path($path), 30);

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

                $simpan = DB::table('tb_mahasiswa')->update([
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
                    'id_kelurahan'          => $request->desa,
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
                    'informasi_kuliah'      => $request->informasi_kuliah,
                    'id_program_kuliah'     => $request->id_program_kuliah,
                    'gelombang'             => $gelombang->id_gelombang,
                ]);
            }

            if ($simpan) {
                Session::flash('message', "Data Berhasil Disimpan");
            } else {
                Session::flash('message', "Gagal Berhasil Disimpan");
            }
            return redirect()->route('mahasiswa.index');
        }
    }

    public function validasiMahasiswa(Request $request, Mahasiswa $mahasiswa, $id)
    {
        $validasi = Mahasiswa::where('id', $id)->get();

        $validasi[0]->update([
            'tgl_validasi' => Carbon::now(),
            'status_validasi' => 'Y',
            'keterangan' => 'Sudah Tervalidasi',
            'admin_validasi' => Auth::user()->id

        ]);

        if ($validasi) {
            Session::flash('message', "Data Berhasil Disimpan");
        } else {
            Session::flash('message', "Gagal Berhasil Disimpan");
        }

        return redirect()->route('mahasiswa.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        // dd($id);

        Storage::disk('local')->delete('public/mahasiswas/'.$mahasiswa->gambar);

        $mahasiswa->delete();

        Session::flash('message', "Data berhasil dihapus");

        return redirect()->route('mahasiswa.index');
    }

    // Extend third person (Print PDF, Export Excel File)
    public function print($id)
    {
        $provinsi = app('App\Http\Controllers\WilayahController')->provinsi();
        if (Auth::user()->role == 'user') {
            $id = Mahasiswa::where('nik', $id)->firstOrFail();
        }
        $data   =  Mahasiswa::find($id)->firstOrFail();

        $id_prov = $data->id_provinsi;
        $id_kab = $data->id_kabupaten;
        $id_kec = $data->id_kecamatan;
        $id_kel = $data->id_kelurahan;

        foreach ($provinsi->data as $value) {
            if ($id_prov == $value->id) {
                $nama_prov = $value->name;
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
                'X-API-KEY: hF2515ZMpVMI8qiy6SXJYRKuOGUsOO'
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
                'X-API-KEY: hF2515ZMpVMI8qiy6SXJYRKuOGUsOO'
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
                'X-API-KEY: hF2515ZMpVMI8qiy6SXJYRKuOGUsOO'
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
            }else {
                $nama_kel = "-";
            }
        }
        // dd($nama_kel);

        // cetak formulir
        if ($data) {

            $logo_um    = base64_encode(file_get_contents('logo_um.png'));
            $logo_km    = base64_encode(file_get_contents('logo_kampus_merdeka.png'));
            $logo_pmb   = base64_encode(file_get_contents('logo_pmb.png'));
            $ceklis     = base64_encode(file_get_contents('ceklis.png'));
            $kotak      = base64_encode(file_get_contents('kotak.png'));

            $default = [
                'kotak'             => $kotak,
                'prov'              => $nama_prov,
                'kab'               => $nama_kab,
                'kec'               => $nama_kec,
                'kel'               => $nama_kel,
                'ceklis'            => $ceklis,
                'logo_um'           => $logo_um,
                'logo_km'           => $logo_km,
                'logo_pmb'          => $logo_pmb,
                'tanggal_formulir'  => Carbon::now()->isoFormat('D MMMM Y'),
            ];

            $pdf    = PDF::loadView('cetak.template-formulir', ['data' => $data, 'default' => $default])->setPaper([0, 0, 609.4488, 935.433], 'portrait')->setOptions(['defaultFont' => 'serif',]);

            $pdf->output();

            $canvas = $pdf->getDomPDF()->getCanvas();

            $height = $canvas->get_height();
            $width = $canvas->get_width();

            $canvas->set_opacity(.5, "Multiply");

            $canvas->set_opacity(.5);

            // Specify watermark image
            $imageURL = 'watermark.png';
            $imgWidth = 540;
            $imgHeight = null;

            $canvas->image($imageURL, $width / 20, $height / 1.2, $imgWidth, $imgHeight);
            return $pdf->stream();
        } else {
            Session::flash('message', "Data Tidak Ada");
            return redirect('/mahasiswa');
        }
    }

}
