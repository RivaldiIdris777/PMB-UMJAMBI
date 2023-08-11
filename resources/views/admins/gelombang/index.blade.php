@extends('layouts.app')
@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Gelombang</h3>
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
                            <h2>Data Gelombang</h2>
                            <li class="nav navbar-right panel_toolbox"><a href="{{ route('gelombang.create') }}"
                                    class="btn btn-sm btn-success">Tambah Data</a>
                            </li>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Gelombang</th>
                                        <th>Nama Gelombang</th>
                                        <th>Status Gelombang</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($gelombang as $no => $item)
                                        <tr>
                                            <th scope="row">{{ ++$no }}</th>
                                            <td>{{ $item->kode_gelombang }}</td>
                                            <td>{{ $item->nama_gelombang }}</td>
                                            <td>{{ $item->status_gelombang == 'N' ? 'Tidak Aktif' : 'Aktif' }}</td>
                                            <td>
                                                @if ($item->status_gelombang == 'N')
                                                    <a class="btn btn-sm btn-info" href="#"
                                                        onclick="event.preventDefault();
                                                        document.getElementById('aktifkan-form{{ $item->id_gelombang }}').submit();">Aktifkan</a>
                                                    <form id="aktifkan-form{{ $item->id_gelombang }}"
                                                        action="{{ url('gelombang/aktifkan/' . $item->id_gelombang) }}"
                                                        method="POST" class="d-none">
                                                        @csrf
                                                        <input type="text" name="status_gelombang"
                                                            value="{{ $item->status_gelombang }}">
                                                    </form>
                                                @else
                                                    <a class="btn btn-sm btn-danger" href="#"
                                                        onclick="event.preventDefault();
                                                        document.getElementById('nonaktifkan-form{{ $item->id_gelombang }}').submit();">Non Aktifkan</a>
                                                    <form id="nonaktifkan-form{{ $item->id_gelombang }}"
                                                        action="{{ url('gelombang/aktifkan/' . $item->id_gelombang) }}"
                                                        method="POST" class="d-none">
                                                        @csrf
                                                        <input type="text" name="status_gelombang"
                                                            value="{{ $item->status_gelombang }}">
                                                    </form>
                                                @endif
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->
@endsection
