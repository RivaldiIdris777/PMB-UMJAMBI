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
            <div>
                <h6></h6>
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <div class="p-2">
                            <h5>Biodata Mahasiswa</h5>
                        </div>
                        <div class="p-2">
                            @if (auth()->user()->role == 'admin')
                            <a target="__blank" href="{{ url('mahasiswa/print/' . $data[0]->id) }}"
                                class="btn btn-sm btn-warning text-center" data-original-title="Print"><i
                                    class="bx bx-printer text-white text-center"></i></a>

                            {{-- <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            <i class="fa fa-sign-out pull-right"></i> Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form> --}}
                            <form action="{{ route('mahasiswa.destroy', $data[0]->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" data-toggle="tooltip"><i
                                        class="bx bx-trash"></i></button>
                            </form>
                            @else
                            <a href="#" class="btn btn-danger btn-sm"><i class="fa fa-pencil"></i></a>
                            @endif
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="row">
                                <div class="col-sm-3 mail_list_column">
                                    <div class="mail_list text-center">
                                        <img class="mb-3"
                                            src="{{ Storage::url('public/mahasiswas/').$data[0]->gambar }}"
                                            alt="{{ $data[0]->nama_mahasiswa }}" widt="200" height="200">
                                    </div>
                                    <div class="mail_list">
                                        <div class="left">
                                            <i class="fa fa-circle"></i> <i class="fa fa-list"></i>
                                        </div>
                                        <div class="right">
                                            Nama Mahasiswa
                                            <h6>{{ $data[0]->nama_mahasiswa }}</h6>
                                        </div>
                                    </div>
                                    <div class="mail_list">
                                        <div class="left">
                                            <i class="fa fa-circle"></i> <i class="fa fa-list"></i>
                                        </div>
                                        <div class="right">
                                            Nomor Pendaftaran
                                            <h6>{{ $data[0]->no_registrasi }}</h6>
                                        </div>
                                    </div>
                                    <div class="mail_list">
                                        <div class="left">
                                            <i class="fa fa-circle"></i> <i class="fa fa-list"></i>
                                        </div>
                                        <div class="right">
                                            Nomor Induk Kependudukan
                                            <h6>{{ $data[0]->nik }}</h6>
                                        </div>
                                    </div>
                                    <div class="mail_list">
                                        <div class="left">
                                            <i class="fa fa-circle"></i> <i class="fa fa-list"></i>
                                        </div>
                                        <div class="right">
                                            Nomor Induk Siswa Nasional
                                            <h6>{{ $data[0]->nisn }}</h6>
                                        </div>
                                    </div>
                                    <div class="mail_list">
                                        <div class="left">
                                            <i class="fa fa-circle"></i> <i class="fa fa-list"></i>
                                        </div>
                                        <div class="right">
                                            Tempat, Tanggal Lahir
                                            <h6>{{ $data[0]->tempat_lahir ? $data[0]->tempat_lahir . ', ' : '' . $data[0]->tanggal_lahir }}
                                            </h6>
                                        </div>
                                    </div>
                                    <div class="mail_list">
                                        <div class="left">
                                            <i class="fa fa-circle"></i> <i class="fa fa-list"></i>
                                        </div>
                                        <div class="right">
                                            Jenis Kelamin
                                            <h6>{{ $data[0]->tempat_lahir . ', ' . $data[0]->tanggal_lahir }}</h6>
                                        </div>
                                    </div>
                                    <div class="mail_list">
                                        <div class="left">
                                            <i class="fa fa-circle"></i> <i class="fa fa-list"></i>
                                        </div>
                                        <div class="right">
                                            Agama
                                            <h6>{{ Str::ucfirst(Str::lower($data[0]->agama()->first()->name)) }}</h6>
                                        </div>
                                    </div>
                                    <div class="mail_list">
                                        <div class="left">
                                            <i class="fa fa-circle"></i> <i class="fa fa-list"></i>
                                        </div>
                                        <div class="right">
                                            Alamat
                                            <h6>{{ $data[0]->jalan ? 'Jalan ' . $data[0]->jalan : '' }}
                                                {{ $data[0]->rt ? 'RT/RW ' . $data[0]->rt : '' }}
                                                {{ $default['kel'] ? 'Kelurahan ' . $default['kel'] : '' }}
                                                {{ $default['kec'] ? 'Kecamatan ' . $default['kec'] : '' }}
                                                <br>
                                                {{ $default['kab'] ? Str::title((Str::lower($default['kab'])))  : '' }}
                                                {{ $default['prov'] ? ', ' . Str::title(Str::lower($default['prov']))  : '' }}
                                            </h6>
                                        </div>
                                    </div>
                                    <div class="mail_list">
                                        <div class="left">
                                            <i class="fa fa-circle"></i> <i class="fa fa-list"></i>
                                        </div>
                                        <div class="right">
                                            Nomor WhatsApp
                                            <h6>{{ $data[0]->hp }}</h6>
                                        </div>
                                    </div>
                                    <div class="mail_list">
                                        <div class="left">
                                            <i class="fa fa-circle"></i> <i class="fa fa-list"></i>
                                        </div>
                                        <div class="right">
                                            Email
                                            <h6>{{ $data[0]->email }}</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-9 mail_view">
                                    <div class="inbox-body">
                                        <div class="view-mail">
                                            <table class="table no-margin">
                                                <tbody>
                                                    <tr>
                                                        <td colspan="4"><strong>Data Perkuliahan</strong></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Program kuliah</td>
                                                        <td>{{ $data[0]->program_kuliah()->first()->nama_program_kuliah }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Pilihan Program Studi Pertama</td>
                                                        <td>{{ $data[0]->prodi1()->first()->nama_prodi }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Pilihan Program Studi Kedua</td>
                                                        <td>{{ $data[0]->prodi2()->first()->nama_prodi }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="4"><strong>Data Orang Tua/Wali</strong></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Nama Ayah/Wali</td>
                                                        <td>{{ $data[0]->nama_ayah }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Nama Ibu/Wali</td>
                                                        <td>{{ $data[0]->nama_ibu }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Alamat Orang Tua/Wali</td>
                                                        <td>{{ $data[0]->alamat_orangtua }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="4"><strong>Data Asal Sekolah</strong></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Nama Sekolah</td>
                                                        <td>{{ $data[0]->nama_sekolah }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Jenjang dan Jurusan Sekolah</td>
                                                        <td>{{ $data[0]->jenjang_sekolah()->first()->nama . ' - ' . $data[0]->jurusan_sekolah }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Alamat Sekolah</td>
                                                        <td>{{ $data[0]->alamat_sekolah }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Tahun Lulus</td>
                                                        <td>{{ $data[0]->tahun_lulus }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="4"><strong>Data Pekerjaan</strong></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Nama Instansi</td>
                                                        <td>{{ $data[0]->nama_instansi ? $data[0]->nama_instansi : '-' }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Jabatan</td>
                                                        <td>{{ $data[0]->jabatan ? $data[0]->jabatan : '-' }}</td>
                                                    </tr>
                                                    <th>Status Validasi</th>
                                                    <td><button
                                                            class="btn {{ $data[0]->status_validasi == 'Y' ? 'btn-success' : 'btn-danger' }}">{{ $data[0]->status_validasi == 'Y' ? 'Telah Divalidasi' : 'Belum Divalidasi' }}</button>
                                                    </td>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <form action="{{ route('mahasiswa.validasimahasiswa', $data[0]->id) }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('put') }}
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-success ">Validasi Data</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection
