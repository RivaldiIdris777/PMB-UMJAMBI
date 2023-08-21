@extends('layouts.app')
@section('content')
<div class="alert alert-primary border-0 bg-primary alert-dismissible fade show py-2">
    <div class="d-flex align-items-center">
        <div class="ms-3 p-2">
            <div class="text-white">{{ Auth::user()->name }} !! {{ $title }}</div>
        </div>
    </div>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<div class="row">
    <div class="col-12">
        <div class="card radius-10">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <div class="p-2">
                        <h4 class="mb-0">Proses Pendaftaran</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="card radius-10">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <div class="p-2">
                        <h6 class="mb-0">Lengkapi Biodata Calon Mahasiswa</h6>
                    </div>
                </div>
            </div>
            <div class="card-body">
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
        </div>
        <div class="card radius-10">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <div class="p-2">
                        <h6 class="mb-0">Upload Berkas Calon Mahasiswa</h6>
                    </div>
                </div>
            </div>
            <div class="card-body">
                @forelse ( $dokumenMahasiswa as $dokumen )
                <a href="#" class="btn btn-success">Sudah Memasukkan Berkas Persyaratan</a>
                <a href="{{ route('dokumenmahasiswa.showdokumen', Auth::user()->nik)}}" class="btn btn-success">Cek
                    Validasi
                    Berkas Persyaratan<i class="fa fa-arrow-right"></i></a>
                @empty
                <a href="#" class="btn btn-warning">Belum Memasukkan Berkas Persyaratan</a>
                <a href="{{ route('mahasiswa.createDokumen') }}" class="btn btn-warning">Silahkan Upload File Berkas
                    <i class="fa fa-arrow-right"></i></a>
                @endforelse
            </div>
        </div>

        @if ( count($dokumenMahasiswa) > 0)
        <div class="card radius-10">
            <div class="card-header">
                <h6>Cetak Formulir</h6>
            </div>
            <div class="card-body">
                <a href="{{ url('mahasiswa/cetakformulir/'. $mahasiswa[0]->nik) }}"
                    class="btn btn-success btn-block">Silahkan Cetak Formulir Disini</a>
            </div>
        </div>
        @elseif ( count($dokumenMahasiswa) < 1)

        @endif

    </div>
    @endsection
    @push('js')
    <script src="{{ asset('') }}rocker_admin/assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('') }}rocker_admin/assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
    @endpush
