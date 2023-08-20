@extends('layouts.app')
@section('content')
<div class="alert alert-primary border-0 bg-primary alert-dismissible fade show py-2">
    <div class="d-flex align-items-center">
        <div class="ms-3 p-2">
            <div class="text-white">{{ Auth::user()->name }} !! {{ $title }}</div>
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
                        <h4 class="mb-0">Detail Upload dan Validasi Calon Mahasiswa</h4>
                    </div>
                    @forelse ( $dokumen as $tambah )
                        <div class="p-2">
                            <li class="nav navbar-right panel_toolbox">
                                <a href="{{ route('dokumenmahasiswa.editDokumen', $data->nik) }}" class="btn btn-sm btn-warning">Ubah Dokumen</a>
                            </li>
                        </div>
                    @empty
                        <div class="p-2">
                            <li class="nav navbar-right panel_toolbox">
                                <a href="{{ route('dokumenmahasiswa.createDokumen', $data->nik) }}"
                                    class="btn btn-sm btn-success">Masukkan Dokumen
                                </a>
                            </li>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
        <div class="card radius-10">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <div class="p-2">
                        <h4>KTP</h4>
                    </div>
                </div>
            </div>
            <div class="card-body ">
                @forelse ( $dokumen as $ktp )
                <div class="text-center">
                    <img src="{{ Storage::url('public/ktp/').$dokumen[0]->d_ktp }}" alt=""
                        style="width:700px; height:500px;">
                </div>
                <br><br><br>
                <div>
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>
                                    <h4>Tanggal Upload : {{ tanggal_indonesia($ktp->tgl_upload_ktp) }} </h4>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h4>Status Validasi : <button
                                            class="btn {{ $ktp->ktp_status == 'Y' ? 'btn-success' : 'btn-danger'}}">{{ $ktp->ktp_status == 'Y' ? 'Sudah Tervalidasi' : 'Belum Tervalidasi'}}
                                    </h4>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                @empty
                <button class="btn btn-danger">KTP Belum Di Upload</button>
                @endforelse
            </div>
        </div>
        <div class="card radius-10">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <div class="p-2">
                        <h4>Kartu Keluarga (KK) </h4>
                    </div>

                </div>
            </div>
            <div class="card-body ">
                @forelse ( $dokumen as $kk )
                <div class="text-center">
                    <img src="{{ Storage::url('public/kk/').$dokumen[0]->d_kk }}" alt=""
                        style="width:700px; height:500px; horizontal-align:middle;">
                </div>
                <br><br><br>
                <div>
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>
                                    <h4>Tanggal Upload : {{ tanggal_indonesia($kk->tgl_upload_kk) }} </h4>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h4>Status Validasi : <button
                                            class="btn {{ $kk->kk_status == 'Y' ? 'btn-success' : 'btn-danger'}}">{{ $kk->kk_status == 'Y' ? 'Sudah Tervalidasi' : 'Belum Tervalidasi'}}
                                    </h4>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                @empty
                <button class="btn btn-danger">KK Belum Di Upload</button>
                @endforelse
            </div>
        </div>
        <div class="card radius-10">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <div class="p-2">
                        <h4>Dokumen Wajib</h4>
                    </div>

                </div>
            </div>
            <div class="card-body ">
                @forelse ( $dokumen as $wajib )
                <div class="text-center">
                    <a href="{{ Storage::url('public/dokumen_wajib/').$dokumen[0]->dokumen_wajib }}" target="_blank"
                        class="btn btn-sm">
                        <img src="{{ asset('') }}pdf-icon.png" alt=""
                            style="width:500px; height:500px; horizontal-align:middle;">
                    </a>
                </div>
                <br><br><br>
                <div>
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>
                                    <h4>Tanggal Upload : {{ tanggal_indonesia($wajib->tgl_upload_dokumen_wajib) }} </h4>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h4>Status Validasi : <button
                                            class="btn {{ $wajib->dokumen_wajib_status == 'Y' ? 'btn-success' : 'btn-danger'}}">{{ $wajib->dokumen_wajib_status == 'Y' ? 'Sudah Tervalidasi' : 'Belum Tervalidasi'}}
                                    </h4>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                @empty
                <button class="btn btn-danger">Dokumen Wajib Belum Di Upload</button>
                @endforelse
            </div>
        </div>
        <div class="card radius-10">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <div class="p-2">
                        <h4>Dokumen Pendukung</h4>
                    </div>

                </div>
            </div>
            <div class="card-body ">
                @forelse ( $dokumen as $pendukung )
                <div class="text-center">
                    <a href="{{ Storage::url('public/dokumen_pendukung/').$dokumen[0]->dokumen_wajib }}" target="_blank"
                        class="btn btn-sm">
                        <img src="{{ asset('') }}pdf-icon.png" alt=""
                            style="width:500px; height:500px; horizontal-align:middle;">
                    </a>
                </div>
                <br><br><br>
                <div>
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>
                                    <h4>Tanggal Upload : {{ tanggal_indonesia($pendukung->tgl_upload_dokumen_wajib) }}
                                    </h4>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h4>Status Validasi : <button
                                            class="btn {{ $pendukung->dokumen_pendukung_status == 'Y' ? 'btn-success' : 'btn-danger'}}">{{ $pendukung->dokumen_pendukung_status == 'Y' ? 'Sudah Tervalidasi' : 'Belum Tervalidasi'}}
                                    </h4>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                @empty
                <button class="btn btn-danger">Dokumen Pendukung Belum Di Upload</button>
                @endforelse
            </div>
        </div>
        <div class="card radius-10">
            <div class="card-body">
                <h4>Keterangan dari Staff Pemvalidasi</h4>
                <p>
                    "
                    {{ $dokumen[0]->keterangan == '' ? 'Belum ada keterangan dari pemvalidasi' : $dokumen[0]->keterangan  }}
                    "
                </p>
            </div>
        </div>

    </div>
    @endsection
    @push('js')
    <script src="{{ asset('') }}rocker_admin/assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('') }}rocker_admin/assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
    @endpush
