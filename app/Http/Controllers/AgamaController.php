<?php

namespace App\Http\Controllers;

use App\Models\Agama;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AgamaController extends Controller
{
    public $title;
    public $folder;

    public function __construct()
    {
        $this->title = 'Agama';
        $this->folder = 'admins.agama';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Agama::all();
        return view($this->folder . '.index', ['data' => $data, 'title' => $this->title]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $link = 'agama';

        return view($this->folder . '.add', [
            'link' => $link,
            'title' => $this->title
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
            'name' => [
                'required' => 'Agama tidak boleh kosong ',
            ],
            'status' => [
                'required' => 'Status tidak boleh kosong',
            ]
        ];


        $this->validate($request, [
            'name' => 'required',
            'status' => 'required'
        ], $messages);

        $simpan = DB::table('tb_agama')->insert([
            'name'                   => $request->name,
            'status'                  => $request->status,
        ]);


        if ($simpan) {
            return redirect()->route('agama.index')->with(['success' => 'Data Tersimpan']);
        } else {
            return redirect()->back()->with(['warning' => 'Terdapat Kesalahan']);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Agama  $agama
     * @return \Illuminate\Http\Response
     */
    public function show(Agama $agama)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Agama  $agama
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $agama = Agama::where('id', $id)->first();

        $link = 'agama';

        return view($this->folder . '.edit', [
            'link' => $link,
            'title' => $this->title,
            'agama' => $agama
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Agama  $agama
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $messages = [
            'name' => [
                'required' => 'Agama tidak boleh kosong ',
            ],
            'status' => [
                'required' => 'Status tidak boleh kosong',
            ]
        ];

        $this->validate($request, [
            'name' => 'required',
            'status' => 'required'
        ], $messages);

        $simpan = DB::table('tb_agama')->where('id', $id)->update([
            'name'                   => $request->name,
            'status'                  => $request->status,
        ]);

        if ($simpan) {
            return redirect()->route('agama.index')->with(['success' => 'Data Tersimpan']);
        } else {
            return redirect()->back()->with(['warning' => 'Terdapat Kesalahan']);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Agama  $agama
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $agama = Agama::where('id', $id)->delete();

        if ($agama) {
            return redirect()->route('agama.index')->with(['success' => 'Data berhasil dihapus']);
        } else {
            return redirect()->back()->with(['warning' => 'Terdapat Kesalahan']);
        }
    }
}
