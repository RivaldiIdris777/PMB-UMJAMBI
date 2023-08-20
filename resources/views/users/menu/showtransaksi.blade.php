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
                        <h4 class="mb-0">Bukti Biaya Pendaftaran</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="card radius-10">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <div class="p-2">
                        <h6 class="mb-0">Bukti Pembayaran</h6>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table no-margin">
                    <tbody>
                        <tr>
                            <div class="text-center">
                                <img class="center"
                                    src="{{ Storage::url('public/bukti_pembayaran/').$transaksi->berkas }}"
                                    alt="{{$transaksi->berkas}}" style="width:500px; height:1000px;">
                            </div>
                            <td>Gambar Bukti Transaksi</td>
                        </tr>
                        <tr>
                            <td colspan="4"><strong>Data Transaksi</strong></td>
                        </tr>
                        <tr>
                            <td>Program kuliah</td>
                            <td>{{ $transaksi->programkuliah()->first()->nama_program_kuliah }}
                            </td>
                        </tr>
                        <tr>
                            <td>Program Studi</td>
                            <td>{{ $transaksi->programstudi()->first()->nama_prodi }}
                            </td>
                        </tr>
                        <tr>
                            <td>Program Studi</td>
                            <td>{{ $transaksi->programstudi()->first()->nama_prodi }}
                            </td>
                        </tr>
                        <tr>
                            <td>Tanggal Upload</td>
                            <td>{{ $transaksi->tanggal_upload == "" ? 'Belum ada tanggal upload' : date('d-m-Y', strtotime($transaksi->tanggal_upload))  }}
                            </td>
                        </tr>
                        <tr>
                            <td>Jumlah Pembayaran</td>
                            <td>Rp.{{ format_uang($transaksi->jumlah_pembayaran) }}
                            </td>
                        </tr>
                        <tr>
                            <td>Terbilang</td>
                            <td>Rp.{{ strtoupper(terbilang($transaksi->jumlah_pembayaran)) }}
                                RUPIAH
                            </td>
                        </tr>
                        <tr>
                            <td>Tanggal Validasi</td>
                            <td>{{ $transaksi->tanggal_validasi == "" ? 'Belum ada tanggal validasi oleh admin' : date('d-m-Y', strtotime($transaksi->tanggal_validasi))  }}
                            </td>
                        </tr>
                        <tr>
                            <td>Status Validasi</td>
                            <td>
                                <button
                                    class="btn {{ $transaksi->status_validasi == 'Y' ? 'btn-success' : 'btn-danger' }}">{{ $transaksi->status_validasi }}</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
    @endsection
    @push('js')
    <script src="{{ asset('') }}rocker_admin/assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('') }}rocker_admin/assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
    @endpush
