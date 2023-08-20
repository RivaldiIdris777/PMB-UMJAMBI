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
                        <h6 class="mb-0">Masukkan Bukti Pembayaran</h6>
                    </div>
                </div>
            </div>
            <div class="card-body">
                @forelse ( $transaksi as $tf )
                <a href="#" class="btn btn-success"><i class="fa fa-check"></i> Sudah Memasukkan Data Transaksi</a>
                <a href="{{ route('transaksi.showTransaksi', $tf->id) }}" class="btn btn-success">Cek Data Transaksi <i
                        class="fa fa-arrow-right"></i></a>
                @empty
                <a href="#" class="btn btn-warning">Belum Memasukkan Data Transaksi</a>
                <a href="{{ route('transaksi.createByUser') }}" class="btn btn-warning">Silahkan Masukkan Bukti
                    Transaksi Disini <i class="fa fa-arrow-right"></i></a>
                @endforelse
            </div>
        </div>

    </div>
    @endsection
    @push('js')
    <script src="{{ asset('') }}rocker_admin/assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('') }}rocker_admin/assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
    @endpush
