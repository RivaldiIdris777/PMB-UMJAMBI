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
        @if ($message = Session::get('success'))
        <div class="alert alert-success border-0 bg-success alert-dismissible fade show py-2">
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
                    <h6>Form Pengisian Agama</h6>
                    <form action="{{ route($link . '.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Nama Agama</label>
                            <input type="text" name="name" class="form-control">
                            @if ($errors->has('name'))
                            <div class="text-danger">
                                {{ $errors->first('name') }}
                            </div>
                            @endif
                        </div>
                        <div class="form-group mt-2">
                            <label for="status">Status Agama</label>
                            <select name="status" id="status" class="form-control">
                                <option value="">-- Pilih Status Agama --</option>
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
