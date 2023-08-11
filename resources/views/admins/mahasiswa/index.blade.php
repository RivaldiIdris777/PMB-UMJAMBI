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
                <h3>Data Mahasiswa</h3>
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
                        <h2>Data Mahasiswa</h2>
                        <li class="nav navbar-right panel_toolbox"><a href="{{ route('mahasiswa.create') }}"
                                class="btn btn-sm btn-success">Tambah Data</a>
                        </li>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <table id="table-datatable"
                            class="table table-striped table-bordered dt-responsive nowrap data-table" cellspacing="0"
                            width="100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nomor Pendaftaran</th>
                                    <th>Nama Mahasiswa</th>
                                    <th>Nomor Induk Kependudukan</th>
                                    <th>Nomo Hp</th>
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
                url: "{{ route('mahasiswa.index') }}",
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
                    data: 'no_registrasi',
                    name: 'no_registrasi'
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
                    data: 'hp',
                    name: 'hp'
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

        $('body').on('click', '.deleteMahasiswa', function () {
            var id = $(this).data("id");
            confirm("Anda yakin ingin menghapus data ini ?");
            $.ajax({
                type: "DELETE",
                url: "{{ route('mahasiswa.store') }}" + '/' + id,
                success: function (data) {
                    table.draw();
                },
                error: function (data) {
                    console.log('Error:', data);
                    table.draw();
                }
            });
        });
    })
</script>
@endpush
