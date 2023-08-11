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
                <h5>{{ $title }}</h5>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Pilih Konfirmasi Pembayaran dibawah ini </h2>
                        <li class="nav navbar-right panel_toolbox">

                        </li>
                        <li class="nav navbar-right panel_toolbox">

                        </li>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12 col-sm-4 d-flex justify-content-center">
            <div class="col-md-6">
                <div class="x_panel">
                    <div class="x_title">
                        <h2><i class="fa fa-id-card-o"></i>Masukkan Bukti Pembayaran (1)</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        @forelse ( $transaksi as $tf )
                        <a href="#" class="btn btn-success"><i class="fa fa-check"></i> Sudah Memasukkan Data Transaksi</a>
                        <a href="{{ route('transaksi.showTransaksi', $tf->id) }}" class="btn btn-success">Cek Data Transaksi <i class="fa fa-arrow-right"></i></a>
                        @empty
                            <a href="#" class="btn btn-warning">Belum Memasukkan Data Transaksi</a>
                            <a href="{{ route('transaksi.createByUser') }}" class="btn btn-warning">Silahkan Masukkan Bukti Transaksi Disini <i class="fa fa-arrow-right"></i></a>
                        @endforelse
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
