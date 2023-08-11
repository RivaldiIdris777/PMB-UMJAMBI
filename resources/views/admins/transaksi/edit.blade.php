@extends('layouts.app')
@push('styles')
<link href="{{ asset('') }}css/style.css" rel="stylesheet">
@endpush
@section('content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="row">
            <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Form Pengisian Transaksi</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                    <form action="{{ route($link . '.update', $transaksi->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="col-md-12 col-sm-12 mb-10">
                            <div class="form-group">
                                <label for="">Id User</label>
                                <input name="id_user" type="text" value="{{ $transaksi->id_user }}" class="form-control">
                                @if ($errors->has('id_user'))
                                <div class="text-danger">
                                    {{ $errors->first('id_user') }}
                                </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="jumlah_pembayaran">Jumlah Pembayaran</label>
                                <input type="number" name="jumlah_pembayaran" value="{{ $transaksi->jumlah_pembayaran }}" class="form-control">
                                @if ($errors->has('jumlah_pembayaran'))
                                <div class="text-danger">
                                    {{ $errors->first('jumlah_pembayaran') }}
                                </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="berkas">Upload File Berkas</label>
                                <input type="file" name="berkas" class="form-control">
                                @if ($errors->has('berkas'))
                                <div class="text-danger">
                                    {{ $errors->first('berkas') }}
                                </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="id_program_kuliah">Program Kuliah</label>
                                <select name="id_program_kuliah" class="form-control">
                                    <option value="{{ $transaksi->id_program_kuliah }}">{{ $transaksi->programkuliah()->first()->nama_program_kuliah }} || Pilihan Sebelumnya</option>
                                    @foreach ($program_kuliah as $progkul)
                                        <option value="{{ $progkul->id_program_kuliah }}">{{ $progkul->nama_program_kuliah }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('id_program_kuliah'))
                                <div class="text-danger">
                                    {{ $errors->first('id_program_kuliah') }}
                                </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="id_prodi">Program Studi (Prodi)</label>
                                <select name="id_prodi" class="form-control">
                                        <option value="{{ $transaksi->id_prodi }}">{{ $transaksi->programstudi()->first()->nama_prodi }} || Pilihan Sebelumnya</option>
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
                            <input type="hidden" name="operator_validasi" value="{{ Auth::user()->id }}">
                            <button class="btn btn-success btn-block" type="submit">Simpan Data Transaksi</button>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@push('js')
<script></script>
@endpush
@endsection
