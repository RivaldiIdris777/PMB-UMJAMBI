@extends('layouts.app')

@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Detail Mahasiswa</h3>
                </div>

                <div class="title_right">
                    <div class="col-md-5 col-sm-5   form-group pull-right top_search">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search for...">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button">Go!</button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12  ">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Detail Mahasiswa</h2>
                            <!-- <li class="nav navbar-right panel_toolbox">
                                @if (auth()->user()->role == 'user')
                                    <a href="{{ route('biodata.edit',Auth::user()->nik) }}" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></a>
                                @else

                                @endif
                            </li> -->
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div class="row">
                                <div class="col-sm-3 mail_list_column">
                                    <div class="mail_list text-center">
                                        <img class="mb-3" src="{{ Storage::url('public/mahasiswas/').$data->gambar }}" alt="{{ $data->nama_mahasiswa }}" widt="200" height="200">
                                    </div>
                                    <div class="mail_list">
                                        <div class="left">
                                            <i class="fa fa-circle"></i> <i class="fa fa-list"></i>
                                        </div>
                                        <div class="right">
                                            Nama Mahasiswa
                                            <h3>{{ $data->nama_mahasiswa }}</h3>
                                        </div>
                                    </div>
                                    <div class="mail_list">
                                        <div class="left">
                                            <i class="fa fa-circle"></i> <i class="fa fa-list"></i>
                                        </div>
                                        <div class="right">
                                            Nomor Pendaftaran
                                            <h3>{{ $data->no_registrasi }}</h3>
                                        </div>
                                    </div>
                                    <div class="mail_list">
                                        <div class="left">
                                            <i class="fa fa-circle"></i> <i class="fa fa-list"></i>
                                        </div>
                                        <div class="right">
                                            Nomor Induk Kependudukan
                                            <h3>{{ $data->nik }}</h3>
                                        </div>
                                    </div>
                                    <div class="mail_list">
                                        <div class="left">
                                            <i class="fa fa-circle"></i> <i class="fa fa-list"></i>
                                        </div>
                                        <div class="right">
                                            Nomor Induk Siswa Nasional
                                            <h3>{{ $data->nisn }}</h3>
                                        </div>
                                    </div>
                                    <div class="mail_list">
                                        <div class="left">
                                            <i class="fa fa-circle"></i> <i class="fa fa-list"></i>
                                        </div>
                                        <div class="right">
                                            Tempat, Tanggal Lahir
                                            <h3>{{ $data->tempat_lahir ? $data->tempat_lahir . ', ' : '' . $data->tanggal_lahir }}
                                            </h3>
                                        </div>
                                    </div>
                                    <div class="mail_list">
                                        <div class="left">
                                            <i class="fa fa-circle"></i> <i class="fa fa-list"></i>
                                        </div>
                                        <div class="right">
                                            Jenis Kelamin
                                            <h3>{{ $data->tempat_lahir . ', ' . $data->tanggal_lahir }}</h3>
                                        </div>
                                    </div>
                                    <div class="mail_list">
                                        <div class="left">
                                            <i class="fa fa-circle"></i> <i class="fa fa-list"></i>
                                        </div>
                                        <div class="right">
                                            Agama
                                            <h3>{{ Str::ucfirst(Str::lower($data->agama()->first()->name)) }}</h3>
                                        </div>
                                    </div>
                                    <div class="mail_list">
                                        <div class="left">
                                            <i class="fa fa-circle"></i> <i class="fa fa-list"></i>
                                        </div>
                                        <div class="right">
                                            Alamat
                                            <h3>{{ $data->jalan ? 'Jalan ' . $data->jalan : '' }}
                                                {{ $data->rt ? 'RT/RW ' . $data->rt : '' }}
                                                {{ $default['kel'] ? 'Kelurahan ' . $default['kel'] : '' }}
                                                {{ $default['kec'] ? 'Kecamatan ' . $default['kec'] : '' }}
                                                <br>
                                                {{ $default['kab'] ? Str::title((Str::lower($default['kab'])))  : '' }}
                                                {{ $default['prov'] ? ', ' . Str::title(Str::lower($default['prov']))  : '' }}
                                            </h3>
                                        </div>
                                    </div>
                                    <div class="mail_list">
                                        <div class="left">
                                            <i class="fa fa-circle"></i> <i class="fa fa-list"></i>
                                        </div>
                                        <div class="right">
                                            Nomor WhatsApp
                                            <h3>{{ $data->hp }}</h3>
                                        </div>
                                    </div>
                                    <div class="mail_list">
                                        <div class="left">
                                            <i class="fa fa-circle"></i> <i class="fa fa-list"></i>
                                        </div>
                                        <div class="right">
                                            Email
                                            <h3>{{ $data->email }}</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-9 mail_view">
                                    <div class="inbox-body">
                                        <div class="view-mail">
                                            <table class="table  no-margin">
                                                <tbody>
                                                    <tr>
                                                        <td colspan="4"><strong>Data Perkuliahan</strong></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Program kuliah</td>
                                                        <td>{{ $data->program_kuliah()->first()->nama_program_kuliah }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Pilihan Program Studi Pertama</td>
                                                        <td>{{ $data->prodi1()->first()->nama_prodi }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Pilihan Program Studi Kedua</td>
                                                        <td>{{ $data->prodi2()->first()->nama_prodi }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="4"><strong>Data Orang Tua/Wali</strong></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Nama Ayah/Wali</td>
                                                        <td>{{ $data->nama_ayah }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Nama Ibu/Wali</td>
                                                        <td>{{ $data->nama_ibu }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Alamat Orang Tua/Wali</td>
                                                        <td>{{ $data->alamat_orangtua }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="4"><strong>Data Asal Sekolah</strong></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Nama Sekolah</td>
                                                        <td>{{ $data->nama_sekolah }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Jenjang dan Jurusan Sekolah</td>
                                                        <td>{{ $data->jenjang_sekolah()->first()->nama . ' - ' . $data->jurusan_sekolah }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Alamat Sekolah</td>
                                                        <td>{{ $data->alamat_sekolah }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Tahun Lulus</td>
                                                        <td>{{ $data->tahun_lulus }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="4"><strong>Data Pekerjaan</strong></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Nama Instansi</td>
                                                        <td>{{ $data->nama_instansi ? $data->nama_instansi : '-' }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Jabatan</td>
                                                        <td>{{ $data->jabatan ? $data->jabatan : '-' }}</td>
                                                    </tr>
                                                    @if (Auth::user()->role == 'user')
                                                        <th>Status Validasi</th>
                                                        <td><button class="btn {{ $data->status_validasi == 'Y' ? 'btn-success' : 'btn-danger' }}">{{ $data->status_validasi == 'Y' ? 'Telah Divalidasi' : 'Belum Divalidasi' }}</button></td>
                                                    @endif
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->
@endsection
