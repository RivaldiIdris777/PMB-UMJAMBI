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
                <h5>Dokumen {{ $data->nama_mahasiswa }} | {{ $data->nik }}</h5>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>List Dokumen</h2>
                        <!-- <li class="nav navbar-right panel_toolbox">
                            <a href="{{ route('dokumenmahasiswa.createDokumen', $data->nik) }}"
                                class="btn btn-sm btn-success">Masukkan Dokumen
                            </a>
                        </li> -->
                        <li class="nav navbar-right panel_toolbox">
                            @forelse ( $dokumen as $delete )
                            <form action="{{ route('dokumenmahasiswa.destroy', $dokumen[0]->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" data-placement="top"
                                    data-toggle="tooltip"><i class="fa fa-trash"></i> Hapus Dokumen Mahasiswa
                                    {{ $data->nama_mahasiswa }}</button>
                            </form>
                            @empty
                            ''
                            @endforelse
                        </li>
                        <div class="clearfix"></div>

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>KTP</th>
                                    <th>Tanggal Upload</th>
                                    <th>Tanggal Validasi</th>
                                    <th>Status Validasi</th>
                                    <th>Admin Validasi</th>
                                    <th style="text-align:center;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ( $dokumen as $ktp )
                                <tr>
                                    <td>
                                        <img src="{{ Storage::url('public/ktp/').$dokumen[0]->d_ktp }}" alt=""
                                            style="width:30px; height:30px; object-fit: cover;">
                                    </td>
                                    <td>{{ $ktp->tgl_upload_ktp }}</td>
                                    <td>{{ $ktp->tgl_validasi_ktp }}</td>
                                    <td><button class="btn {{ $ktp->ktp_status == 'Y' ? 'btn-success' : 'btn-danger'}}">{{ $ktp->ktp_status}}</button></td>
                                    <td>{{ $ktp->admin()->first()->name }}</td>
                                    <td style="text-align:right;">
                                        <form action="{{ route('dokumenmahasiswa.validasiktp', $dokumen[0]->nik) }}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('put') }}
                                            <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-check"></i> Validasi Sekarang</button>
                                        </form>
                                        <form action="{{ route('dokumenmahasiswa.tolakvalidasiktp', $dokumen[0]->nik) }}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('put') }}
                                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Tolak Validasi</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                @endforelse
                            </tbody>
                        </table>

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>KK</th>
                                    <th>Tanggal Upload</th>
                                    <th>Tanggal Validasi</th>
                                    <th>Status Validasi</th>
                                    <th>Admin Validasi</th>
                                    <th style="text-align:center;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ( $dokumen as $kk )
                                <tr>
                                    <td>
                                        <img src="{{ Storage::url('public/kk/').$dokumen[0]->d_kk }}" alt=""
                                            style="width:30px; height:30px; object-fit: cover;">
                                    </td>
                                    <td>{{ $kk->tgl_upload_kk }}</td>
                                    <td>{{ $kk->tgl_validasi_kk }}</td>
                                    <td><button class="btn {{ $kk->kk_status == 'Y' ? 'btn-success' : 'btn-danger'}}">{{ $kk->kk_status}}</button></td>
                                    <td>{{ $ktp->admin()->first()->name }}</td>
                                    <td style="text-align:right;">
                                        <form action="{{ route('dokumenmahasiswa.validasikk', $dokumen[0]->nik) }}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('put') }}
                                            <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-check"></i> Validasi Sekarang</button>
                                        </form>
                                        <form action="{{ route('dokumenmahasiswa.tolakvalidasikk', $dokumen[0]->nik) }}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('put') }}
                                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Tolak Validasi</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                @endforelse
                            </tbody>
                        </table>

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Dokumen Wajib</th>
                                    <th>Tanggal Upload</th>
                                    <th>Tanggal Validasi</th>
                                    <th>Status Validasi</th>
                                    <th>Admin Validasi</th>
                                    <th style="text-align:center;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ( $dokumen as $wajib )
                                <tr>
                                    <td>
                                        <a href="{{ Storage::url('public/dokumen_wajib/').$dokumen[0]->dokumen_wajib }}"
                                        target="_blank" class="btn btn-danger btn-sm">Lihat Dokumen ||
                                        {{ $dokumen[0]->dokumen_wajib }}
                                        </a>
                                    </td>
                                    <td>{{ $wajib->tgl_upload_dokumen_wajib }}</td>
                                    <td>{{ $wajib->tgl_validasi_dokumen_wajib }}</td>
                                    <td><button class="btn {{ $wajib->dokumen_wajib_status == 'Y' ? 'btn-success' : 'btn-danger' }}">{{ $wajib->dokumen_wajib_status}}</button></td>
                                    <td>{{ $ktp->admin()->first()->name }}</td>
                                    <td style="text-align:right;">
                                        <form action="{{ route('dokumenmahasiswa.validasidokumenwajib', $dokumen[0]->nik) }}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('put') }}
                                            <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-check"></i> Validasi Sekarang</button>
                                        </form>
                                        <form action="{{ route('dokumenmahasiswa.tolakvalidasiwajib', $dokumen[0]->nik) }}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('put') }}
                                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Tolak Validasi</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                @endforelse
                            </tbody>
                        </table>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Dokumen Pendukung</th>
                                    <th>Tanggal Upload</th>
                                    <th>Tanggal Validasi</th>
                                    <th>Status Validasi</th>
                                    <th>Admin Validasi</th>
                                    <th style="text-align:center;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ( $dokumen as $pendukung )
                                <tr>
                                    <td>
                                        <a href="{{ Storage::url('public/dokumen_pendukung/').$dokumen[0]->dokumen_pendukung }}"
                                        target="_blank" class="btn btn-danger btn-sm">Lihat Dokumen ||
                                        {{ $dokumen[0]->dokumen_pendukung }}
                                        </a>
                                    </td>
                                    <td>{{ $wajib->tgl_upload_dokumen_pendukung }}</td>
                                    <td>{{ $pendukung->tgl_validasi_dokumen_pendukung }}</td>
                                    <td><button class="btn {{ $pendukung->dokumen_pendukung_status == 'Y' ? 'btn-success' : 'btn-danger' }}">{{ $pendukung->dokumen_pendukung_status}}</button></td>
                                    <td>{{ $ktp->admin()->first()->name }}</td>
                                    <td style="text-align:right;">
                                        <form action="{{ route('dokumenmahasiswa.validasidokumenpendukung', $dokumen[0]->nik) }}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('put') }}
                                            <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-check"></i> Validasi Sekarang</button>
                                        </form>
                                        <form action="{{ route('dokumenmahasiswa.tolakvalidasipendukung', $dokumen[0]->nik) }}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('put') }}
                                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Tolak Validasi</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                @endforelse
                            </tbody>
                        </table>

                        <form action="{{ route('dokumenmahasiswa.updateketerangan', $dokumen[0]->nik) }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('put') }}
                            <div class="form-group">
                                <label for="keterangan">Berikan Keterangan Untuk Kelengkapan Berkas</label>
                                <textarea name="keterangan" class="form-control" id="keterangan" cols="30" rows="10">{{ $dokumen[0]->keterangan == '' ? '' : $dokumen[0]->keterangan  }}</textarea>
                            </div>
                            <button type="submit" class="btn btn-success">Simpan Keterangan Validasi <i class="fa fa-row-left"></i></button>
                        </form>
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
