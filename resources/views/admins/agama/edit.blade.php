@extends('layouts.app')
@section('content')
<div class="alert alert-primary border-0 bg-primary alert-dismissible fade show py-2">
    <div class="d-flex align-items-center">
        <div class="ms-3 p-2">
            <div class="text-white">Welcome {{ Auth::user()->name }} !! Anda memasuki Admin akses</div>
        </div>
    </div>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<div class="row">
    <div class="col-12">
        @if ($message = Session::get('warning'))
        <div class="alert alert-warning border-0 bg-warning alert-dismissible fade show py-2">
            <div class="d-flex align-items-center">
                <div class="ms-3 p-2">
                    <div class="text-white">{{ $message }}</div>
                </div>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            @endif
        </div>
        <div class="card radius-10">
            <div class="card-body">
                <div>
                    <h6>Ubah Data Pengisian Agama</h6>
                    <form action="{{ route($link . '.update', $agama->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Nama Agama</label>
                            <input type="text" name="name" class="form-control" value="{{ $agama->name }}">
                            @if ($errors->has('name'))
                            <div class="text-danger">
                                {{ $errors->first('name') }}
                            </div>
                            @endif
                        </div>
                        <div class="form-group mt-2">
                            <label for="status">Status Agama</label>
                            <select name="status" id="status" class="form-control">
                                <option value="{{ $agama->status }}">{{ $agama->status }} (Pilihan Sebelumnya) </option>
                                <option value="Y">Y</option>
                                <option value="N">N</option>
                            </select>
                            @if ($errors->has('status'))
                            <div class="text-danger">
                                {{ $errors->first('status') }}
                            </div>
                            @endif
                        </div>
                        <div class="d-grip gap-2 mt-3">
                            <button type="submit" class="btn btn-success">Simpan Data</button>
                        </div>
                    </form>
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
