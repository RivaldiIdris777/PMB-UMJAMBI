<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Mahasiswa;
use App\Models\Prodi;
use App\Models\User;
use App\Models\ProgramKuliah;
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

class TransaksiController extends Controller
{
    public $title;
    public $folder;

    public function __construct()
    {
        $this->title = 'Data Transaksi';
        $this->folder = 'admins.transaksi';
        $this->folderuser = 'users.transaksi';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // Sudah Divalidasi
    public function index(Request $request)
    {
        if ($request->ajax()) {
            // $data = Mahasiswa::select('*');
            return DataTables::of(Transaksi::where('status_validasi', 'Y'))
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="' . route('transaksi.show', $row->id) . '" class="btn btn-sm btn-info"><i class="fa fa-eye"></i></a>';
                    $btn .= '<a href="' . route('transaksi.edit', $row->id) . '" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i></a>';
                    $btn .= '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" class="btn btn-sm btn-danger transaksi"><i class="fa fa-trash"></i></a>';
                    return $btn;
                })
                ->editColumn('id_user', function($row) {
                    $td = $row->user()->first()->name;
                    return $td;
                })
                ->editColumn('status_validasi', function($row){
                    $td = $row->status_validasi==='Y' ? 'Sudah Divalidasi' : 'Belum Divalidasi';
                    return $td;
                })
                ->filter(function ($instance) use ($request) {
                    if (!empty($request->get('search'))) {
                        $instance->where(function ($w) use ($request) {
                            $search = $request->get('search');
                            $w->Where('status_validasi', 'LIKE', "%$search%");
                        });
                    }
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view($this->folder . '.index', ['title' => $this->title]);
    }

    public function belumvalidasi(Request $request)
    {
        if ($request->ajax()) {
            // $data = Mahasiswa::select('*');
            return DataTables::of(Transaksi::where('status_validasi', 'N'))
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="' . route('transaksi.show', $row->id) . '" class="btn btn-sm btn-info"><i class="fa fa-eye"></i></a>';
                    $btn .= '<a href="' . route('transaksi.edit', $row->id) . '" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i></a>';
                    $btn .= '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" class="btn btn-sm btn-danger transaksi"><i class="fa fa-trash"></i></a>';
                    return $btn;
                })
                ->editColumn('id_user', function($row) {
                    $td = $row->user()->first()->name;
                    return $td;
                })
                ->editColumn('status_validasi', function($row){
                    $td = $row->status_validasi==='Y' ? 'Sudah Divalidasi' : 'Belum Divalidasi';
                    return $td;
                })
                ->filter(function ($instance) use ($request) {
                    if (!empty($request->get('search'))) {
                        $instance->where(function ($w) use ($request) {
                            $search = $request->get('search');
                            $w->Where('status_validasi', 'LIKE', "%$search%");
                        });
                    }
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view($this->folder . '.belumvalidasi', ['title' => $this->title]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $link = 'transaksi';

        $prodi = Prodi::all();
        $program_kuliah = ProgramKuliah::all();

        return view($this->folder . '.add', [
            'title' => $this->title,
            'prodi' => $prodi,
            'program_kuliah' => $program_kuliah,
            'link' => $link
        ]);
    }

    public function createByUser()
    {
        if(Auth::user()->role == 'admin'){
            return redirect()->route()->back();
        }else{
        $link = 'transaksi';

        $prodi = Prodi::all();
        $program_kuliah = ProgramKuliah::all();

        return view($this->folderuser . '.add', [
            'title' => $this->title,
            'prodi' => $prodi,
            'program_kuliah' => $program_kuliah,
            'link' => $link
        ]);
        }


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $iduser = User::where('id', $request->id_user)->get();

        $messages = [
            'id_user' => [
                'required' => 'Id User harus diisi',
            ],
            'jumlah_pembayaran' => [
                'required' => 'Biaya pembayaran harus diisi',
            ],
            'berkas' => [
                'required' => 'Berkas harus diisi',
                'max' => 'Size maksimal 5 mb'
            ],
            'id_program_kuliah' => [
                'required' => 'Program kuliah harus diisi',
            ],
            'id_prodi' => [
                'required' => 'Program studi harus diisi',
            ],
        ];

        $this->validate($request, [
            'id_user'           => 'required',
            'jumlah_pembayaran' => 'required',
            'berkas'            => 'required|mimes:jpg,jpeg,png|max:5242880',
            'id_program_kuliah' => 'required',
            'id_prodi'          => 'required'
        ], $messages);

        // dd($request);

        $nikuser = $iduser[0]->nik;
        $emailUser = $iduser[0]->email;

        $imageberkas = $request->file('berkas');
        $nameBukti = $nikuser . "-" . "Bukti_Pembayaran" . "-" . $emailUser . "." . $request->file('berkas')->getClientOriginalExtension();
        $path = 'app/public/bukti_pembayaran/'. $nameBukti;
        $compressBukti = Image::make($imageberkas)->fit(1080, 1080);
        $compressBukti->save(\storage_path($path), 80);

        $simpan = DB::table('tb_transaksi')->insert([
            'id_user'           => $request->id_user,
            'jumlah_pembayaran' => $request->jumlah_pembayaran,
            'berkas'           =>  $nameBukti,
            'id_program_kuliah' => $request->id_program_kuliah,
            'id_prodi'         =>  $request->id_prodi,
            'tanggal_upload' => Carbon::now(),
            'tanggal_validasi' => Carbon::now(),
            'status_validasi' => 'Y',
            'operator_validasi' => $request->operator_validasi
        ]);

        if ($simpan) {
            Session::flash('message', "Data Berhasil Disimpan");
        } else {
            Session::flash('message', "Gagal Berhasil Disimpan");
        }

        return redirect()->route('transaksi.index');

    }

    public function storebymahasiswa(Request $request)
    {
        $iduser = User::where('id', $request->id_user)->get();

        $messages = [
            'id_user' => [
                'required' => 'Id User harus diisi',
            ],
            'jumlah_pembayaran' => [
                'required' => 'Biaya pembayaran harus diisi',
            ],
            'berkas' => [
                'required' => 'Berkas harus diisi',
                'max' => 'Size maksimal 5 mb'
            ],
            'id_program_kuliah' => [
                'required' => 'Program kuliah harus diisi',
            ],
            'id_prodi' => [
                'required' => 'Program studi harus diisi',
            ],
        ];

        $this->validate($request, [
            'id_user'           => 'required',
            'jumlah_pembayaran' => 'required',
            'berkas'            => 'required|mimes:jpg,jpeg,png|max:5242880',
            'id_program_kuliah' => 'required',
            'id_prodi'          => 'required'
        ], $messages);

        // dd($request);

        $nikuser = $iduser[0]->nik;
        $emailUser = $iduser[0]->email;

        $imageberkas = $request->file('berkas');
        $nameBukti = $nikuser . "-" . "Bukti_Pembayaran" . "-" . $emailUser . "." . $request->file('berkas')->getClientOriginalExtension();
        $path = 'app/public/bukti_pembayaran/'. $nameBukti;
        $compressBukti = Image::make($imageberkas)->resize(1080, 1080);
        $compressBukti->save(\storage_path($path), 80);

        $simpan = DB::table('tb_transaksi')->insert([
            'id_user'           => $request->id_user,
            'jumlah_pembayaran' => $request->jumlah_pembayaran,
            'berkas'           =>  $nameBukti,
            'id_program_kuliah' => $request->id_program_kuliah,
            'id_prodi'         =>  $request->id_prodi,
            'tanggal_upload' => Carbon::now(),
            'status_validasi' => 'N',
        ]);

        if ($simpan) {
            Session::flash('message', "Data Berhasil Disimpan");
        } else {
            Session::flash('message', "Gagal Berhasil Disimpan");
        }

        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $link = 'transaksi';

        $transaksi = Transaksi::findOrFail($id)->first();


        return view($this->folder . '.show', [
            'title' => $this->title,
            'transaksi' => $transaksi,
            'link' => $link
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $link = 'transaksi';

        $prodi = Prodi::all();
        $program_kuliah = ProgramKuliah::all();

        $transaksi = Transaksi::findOrFail($id)->first();

        return view($this->folder . '.edit', [
            'title' => $this->title,
            'prodi' => $prodi,
            'transaksi' => $transaksi,
            'link' => $link,
            'program_kuliah' => $program_kuliah
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        $messages = [
            'id_user' => [
                'required' => 'Id User harus diisi',
            ],
            'jumlah_pembayaran' => [
                'required' => 'Biaya pembayaran harus diisi',
            ],
            'berkas' => [
                'max' => 'Size maksimal 5 mb'
            ],
            'id_program_kuliah' => [
                'required' => 'Program kuliah harus diisi',
            ],
            'id_prodi' => [
                'required' => 'Program studi harus diisi',
            ],
        ];

        $this->validate($request, [
            'id_user'           => 'required',
            'jumlah_pembayaran' => 'required',
            'berkas'            => 'mimes:jpg,jpeg,png|max:5242880',
            'id_program_kuliah' => 'required',
            'id_prodi'          => 'required'
        ], $messages);

        $edit = Transaksi::findOrFail($transaksi->id);

        if($request->file('berkas') == "") {
            $edit->update([
                'id_user'           => $request->id_user,
                'jumlah_pembayaran' => $request->jumlah_pembayaran,
                'id_program_kuliah' => $request->id_program_kuliah,
                'id_prodi'         =>  $request->id_prodi,
                'tanggal_upload' => Carbon::now(),
                'tanggal_validasi' => Carbon::now(),
                'status_validasi' => 'Y',
                'operator_validasi' => $request->operator_validasi
            ]);

        }else {

        Storage::disk('local')->delete('public/bukti_pembayaran/'.$transaksi->berkas);

        $iduser = User::where('id', $request->id_user)->get();

        $nikuser = $iduser[0]->nik;
        $emailUser = $iduser[0]->email;

        $imageberkas = $request->file('berkas');
        $nameBukti = $nikuser . "-" . "Bukti_Pembayaran" . "-" . $emailUser . "." . $request->file('berkas')->getClientOriginalExtension();
        $path = 'app/public/bukti_pembayaran/'. $nameBukti;
        $compressBukti = Image::make($imageberkas)->fit(1080, 1080);
        $compressBukti->save(\storage_path($path), 80);

        $edit->update([
            'id_user'           => $request->id_user,
            'jumlah_pembayaran' => $request->jumlah_pembayaran,
            'berkas'           =>  $nameBukti,
            'id_program_kuliah' => $request->id_program_kuliah,
            'id_prodi'         =>  $request->id_prodi,
            'tanggal_upload' => Carbon::now(),
            'tanggal_validasi' => Carbon::now(),
            'status_validasi' => 'Y',
            'operator_validasi' => $request->operator_validasi
        ]);

        }

        if ($edit) {
            Session::flash('message', "Data Berhasil Disimpan");
        } else {
            Session::flash('message', "Gagal Berhasil Disimpan");
        }

        return redirect()->route('transaksi.index');

    }

    // Untuk Admin
    public function validateadmin(Transaksi $transaksi, $id) {
        $edit = Transaksi::findOrFail($id);

        $edit->update([
            'tanggal_validasi' => Carbon::now(),
            'status_validasi' => 'Y',
            'operator_validasi' => Auth::user()->id
        ]);

        if ($edit) {
            Session::flash('message', "Data Berhasil Disimpan");
        } else {
            Session::flash('message', "Gagal Berhasil Disimpan");
        }

        return redirect()->route('transaksi.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $buktiPembayaran = Storage::disk('local')->delete('public/bukti_pembayaran/'.basename($transaksi->berkas));

        $transaksi->delete();

        if ($mahasiswa) {
            Session::flash('message', "Data Berhasil Disimpan");
        } else {
            Session::flash('message', "Gagal Berhasil Disimpan");
        }

        return redirect()->route('transaksi.index');
    }
}
