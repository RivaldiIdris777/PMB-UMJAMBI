@push('css')
<meta name="csrf-token" content="{{ csrf_token() }}">
<link href="cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
<link href="{{ asset('') }}rocker_admin/assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
@endpush
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
            <div class="card-body">
                <div>
                    <h6>Cari Berdasarkan Gelombang</h6>
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="inputGroupSelect01">Gelombang Ke Berapa</label>
                        <select name="gelombang" id="gelombang" class="form-select">
                            <option value="">Semua Gelombang</option>
                            @foreach ($gelombang as $item)
                            <option value="{{ $item->id_gelombang }}">{{ $item->nama_gelombang }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="card radius-10">
            <div class="card-body">
                <h6 class="mb-3">Data Berkas Mahasiswa</h6>
                <table id="table-datatable" style=" display: block; max-width: -moz-fit-content; max-width: fit-content; margin: 0 auto; overflow-x: auto; white-space: nowrap;"
                    class="table table-striped table-bordered dt-responsive nowrap text-center data-table"
                    cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Phas Foto</th>
                            <th>Nama</th>
                            <th>Nomor Induk Kependudukan</th>
                            <th>KTP Status</th>
                            <th>KK Status</th>
                            <th>Dokumen Wajib</th>
                            <th>Dokumen Pendukung</th>
                            <th width="100px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endsection
    @push('js')
    <script src="{{ asset('') }}vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('') }}vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript">
        $(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('dokumenmahasiswa.index') }}",
                    data: function (d) {
                        d.gelombang = $('#gelombang').val(),
                            d.search = $('input[type="search"]').val()
                    }
                },
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'gambar',
                        render: function (data) {
                            return `<img src="{{ Storage::url('public/mahasiswas/${data}') }}" width="40" height="60">`;
                        }
                    },
                    {
                        data: 'nama_mahasiswa',
                        name: 'nama_mahasiswa'
                    },
                    {
                        data: 'nik',
                        name: 'nik'
                    },
                    {
                        data: 'ktp_status',
                        name: 'ktp_status'
                    },
                    {
                        data: 'kk_status',
                        name: 'kk_status'
                    },
                    {
                        data: 'dokumen_wajib_status',
                        name: 'dokumen_wajib_status'
                    },
                    {
                        data: 'dokumen_pendukung_status',
                        name: 'dokumen_pendukung_status'
                    },
                    {

                        data: 'action',
                        name: 'action',
                    },
                ]
            });
            $('#gelombang').change(function () {
                table.draw();
            });
        })

    </script>
    @endpush
