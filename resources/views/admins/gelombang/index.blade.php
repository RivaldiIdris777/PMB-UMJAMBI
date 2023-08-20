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
                        <h6 class="mb-0">Gelombang</h6>
                    </div>
                    <div class="p-2">

                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Gelombang</th>
                            <th>Nama Gelombang</th>
                            <th>Status Gelombang</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($gelombang as $no => $item)
                        <tr>
                            <th scope="row">{{ ++$no }}</th>
                            <td>{{ $item->kode_gelombang }}</td>
                            <td>{{ $item->nama_gelombang }}</td>
                            <td>{{ $item->status_gelombang == 'N' ? 'Tidak Aktif' : 'Aktif' }}</td>
                            <td>
                                @if ($item->status_gelombang == 'N')
                                <a class="btn btn-sm btn-info" href="#"
                                    onclick="event.preventDefault();
                                                        document.getElementById('aktifkan-form{{ $item->id_gelombang }}').submit();">Aktifkan</a>
                                <form id="aktifkan-form{{ $item->id_gelombang }}"
                                    action="{{ url('gelombang/aktifkan/' . $item->id_gelombang) }}" method="POST"
                                    class="d-none">
                                    @csrf
                                    <input type="text" name="status_gelombang" value="{{ $item->status_gelombang }}">
                                </form>
                                @else
                                <a class="btn btn-sm btn-danger" href="#"
                                    onclick="event.preventDefault();
                                                        document.getElementById('nonaktifkan-form{{ $item->id_gelombang }}').submit();">Non Aktifkan</a>
                                <form id="nonaktifkan-form{{ $item->id_gelombang }}"
                                    action="{{ url('gelombang/aktifkan/' . $item->id_gelombang) }}" method="POST"
                                    class="d-none">
                                    @csrf
                                    <input type="text" name="status_gelombang" value="{{ $item->status_gelombang }}">
                                </form>
                                @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endsection
    @push('js')
    <script src="{{ asset('') }}rocker_admin/assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('') }}rocker_admin/assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
    @endpush
