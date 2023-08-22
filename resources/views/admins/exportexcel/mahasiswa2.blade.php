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
                <h6>Export Data Excel</h6>
                <table id="table-datatable" class="table table-striped table-bordered dt-responsive nowrap data-table"
                    cellspacing="0" width="100%">
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
        </div>
        <card class="radius-10">
            <div class="card">
                <div class="card-body">
                    <h6>Export Berdasarkan Program (Regule, Malam, Pekerja)</h6>
                    <a href="{{ url('/export_program_pagi') }}" class="btn btn-success">
                        Export Program Pagi
                    </a>
                    <a href="{{ url('/export_program_malam') }}" class="btn btn-success">
                        Export Program Malam
                    </a>
                    <a href="{{ url('/export_program_pekerja') }}" class="btn btn-success">
                        Export Program Kerja
                    </a>
                </div>
            </div>
        </card>
        <div class="card radius-10">
            <div class="card-body">
                <h6>Export Berdasarkan Gelombang</h6>
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
            </div>
        </div>
        <div class="card radius-10">
            <div class="card-body">
                <h6>Export Berdasrkan Tanggal</h6>
                <form action="{{ url('filtertanggal') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="">Tanggal Berapa Yang Ingin Diambil</label>
                        <input type="date" name="tanggal" class="form-control">
                    </div>
                    <button class="btn btn-success mt-2">Export Excel</button>
                </form>
            </div>
        </div>
        <div class="card radius-10">
            <div class="card-body">
                <h6>Export Berdasrkan Program Studi</h6>
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
    @endsection
    @push('js')
    <script src="{{ asset('') }}rocker_admin/assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('') }}rocker_admin/assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
    <script type="text/javascript">
        $(function () {
            var table = $('.data-table').DataTable({
                serverSide: true,
                processing: true,
                lengthChange: false,
				buttons: [ 'copy', 'excel', 'pdf', 'print']
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
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
        })

    </script>
    @endpush
