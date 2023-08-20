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
        <div class="card radius-10">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <div class="p-2">
                    <h6 class="mb-0">Agama</h6>
                </div>
                <div class="p-2">
                    <li class="nav navbar-right panel_toolbox"><a href="{{ route('agama.create') }}"
                    class="btn btn-sm btn-success">Tambah Data</a>
                    </li>
                </div>
            </div>
        </div>
            <div class="card-body">
                <div>
                    <div class="table-responsive mt-3">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Agama</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $no => $item)
                                <tr>
                                    <th scope="row">{{ ++$no }}</th>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->status == 'N' ? 'Tidak Aktif' : 'Aktif' }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
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
