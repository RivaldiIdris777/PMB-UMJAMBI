<?php

namespace App\Http\Controllers;

use App\Models\JalurPendaftaran;
use Illuminate\Http\Request;

class JalurPendaftaranController extends Controller
{
    public $title;
    public $folder;

    public function __construct()
    {
        $this->title = 'Jalur Pendaftaran';
        $this->folder = 'admins.jalur_pendaftaran';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = JalurPendaftaran::all();
        return view($this->folder . '.index', ['data' => $data, 'title' => $this->title]);
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JalurPendaftaran  $jalurPendaftaran
     * @return \Illuminate\Http\Response
     */
    public function show(JalurPendaftaran $jalurPendaftaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JalurPendaftaran  $jalurPendaftaran
     * @return \Illuminate\Http\Response
     */
    public function edit(JalurPendaftaran $jalurPendaftaran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\JalurPendaftaran  $jalurPendaftaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JalurPendaftaran $jalurPendaftaran)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JalurPendaftaran  $jalurPendaftaran
     * @return \Illuminate\Http\Response
     */
    public function destroy(JalurPendaftaran $jalurPendaftaran)
    {
        //
    }
}
