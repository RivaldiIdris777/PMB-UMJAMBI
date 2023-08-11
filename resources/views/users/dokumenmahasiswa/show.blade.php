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
                        <li class="nav navbar-right panel_toolbox">
                            <a href="{{ route('dokumenmahasiswa.createDokumen', $data->nik) }}"
                                class="btn btn-sm btn-success">Masukkan Dokumen
                            </a>
                        </li>
                        <div class="clearfix"></div>

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>KTP</th>
                                    <th style="text-align:right;">Tanggal Upload</th>
                                    <th style="text-align:center;">Status Validasi</th>

                                </tr>
                            </thead>
                            <tbody>
                                @forelse ( $dokumen as $ktp )
                                <tr>
                                    <td>
                                        <img src="{{ Storage::url('public/ktp/').$dokumen[0]->d_ktp }}" alt=""
                                            style="width:30px; height:30px; object-fit: cover;">
                                    </td>
                                    <td style="text-align:right;">{{ $ktp->tgl_upload_ktp }}</td>
                                    <td style="text-align:center;"><button class="btn {{ $ktp->ktp_status == 'Y' ? 'btn-success' : 'btn-danger'}}">{{ $ktp->ktp_status}}</button></td>
                                </tr>
                                @empty
                                @endforelse
                            </tbody>
                        </table>

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>KK</th>
                                    <th style="text-align:right;">Tanggal Upload</th>
                                    <th style="text-align:center;">Status Validasi</th>
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
                                    <td style="text-align:center;"><button class="btn {{ $kk->kk_status == 'Y' ? 'btn-success' : 'btn-danger'}}">{{ $kk->kk_status}}</button></td>
                                </tr>
                                @empty
                                @endforelse
                            </tbody>
                        </table>

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Dokumen Wajib</th>
                                    <th style="text-align:center;">Tanggal Upload</th>
                                    <th style="text-align:center;">Status Validasi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ( $dokumen as $wajib )
                                <tr>
                                    <td>
                                        <a href="{{ Storage::url('public/dokumen_wajib/').$dokumen[0]->dokumen_wajib }}"
                                        target="_blank" class="btn btn-danger btn-sm">Lihat Dokumen || PDF
                                        </a>
                                    </td>
                                    <td>{{ $wajib->tgl_upload_dokumen_wajib }}</td>
                                    <td><button class="btn {{ $wajib->dokumen_wajib_status == 'Y' ? 'btn-success' : 'btn-danger' }}">{{ $wajib->dokumen_wajib_status}}</button></td>
                                </tr>
                                @empty
                                @endforelse
                            </tbody>
                        </table>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Dokumen Pendukung</th>
                                    <th style="text-align:center;">Tanggal Upload</th>
                                    <th>Status Validasi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ( $dokumen as $pendukung )
                                <tr>
                                    <td>
                                        <a href="{{ Storage::url('public/dokumen_pendukung/').$dokumen[0]->dokumen_pendukung }}"
                                        target="_blank" class="btn btn-danger btn-sm">Lihat Dokumen || PDF
                                        </a>
                                    </td>
                                    <td>{{ $wajib->tgl_upload_dokumen_pendukung }}</td>
                                    <td><button class="btn {{ $pendukung->dokumen_pendukung_status == 'Y' ? 'btn-success' : 'btn-danger' }}">{{ $pendukung->dokumen_pendukung_status}}</button></td>
                                </tr>
                                @empty
                                @endforelse
                            </tbody>
                        </table>
                        <div class="form-group">
                            <label for="keterangan">Keterangan Dalam Validasi</label>
                            <textarea name="keterangan" class="form-control" id="keterangan" cols="30" rows="10">{{ $dokumen[0]->keterangan == '' ? '' : $dokumen[0]->keterangan  }}</textarea>
                        </div>
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
