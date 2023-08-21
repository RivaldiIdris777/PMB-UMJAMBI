<?php

namespace App\Http\Controllers;

use App\Models\Gelombang;
use App\Models\DokumenMahasiswa;
use App\Models\Mahasiswa;
use App\Models\User;
use Carbon\Carbon;
use Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Yajra\Datatables\Datatables;
use PDF;
class DokumenMahasiswaController extends Controller
{
    public $title;
    public $folder;


    public function __construct()
    {
        $this->title = 'Data Dokumen Mahasiswa';
        $this->folder = 'admins.dokumenMahasiswa';
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
        //

        if ($request->ajax()) {
            $data = Mahasiswa::select('*');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="' . route('dokumenmahasiswa.show', $row->nik) . '" class="btn btn-sm btn-warning"><i class="fa fa-book"></i> Lihat Dokumen</a>';
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
        //
    }

    public function createDokumen($id) {
        $data = Mahasiswa::where('nik', $id)->first();

        if (Auth::user()->role == 'admin') {
            $link = 'dokumenmahasiswa';
        } else {
            $link = 'biodata';
        }
        return view($this->folder . '.add', [
            'data' => $data,
            'title' => $this->title,
            'link' => $link
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
        $no_registrasi = $request->no_registrasi;
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
            'status_kelengkapan' => [
                'required' => 'Status kelengkapan dokumen harus diisi agar mengetahui kelengkapan dokumen mahasiswa',
            ],
            'keterangan' => [
                'required' => 'Berikan keterangan kekurangan pada data atau dokumen. Jika tidak berikan tanda "-"',
            ],

        ];

        $this->validate($request, [
            'd_ktp' => 'mimes:jpg,jpeg,png',
            'd_kk' => 'mimes:jpg,jpeg,png',
            'dokumen_pendukung' => 'required|mimes:pdf|file|max:5242880',
            'dokumen_wajib' => 'required|mimes:pdf|file|max:5242880',
            'status_kelengkapan' => 'required',
            'keterangan' => 'required',
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
        $compressktp = Image::make($imagektp)->resize(1080, 1080);
        // $compressktp->resize(4000, 6000);
        $compressktp->save(\storage_path($pathktp), 50);

        // d_kk
        $imagekk = $request->file('d_kk');
        $nameKK = $no_registrasi  . "-" . "KK" . "-" . $nama_mahasiswa . "." . $request->file('d_kk')->getClientOriginalExtension();
        $pathKK = 'app/public/kk/' . $nameKK;
        $compresskk = Image::make($imagekk)->resize(1920, 1080);
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
            'd_kk'           => $nameKK,
            'nik'           => $nik_mahasiswa,
            'dokumen_wajib' => $nameDokumenwajib,
            'dokumen_pendukung' => $nameDokumen,
            'status_kelengkapan' => $request->status_kelengkapan,
            'keterangan' => $request->keterangan,
            'id_mahasiswa' => $id_mahasiswa,
        ]);

        if ($simpan) {
            Session::flash('message', "Data Berhasil Disimpan");
        } else {
            Session::flash('message', "Gagal Berhasil Disimpan");
        }

        return redirect()->route('dokumenmahasiswa.show', $data->nik);

        }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Mahasiswa::where('nik', $id)->first();
        $dokumen = DokumenMahasiswa::where('nik', $id)->get();

        return view($this->folder . '.show', [
            'title' => $this->title,
            'data' => $data,
            'dokumen' => $dokumen,
        ]);
    }

    public function dokumenPendukung($id)
    {
        $data = Mahasiswa::where('nik', $id)->first();
        $dokumen = DokumenMahasiswa::where('id', $id)->get();

        $pathDokumen = Storage::path('public/dokumen_pendukung/').$dokumen[0]->dokumen_pendukung;

        return response()->file($pathDokumen);
    }

    public function validasiKTP(DokumenMahasiswa $dokumen, $id)
    {
        $validasi = DokumenMahasiswa::where('nik', $id)->get();

        $validasi[0]->update([
            'tgl_validasi_ktp' => Carbon::now(),
            'ktp_status' => 'Y',
            'email_validasi' => Auth::user()->email,
            'admin_validasi' => Auth::user()->id
        ]);

        $getId = $validasi[0]->nik;

        if ($validasi) {
            Session::flash('message', "Data Berhasil Disimpan");
        } else {
            Session::flash('message', "Gagal Berhasil Disimpan");
        }

        return redirect()->route('dokumenmahasiswa.show', $getId);
    }

    public function validasiKK(DokumenMahasiswa $dokumen, $id)
    {
        $validasi = DokumenMahasiswa::where('nik', $id)->get();

        $validasi[0]->update([
            'tgl_validasi_kk' => Carbon::now(),
            'kk_status' => 'Y',
            'email_validasi' => Auth::user()->email,
            'admin_validasi' => Auth::user()->id
        ]);

        $getId = $validasi[0]->nik;

        if ($validasi) {
            Session::flash('message', "Data Berhasil Disimpan");
        } else {
            Session::flash('message', "Gagal Berhasil Disimpan");
        }

        return redirect()->route('dokumenmahasiswa.show', $getId);
    }

    public function validasiDokumenWajib(DokumenMahasiswa $dokumen, $id)
    {
        $validasi = DokumenMahasiswa::where('nik', $id)->get();

        $validasi[0]->update([
            'tgl_validasi_dokumen_wajib' => Carbon::now(),
            'dokumen_wajib_status' => 'Y',
            'email_validasi' => Auth::user()->email,
            'admin_validasi' => Auth::user()->id

        ]);

        $getId = $validasi[0]->nik;

        if ($validasi) {
            Session::flash('message', "Data Berhasil Disimpan");
        } else {
            Session::flash('message', "Gagal Berhasil Disimpan");
        }

        return redirect()->route('dokumenmahasiswa.show', $getId);
    }

    public function validasiDokumenPendukung(DokumenMahasiswa $dokumen, $id)
    {
        $validasi = DokumenMahasiswa::where('nik', $id)->get();

        $validasi[0]->update([
            'tgl_validasi_dokumen_pendukung' => Carbon::now(),
            'dokumen_pendukung_status' => 'Y',
            'email_validasi' => Auth::user()->email,
            'admin_validasi' => Auth::user()->id

        ]);

        $getId = $validasi[0]->nik;

        if ($validasi) {
            Session::flash('message', "Data Berhasil Disimpan");
        } else {
            Session::flash('message', "Gagal Berhasil Disimpan");
        }

        return redirect()->route('dokumenmahasiswa.show', $getId);
    }

    public function updateKeterangan(DokumenMahasiswa $dokumen, Request $request, $id)
    {
        $validasi = DokumenMahasiswa::where('nik', $id)->get();

        $validasi[0]->update([
            'keterangan' =>$request->keterangan
        ]);

        $getId = $validasi[0]->nik;

        if ($validasi) {
            Session::flash('message', "Data Berhasil Disimpan");
        } else {
            Session::flash('message', "Gagal Berhasil Disimpan");
        }

        return redirect()->route('dokumenmahasiswa.show', $getId);
    }

    // Tolak Validasi
    public function tolakValidasiKtp(DokumenMahasiswa $dokumen, $id)
    {
        $validasi = DokumenMahasiswa::where('nik', $id)->get();

        $validasi[0]->update([
            'tgl_validasi_ktp' => Carbon::now(),
            'ktp_status' => 'Ditolak',
            'email_validasi' => Auth::user()->email,
            'admin_validasi' => Auth::user()->id
        ]);

        $getId = $validasi[0]->nik;

        if ($validasi) {
            Session::flash('message', "Data Berhasil Disimpan");
        } else {
            Session::flash('message', "Gagal Berhasil Disimpan");
        }

        return redirect()->route('dokumenmahasiswa.show', $getId);
    }

    public function tolakValidasiKK(DokumenMahasiswa $dokumen, $id)
    {
        $validasi = DokumenMahasiswa::where('nik', $id)->get();

        $validasi[0]->update([
            'tgl_validasi_ktp' => Carbon::now(),
            'kk_status' => 'Ditolak',
            'email_validasi' => Auth::user()->email,
            'admin_validasi' => Auth::user()->id
        ]);

        $getId = $validasi[0]->nik;

        if ($validasi) {
            Session::flash('message', "Data Berhasil Disimpan");
        } else {
            Session::flash('message', "Gagal Berhasil Disimpan");
        }

        return redirect()->route('dokumenmahasiswa.show', $getId);
    }

    public function tolakValidasiWajib(DokumenMahasiswa $dokumen, $id)
    {
        $validasi = DokumenMahasiswa::where('nik', $id)->get();

        $validasi[0]->update([
            'tgl_validasi_ktp' => Carbon::now(),
            'dokumen_wajib_status' => 'Ditolak',
            'email_validasi' => Auth::user()->email,
            'admin_validasi' => Auth::user()->id
        ]);

        $getId = $validasi[0]->nik;

        if ($validasi) {
            Session::flash('message', "Data Berhasil Disimpan");
        } else {
            Session::flash('message', "Gagal Berhasil Disimpan");
        }

        return redirect()->route('dokumenmahasiswa.show', $getId);
    }

    public function tolakValidasiPendukung(DokumenMahasiswa $dokumen, $id)
    {
        $validasi = DokumenMahasiswa::where('nik', $id)->get();

        $validasi[0]->update([
            'tgl_validasi_ktp' => Carbon::now(),
            'dokumen_pendukung_status' => 'Ditolak',
            'email_validasi' => Auth::user()->email,
            'admin_validasi' => Auth::user()->id
        ]);

        $getId = $validasi[0]->nik;

        if ($validasi) {
            Session::flash('message', "Data Berhasil Disimpan");
        } else {
            Session::flash('message', "Gagal Berhasil Disimpan");
        }

        return redirect()->route('dokumenmahasiswa.show', $getId);
    }

    public function validasikonfirmasiditerima(DokumenMahasiswa $dokumen, $id)
    {
        $simpan = DB::table('tb_dokumenmahasiswa')->where('id', $id)->update([
            'status_dokumen_final' => 'diterima',
        ]);

        $getId = $validasi[0]->nik;

        if ($simpan) {
            Session::flash('message', "Data Berhasil Disimpan");
        } else {
            Session::flash('message', "Gagal Berhasil Disimpan");
        }

        return redirect()->route('dokumenmahasiswa.show', $getId);
    }

    public function validasikonfirmasibelumditerima(DokumenMahasiswa $dokumen, $id)
    {
        $simpan = DB::table('tb_dokumenmahasiswa')->where('id', $id)->update([
            'status_dokumen_final' => 'belum_diterima',
        ]);

        $getId = $validasi[0]->nik;

        if ($simpan) {
            Session::flash('message', "Data Berhasil Disimpan");
        } else {
            Session::flash('message', "Gagal Berhasil Disimpan");
        }

        return redirect()->route('dokumenmahasiswa.show', $getId);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $link = 'dokumenmahasiswa';

        $data = DokumenMahasiswa::where('id', $id)->first();
        return view($this->folder . '.edit', [
            'link' => $link,
            'title' => $this->title,
            'data' => $data,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cekData = DokumenMahasiswa::where('nik', $id)->first();
        $nik = $id;
        $cekMahasiswa = Mahasiswa::where('nik', $nik)->first();
        $no_registrasi = $cekMahasiswa->no_registrasi;

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
            'd_ktp' => 'image',
            'd_kk'  => 'image',
            'dokumen_pendukung' => 'required|mimes:pdf|file|max:5242880',
            'dokumen_wajib' => 'required|mimes:pdf|file|max:5242880',
        ], $message);

        $ktp = Storage::disk('local')->delete('public/ktp/'.basename($cekData->d_ktp));
        $kk = Storage::disk('local')->delete('public/kk/'.basename($cekData->d_kk));
        $dokumen = Storage::disk('local')->delete('public/dokumen_pendukung/'.basename($cekData->dokumen_pendukung));
        $dokumenwajib = Storage::disk('local')->delete('public/dokumen_wajib/'.basename($cekData->dokumen_wajib));

        $date = date('Y-m-d');
        $nama_mahasiswa = $cekMahasiswa->nama_mahasiswa;
        $nik_mahasiswa = $cekMahasiswa->nik;
        $id_mahasiswa = $cekMahasiswa->id;

        // d_kk
        $imagektp = $request->file('d_ktp');
        $nameKtp = $no_registrasi  . "-" . "KTP" . "-" . $nama_mahasiswa . "." . $request->file('d_ktp')->getClientOriginalExtension();
        $pathktp = 'app/public/ktp/' . $nameKtp;
        $compressktp = Image::make($imagektp)->resize(1920, 1080);
        $compressktp->save(\storage_path($pathktp), 30);

        // d_kk
        $imagekk = $request->file('d_kk');
        $nameKK = $no_registrasi  . "-" . "KK" . "-" . $nama_mahasiswa . "." . $request->file('d_kk')->getClientOriginalExtension();
        $pathKK = 'app/public/kk/' . $nameKK;
        $compresskk = Image::make($imagekk)->resize(1920, 1080);
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

        $simpan = DB::table('tb_dokumenmahasiswa')->where('nik', $id)->update([
            'd_ktp'          => $nameKtp,
            'd_kk'           => $nameKK,
            'nik'           => $nik_mahasiswa,
            'dokumen_wajib' => $nameDokumenwajib,
            'dokumen_pendukung' => $nameDokumen,
            'id_mahasiswa' => $id_mahasiswa,
        ]);

        if ($simpan) {
            Session::flash('message', "Data Berhasil Disimpan");
        } else {
            Session::flash('message', "Gagal Berhasil Disimpan");
        }

        return redirect()->route('dokumenmahasiswa.show', $id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mahasiswa = DokumenMahasiswa::findOrFail($id);
        $ktp = Storage::disk('local')->delete('public/ktp/'.basename($mahasiswa->d_ktp));
        $kk = Storage::disk('local')->delete('public/kk/'.basename($mahasiswa->d_kk));
        $dokumen = Storage::disk('local')->delete('public/dokumen_pendukung/'.basename($mahasiswa->dokumen_pendukung));
        $dokumenwajib = Storage::disk('local')->delete('public/dokumen_wajib/'.basename($mahasiswa->dokumen_wajib));
        $mahasiswa->delete();

        if ($mahasiswa) {
            Session::flash('message', "Data Berhasil Disimpan");
        } else {
            Session::flash('message', "Gagal Berhasil Disimpan");
        }

        return redirect()->route('dokumenmahasiswa.index');
    }
}
