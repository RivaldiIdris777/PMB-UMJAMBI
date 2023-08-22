@extends('layouts.app')
@section('content')
<div class="alert alert-primary border-0 bg-primary alert-dismissible fade show py-2">
    <div class="d-flex align-items-center">
        <div class="ms-3 p-2">
            <div class="text-white">Welcome {{ Auth::user()->name }} !! Anda memasuki admin akses</div>
        </div>
    </div>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<div class="row">
    <div class="col-12">
        @if ($message = Session::get('Warning'))
        <div class="alert alert-warning alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
        @endif
        <div class="card radius-10">
            <div class="card-body">
                <div>
                    <h6>Form Ubah Transaksi</h6>
                    <form action="{{ route('transaksi.updateTransaksi', $transaksi->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="col-md-12 col-sm-12 mb-10">
                            <input name="id_user" type="hidden" value="{{ Auth::user()->id }}"
                                class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="jumlah_pembayaran">Jumlah Pembayaran</label>
                            <input type="number" name="jumlah_pembayaran" value="{{ old('jumlah_pembayaran') ?? $transaksi->jumlah_pembayaran }}"
                                class="form-control">
                            @if ($errors->has('jumlah_pembayaran'))
                            <div class="text-danger">
                                {{ $errors->first('jumlah_pembayaran') }}
                            </div>
                            @endif
                        </div>
                        <div class="form-group mt-3 text-center">
                            <img class="mb-2" id="outputtf"
                                src="{{ Storage::url('public/bukti_pembayaran/').$transaksi->berkas }}" width="500"
                                height="800">
                            <label for="berkas">Ganti File Bukti Transaksi</label>
                            <input type="file" name="berkas" class="form-control" accept="image/*"
                                onchange="document.getElementById('outputtf').src = window.URL.createObjectURL(this.files[0])">
                            @if ($errors->has('berkas'))
                            <div class="text-danger">
                                {{ $errors->first('berkas') }}
                            </div>
                            @endif
                        </div>
                        <div class="form-group mt-3">
                            <label for="id_program_kuliah">Program Kuliah</label>
                            <select name="id_program_kuliah" class="form-control">
                                <option value="{{ old('id_program_kuliah') ?? $transaksi->id_program_kuliah }}">
                                    {{ old('id_program_kuliah') ?? $transaksi->programkuliah()->first()->nama_program_kuliah }} </option>
                                @foreach ($program_kuliah as $progkul)
                                <option value="{{ old('id_program_kuliah') ?? $progkul->id_program_kuliah }}">{{ $progkul->nama_program_kuliah }}
                                </option>
                                @endforeach
                            </select>
                            @if ($errors->has('id_program_kuliah'))
                            <div class="text-danger">
                                {{ $errors->first('id_program_kuliah') }}
                            </div>
                            @endif
                        </div>
                        <div class="form-group mt-3">
                            <label for="id_prodi">Program Studi (Prodi)</label>
                            <select name="id_prodi" class="form-control">
                                <option value="{{ old('id_prodi') ?? $transaksi->id_prodi }}">
                                    {{ old('id_prodi') ?? $transaksi->programstudi()->first()->nama_prodi }}</option>
                                @foreach ($prodi as $pdi)
                                <option value="{{ old('id_prodi') ?? $pdi->id_prodi }}">{{ $pdi->nama_prodi }}</option>
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
    </div>
</div>
</div>
@endsection
@push('js')
<script src="{{ asset('') }}rocker_admin/assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('') }}rocker_admin/assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
@endpush
