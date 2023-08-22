<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use App\Models\Gelombang;
// Excel
use App\Exports\MahasiswaExport;
use App\Exports\GelombangPertamaExport;
use App\Exports\GelombangKeduaExport;
use App\Exports\GelombangKetigaExport;
use App\Exports\GelombangKeempatExport;
use App\Exports\GelombangKelimaExport;
use App\Exports\ProgramPagiExport;
use App\Exports\ProgramMalamExport;
use App\Exports\ProgramPekerjaExport;
use App\Exports\TanggalExport;
use App\Exports\ProdiInformatikaExport;
use App\Exports\ProdiManajemenExport;
use App\Exports\ProdiSistemInformasiExport;
use App\Exports\ProdiEkonomiPembangunanExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Yajra\Datatables\Datatables;
use PDF;


class ExcelController extends Controller
{
    // Berdasarkan Gelombang

    public function index(Request $request)
    {
        $folder = 'admins.exportexcel';
        $title = 'Export Excel Data Mahasiswa';

        $gelombang = Gelombang::all();
        // dd($request->gelombang);

        if ($request->ajax()) {
            // $data = Mahasiswa::select('*');
            return DataTables::of(Mahasiswa::select('*'))
                ->addIndexColumn()
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
        return view($folder . '.mahasiswa2', ['title' => $title, 'gelombang' => $gelombang]);
    }

    public function export()
    {
        return Excel::download(new MahasiswaExport, 'users.xlsx');
    }

    public function export_gelombang1()
    {
        return Excel::download(new GelombangPertamaExport, 'gelombangpertama.xlsx');
    }

    public function export_gelombang2()
    {
        return Excel::download(new GelombangKeduaExport, 'gelombangkedua.xlsx');
    }

    public function export_gelombang3()
    {
        return Excel::download(new GelombangKetigaExport, 'gelombangketiga.xlsx');
    }

    public function export_gelombang4()
    {
        return Excel::download(new GelombangKeempatExport, 'gelombangkeempat.xlsx');
    }

    public function export_gelombang5()
    {
        return Excel::download(new GelombangKelimaExport, 'gelombangkelima.xlsx');
    }

    // Berdasarkan Kelas
    public function program_pagi()
    {
        return Excel::download(new ProgramPagiExport, 'programpagi.xlsx');
    }

    public function program_malam()
    {
        return Excel::download(new ProgramMalamExport, 'programmalam.xlsx');
    }

    public function program_pekerja()
    {
        return Excel::download(new ProgramPekerjaExport, 'programpekerja.xlsx');
    }

    public function filterTanggal(Request $request)
    {
        $tgl = $request->input('tanggal');
        return Excel::download(new TanggalExport, 'Berdasarkan_Tanggal_'. $tgl . '.xlsx');
    }

    public function prodiInformatika()
    {
        return Excel::download(new ProdiInformatikaExport, 'prodiInformatika.xlsx');
    }

    public function prodiSistemInformasi()
    {
        return Excel::download(new ProdiSistemInformasiExport, 'prodiSistemInformasi.xlsx');
    }

    public function prodiEkonomiPembangunan()
    {
        return Excel::download(new ProdiEkonomiPembangunanExport, 'prodiEkonomiPembangunan.xlsx');
    }

    public function prodiManajemen()
    {
        return Excel::download(new ProdiManajemenExport, 'prodiManajemen.xlsx');
    }

    public function prodiKehutanan()
    {
        return Excel::download(new ProdiKehutananExport, 'prodiKehutanan.xlsx');
    }

}
