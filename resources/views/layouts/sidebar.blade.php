<!-- sidebar menu -->
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <h3>MENU </h3>
        <ul class="nav side-menu">
            @if (auth()->user()->role == 'admin')
                <li><a href="{{ url('/home') }}"><i class="fa fa-home"></i> Dashboard </a></li>
                <li><a href="{{ url('/mahasiswa') }}"><i class="fa fa-users"></i> Data Mahasiswa </a></li>
                <li><a href="{{ url('/dokumenmahasiswa') }}"><i class="fa fa-users"></i> Dokumen Mahasiswa </a></li>
                <li><a><i class="fa fa-bank"></i> Data Transaksi <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="{{ url('/transaksi') }}"></i> Sudah Divalidasi </a></li>
                        <li><a href="{{ url('/transaski/belum_validasi') }}"></i> Belum Divalidasi </a></li>
                    </ul>
                </li>
                <li><a><i class="fa fa-database"></i> Data Master <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="{{ route('gelombang.index') }}">Gelombang</a></li>
                        <li><a href="{{ route('agama.index') }}">Agama</a></li>
                        <li><a href="{{ route('jalur-pendaftaran.index') }}">Jalur Pendaftaran</a></li>
                    </ul>
                </li>
                <li><a><i class="fa fa-file-excel-o"></i> Export Excel <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="{{ route('excel.mahasiswa') }}"></i> Data Mahasiswa </a></li>
                    </ul>
                </li>
                <li><a href="javascript:void(0)"><i class="fa fa-laptop"></i> Landing Page <span
                            class="label label-success pull-right">Coming Soon</span></a></li>
                @elseif (auth()->user()->role == 'user')
                    @php
                            $user = App\Models\User::Where('id', Auth::user()->id)->get();
                            $trs = App\Models\Transaksi::Where('id_user', $user[0]->id);
                    @endphp
                    @if ($trs->count()<'1')
                        <li><a href="{{ url('/home') }}"><i class="fa fa-home"></i> Dashboard </a></li>
                        <li><a href="{{ route('transaksi.viewTransaksi') }}"><i class="fa fa-user"></i> Konfirmasi Pembayaran </a></li>

                    @else
                    <li><a href="{{ route('transaksi.viewTransaksi') }}"><i class="fa fa-user"></i> Konfirmasi Pembayaran </a></li>
                    <li><a href="{{ route('usermenu.index') }}"><i class="fa fa-user"></i> Lengkapi Registrasi</a></li>
                    @endif
                @endif
        </ul>
    </div>
</div>
<!-- /sidebar menu -->
