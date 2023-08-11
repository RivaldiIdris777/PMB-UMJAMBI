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
                <h3>Data Dokumen Mahasiswa</h3>
            </div>

            <div class="title_right">
                <div class="col-md-3 col-sm-12 pull-right top_search">
                    <select name="gelombang" id="gelombang" class="form-control">
                        <option value="">Semua Gelombang</option>
                        @foreach ($gelombang as $item)
                        <option value="{{ $item->id_gelombang }}">{{ $item->nama_gelombang }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Data Dokumen Mahasiswa</h2>
                        <li class="nav navbar-right panel_toolbox"><a href="{{ route('dokumenmahasiswa.create') }}"
                                class="btn btn-sm btn-success">Masukkan Dokumen</a>
                        </li>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <table id="table-datatable"
                            class="table table-striped table-bordered dt-responsive nowrap text-center data-table" cellspacing="0"
                            width="100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Phas Foto</th>
                                    <th>Nama</th>
                                    <th>Nomor Induk Kependudukan</th>
                                    <th>Status Berkas</th>
                                    <th width="100px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
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
                    render: function(data) {
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
                    data:'status_kelengkapan',
                    name:'status_kelengkapan'
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
