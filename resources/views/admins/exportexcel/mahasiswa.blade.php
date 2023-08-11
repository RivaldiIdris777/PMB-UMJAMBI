@push('css')
<meta name="csrf-token" content="{{ csrf_token() }}">
<link href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<link href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">
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
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <table id="table-datatable"
                            class="table table-striped table-bordered dt-responsive nowrap data-table" cellspacing="0"
                            width="100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nomor Registrasi</th>
                                    <th>Jalur Masuk</th>
                                    <th>Nama Mahasiswa</th>
                                    <th>Nik</th>
                                    <th>NISN</th>
                                    <th>Tempat Lahir</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Agama</th>
                                    <th>Nomor Handphone</th>
                                    <th>Email</th>
                                    <th>Jalan</th>
                                    <th>RT</th>
                                    <th>Kelurahan</th>
                                    <th>Kecamatan</th>
                                    <th>Kabupaten</th>
                                    <th>Provinsi</th>
                                    <th>Program Kuliah</th>
                                    <th>Prodi 1</th>
                                    <th>Prodi 2</th>
                                    <th>Nama Instansi</th>
                                    <th>Jabatan</th>
                                    <th>Asal Sekolah</th>
                                    <th>Nama Sekolah</th>
                                    <th>Alamat Sekolah</th>
                                    <th>Jurusan Sekolah</th>
                                    <th>Tahun Lulus</th>
                                    <th>Nama Ayah</th>
                                    <th>Nama Ibu</th>
                                    <th>Alamat Orang Tua</th>
                                    <th>Informasi Kuliah</th>
                                    <th>Tanggal Validasi</th>
                                    <th>Status Validasi</th>
                                    <th>Keterangan</th>
                                    <th>Gelombang</th>
                                    <th>Admin Validasi</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                    <div class="x_content">
                        <h2>Export Excel Program</h2>
                        <a href="{{ url('/export_program_pagi') }}" class="btn btn-success">
                            Export Program Pagi
                        </a>
                        <a href="{{ url('export_program_malam') }}" class="btn btn-success">
                            Export Program Malam
                        </a>
                        <a href="{{ url('export_program_kerja') }}" class="btn btn-success">
                            Export Program Kerja
                        </a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <h2>Export Excel Gelombang</h2>
                        <a href="{{ url('export_gelombang1') }}" class="btn btn-success">
                            Export Gelombang Pertama
                        </a>
                        <a href="{{ url('export_gelombang2') }}" class="btn btn-success">
                            Export Gelombang Kedua
                        </a>
                        <a href="{{ url('export_gelombang3') }}" class="btn btn-success">
                            Export Gelombang Ketiga
                        </a>
                        <a href="{{ url('export_gelombang4') }}" class="btn btn-success">
                            Export Gelombang Keempat
                        </a>
                        <a href="{{ url('export_gelombang5') }}" class="btn btn-success">
                            Export Gelombang Kelima
                        </a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <h2>Export Excel Berdasarkan Tanggal</h2>
                        <form action="{{ url('filtertanggal') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="">Tanggal Berapa Yang Ingin Diambil</label>
                                <input type="date" name="tanggal" class="form-control">
                            </div>
                            <button class="btn btn-success">Export Excel</button>
                        </form>
                    </div>
                    <div class="x_content">
                        <h2>Export Excel Berdasarkan Program Studi</h2>
                        <a href="{{ url('export_prodi_informatika') }}" class="btn btn-success">
                            Export Prodi Informatika
                        </a>
                        <a href="{{ url('export_prodi_sistem_informasi') }}" class="btn btn-success">
                            Export Prodi Sistem Informasi
                        </a>
                        <a href="{{ url('export_prodi_ekonomi_pembangunan') }}" class="btn btn-success">
                            Export Prodi Ekonomi Pembangunan
                        </a>
                        <a href="{{ url('export_prodi_manajemen') }}" class="btn btn-success">
                            Export Prodi Manajemen
                        </a>
                        <a href="{{ url('export_prodi_kehutanan') }}" class="btn btn-success">
                            Export Prodi Kehutanan
                        </a>
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
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
<script src="{{ asset('') }}vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">
    $(function () {
        var table = $('.data-table').DataTable({
            serverSide: true,
            processing: true,
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
                    data: 'id_jalur_pendaftaran',
                    name: 'id_jalur_pendaftaran'
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
                    data: 'nisn',
                    name: 'nisn'
                },
                {
                    data: 'tempat_lahir',
                    name: 'tempat_lahir'
                },
                {
                    data: 'tanggal_lahir',
                    name: 'tanggal_lahir'
                },
                {
                    data: 'jenis_kelamin',
                    name: 'jenis_kelamin'
                },
                {
                    data: 'agama',
                    name: 'agama'
                },
                {
                    data: 'hp',
                    name: 'hp'
                },
                {
                    data: 'email',
                    name: 'email'
                },
                {
                    data: 'jalan',
                    name: 'jalan'
                },
                {
                    data: 'rt',
                    name: 'rt'
                },
                {
                    data: 'id_kelurahan',
                    name: 'id_kelurahan'
                },
                {
                    data: 'id_kecamatan',
                    name: 'id_kecamatan'
                },
                {
                    data: 'id_kabupaten',
                    name: 'id_kabupaten'
                },
                {
                    data: 'id_provinsi',
                    name: 'id_provinsi'
                },
                {
                    data: 'id_program_kuliah',
                    name: 'id_program_kuliah'
                },
                {
                    data: 'prodi1',
                    name: 'prodi1'
                },
                {
                    data: 'prodi2',
                    name: 'prodi2'
                },
                {
                    data: 'nama_instansi',
                    name: 'nama_instansi'
                },
                {
                    data: 'jabatan',
                    name: 'jabatan'
                },
                {
                    data: 'id_asal_sekolah',
                    name: 'id_asal_sekolah'
                },
                {
                    data: 'nama_sekolah',
                    name: 'nama_sekolah'
                },
                {
                    data: 'alamat_sekolah',
                    name: 'alamat_sekolah'
                },
                {
                    data: 'jurusan_sekolah',
                    name: 'jurusan_sekolah'
                },
                {
                    data: 'tahun_lulus',
                    name: 'tahun_lulus'
                },
                {
                    data: 'nama_ayah',
                    name: 'nama_ayah'
                },
                {
                    data: 'nama_ibu',
                    name: 'nama_ibu'
                },
                {
                    data: 'alamat_orangtua',
                    name: 'alamat_orangtua'
                },
                {
                    data: 'informasi_kuliah',
                    name: 'informasi_kuliah'
                },
                {
                    data: 'tgl_validasi',
                    name: 'tgl_validasi'
                },
                {
                    data: 'status_validasi',
                    name: 'status_validasi'
                },
                {
                    data: 'keterangan',
                    name: 'keterangan'
                },
                {
                    data: 'gelombang',
                    name: 'gelombang'
                },
                {
                    data: 'admin_validasi',
                    name: 'admin_validasi'
                },



            ]

        });
        new $.fn.dataTable.Buttons(table, {
            buttons: [
                'copy', 'excel', 'pdf'
            ]
        });
        $('#gelombang').change(function () {
            table.draw();
        });
    })

</script>
@endpush
