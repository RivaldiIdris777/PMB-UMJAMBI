@push('css')
<meta name="csrf-token" content="{{ csrf_token() }}">
<link href="cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
<link href="{{ asset('') }}vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
<link href="{{ asset('') }}vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
@endpush
@extends('layouts.app')

@section('content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h5>Lengkapi Registrasi Dibawah</h5>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Proses Pendaftaran</h2>
                        <li class="nav navbar-right panel_toolbox">

                        </li>
                        <li class="nav navbar-right panel_toolbox">

                        </li>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12 col-sm-4 d-flex justify-content-center">
            <div class="col-md-8">
                <div class="x_panel">
                    <div class="x_title">
                        <h2><i class="fa fa-id-card-o"></i>Lengkapi Biodata Calon Mahasiswa (2)</h2>
                        <div class="clearfix"></div>
                    </div>
                    @forelse ( $mahasiswa as $siswa )
                    <a href="#" class="btn btn-success">Sudah Memasukkan Data Calon Mahasiswa</a>
                    <a href="{{ route('mahasiswa.showMahasiswa', $siswa->id) }}" class="btn btn-success">Cek validasi Data
                        Mahasiswa <i class="fa fa-arrow-right"></i></a>
                    @empty
                    <a href="#" class="btn btn-warning">Belum Memasukkan Data Calon Mahasiswa</a>
                    <a href="{{ route('mahasiswa.createMahasiswa') }}" class="btn btn-warning">Silahkan Daftar Disini <i
                            class="fa fa-arrow-right"></i></a>
                    @endforelse
                </div>
                <div class="x_panel">
                    <div class="x_title">
                        <h2><i class="fa fa-id-card-o"></i>Upload Berkas (3)</h2>
                        <div class="clearfix"></div>
                    </div>
                    @forelse ( $dokumenMahasiswa as $dokumen )
                    <a href="#" class="btn btn-success">Sudah Memasukkan Berkas Persyaratan</a>
                    <a href="{{ route('dokumenmahasiswa.showdokumen', Auth::user()->nik)}}" class="btn btn-success">Cek Validasi
                        Berkas Persyaratan<i class="fa fa-arrow-right"></i></a>
                    @empty
                    <a href="#" class="btn btn-warning">Belum Memasukkan Berkas Persyaratan</a>
                    <a href="{{ route('mahasiswa.createDokumen') }}" class="btn btn-warning">Silahkan Upload File Berkas
                        <i class="fa fa-arrow-right"></i></a>
                    @endforelse
                </div>
                <div class="x_panel">
                    <div class="x_title">
                        <h2><i class="fa fa-id-card-o"></i>Upload Berkas (3)</h2>
                        <div class="clearfix"></div>
                    </div>
                    <a href="#" class="btn btn-success">Berhasil Melakukan Semua Registrasi</a>
                    <a href="" class="btn btn-success">Cetak Formulir Sekarang <i class="fa fa-arrow-right"></i></a>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- /page content -->

@endsection

@push('js')
<script src="{{ asset('') }}vendors/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('') }}vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
