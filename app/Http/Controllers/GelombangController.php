<?php

namespace App\Http\Controllers;

use App\Models\Gelombang;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class GelombangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $title;
    public function __construct()
    {
        $this->title = 'Gelombang';
    }

    public function index()
    {
        $gelombang = Gelombang::all();
        return view('admins.gelombang.index', ['gelombang' => $gelombang, 'title' => $this->title]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $this->title = 'Tambah ' . $this->title;
        return view('admins.gelombang.add', ['title' => $this->title]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $messages = [
            'required' => ':attribute wajib diisi',
            'unique' => ':attribute telah digunakan',
        ];
        $this->validate($request, [
            'kode_gelombang' => 'required|unique:tb_gelombang,kode_gelombang,kode_gelombang,kode_gelombang',
            'nama_gelombang' => 'required'
        ], $messages);

        Gelombang::create([
            'kode_gelombang' => $request->kode_gelombang,
            'nama_gelombang' => $request->nama_gelombang,
            'status_gelombang' => "N",
        ]);
        Session::flash('message', "Data Berhasil Disimpan");
        return redirect('/gelombang');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gelombang  $gelombang
     * @return \Illuminate\Http\Response
     */
    public function show(Gelombang $gelombang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gelombang  $gelombang
     * @return \Illuminate\Http\Response
     */
    public function edit(Gelombang $gelombang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gelombang  $gelombang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $messages = [
            'required' => ':attribute wajib diisi',
        ];
        $this->validate($request, [
            'kode_gelombang' => 'required',
            'nama_gelombang' => 'required'
        ], $messages);

        Gelombang::find($id)->update([
            'kode_gelombang' => $request->kode_gelombang,
            'nama_gelombang' => $request->nama_gelombang,
            'status_gelombang' => "N",
        ]);

        Session::flash('message', "Data Berhasil Diubah");
        return redirect('/gelombang');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gelombang  $gelombang
     * @return \Illuminate\Http\Response
     */
    public function aktifkan(Request $request, $id)
    {
        //
        // dd($id);
        $this->validate($request, [
            'status_gelombang' => 'required',
        ]);
        if ($request->status_gelombang == 'N') {

            $gelombang = Gelombang::query()->update(['status_gelombang' => 'N']);

            $gelombang = Gelombang::find($id);
            $gelombang->status_gelombang = "Y";
            $gelombang->save();
            Session::flash('message', "Gelombang Berhasil Diaktifkan");
        } else {
            $gelombang = Gelombang::find($id);
            $gelombang->status_gelombang = "N";
            $gelombang->save();
            Session::flash('message', "Gelombang Berhasil Dinonaktifkan");
        }

        return redirect('/gelombang');
    }
    public function destroy(Gelombang $gelombang)
    {
        //
    }
}
