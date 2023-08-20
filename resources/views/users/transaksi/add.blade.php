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
                        <h4 class="mb-0">Bukti Biaya Pendaftaran</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="card radius-10">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <div class="p-2">
                        <h6 class="mb-0">Form Pengisian Bukti Transaksi</h6>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route($link . '.storebymahasiswa') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-12 col-sm-12 mb-10">
                        <div class="form-group">
                            <label for="">Nama Pengguna</label>
                            <select name="id_user" class="form-control">
                                <option value="{{ Auth::user()->id }}">{{ Auth::user()->name }}</option>
                            </select>
                            @if ($errors->has('id_user'))
                            <div class="text-danger">
                                {{ $errors->first('id_user') }}
                            </div>
                            @endif
                        </div>
                        <div class="form-group mt-2">
                            <label for="jumlah_pembayaran">Jumlah Pembayaran</label>
                            <input type="number" name="jumlah_pembayaran" class="form-control">
                            @if ($errors->has('jumlah_pembayaran'))
                            <div class="text-danger">
                                {{ $errors->first('jumlah_pembayaran') }}
                            </div>
                            @endif
                        </div>
                        <div class="form-group mt-2">
                            <label for="berkas">Masukkan Gambar Bukti Transaksi</label>
                            <input type="file" name="berkas" class="form-control">
                            <small>* Format JPG,JPEG,PNG</small>
                            @if ($errors->has('berkas'))
                            <div class="text-danger">
                                {{ $errors->first('berkas') }}
                            </div>
                            @endif
                        </div>
                        <div class="form-group mt-2">
                            <label for="id_program_kuliah">Program Kuliah</label>
                            <select name="id_program_kuliah" class="form-control">
                                @foreach ($program_kuliah as $progkul)
                                <option value="{{ $progkul->id_program_kuliah }}">
                                    {{ $progkul->nama_program_kuliah }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('id_program_kuliah'))
                            <div class="text-danger">
                                {{ $errors->first('id_program_kuliah') }}
                            </div>
                            @endif
                        </div>
                        <div class="form-group mt-2">
                            <label for="id_prodi">Program Studi (Prodi)</label>
                            <select name="id_prodi" class="form-control">
                                @foreach ($prodi as $pdi)
                                <option value="{{ $pdi->id_prodi }}">{{ $pdi->nama_prodi }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('id_prodi'))
                            <div class="text-danger">
                                {{ $errors->first('id_prodi') }}
                            </div>
                            @endif
                        </div>
                        <div class="d-grid gap-2 mt-2">
                            <button class="btn btn-success btn-block" type="submit">Simpan Data Transaksi</button>
                        </div>
                </form>
            </div>
        </div>

    </div>
    @endsection
    @push('js')
    <script src="{{ asset('') }}rocker_admin/assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('') }}rocker_admin/assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
    @endpush
