<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="<?php echo e(asset('')); ?>logo_um.png" class="logo-icon" alt="logo icon">
        </div>
        <div class="mx-auto pt-2">
            <h4 class="logo-text">Menu</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <?php if(auth()->user()->role == 'admin'): ?>
        <li>
            <a href="<?php echo e(url('/home')); ?>">
                <div class="parent-icon"><i class='bx bx-home-circle'></i>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>
        <li class="menu-label">Pilihan Halaman</li>
        <li>
            <a href="<?php echo e(url('/mahasiswa')); ?>">
                <div class="parent-icon"><i class='bx bx-user'></i>
                </div>
                <div class="menu-title">Data Mahasiswa</div>
            </a>
        </li>
        <li>
            <a href="<?php echo e(url('/dokumenmahasiswa')); ?>">
                <div class="parent-icon"><i class='bx bx-folder'></i>
                </div>
                <div class="menu-title">Berkas Calon Mahasiswa</div>
            </a>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-wallet'></i>
                </div>
                <div class="menu-title">Transaksi</div>
            </a>
            <ul>
                <li> <a href="<?php echo e(url('/transaksi')); ?>"><i class="bx bx-right-arrow-alt"></i>Tervalidasi</a>
                </li>
                <li> <a href="<?php echo e(url('/transaski/belum_validasi')); ?>"><i class="bx bx-right-arrow-alt"></i>Belum
                        Tervalidasi</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-dialpad'></i>
                </div>
                <div class="menu-title">Data Master</div>
            </a>
            <ul>
                <li> <a href="<?php echo e(route('agama.index')); ?>"><i class="bx bx-church"></i>Agama</a>
                </li>
                <li> <a href="<?php echo e(route('gelombang.index')); ?>"><i class="bx bx-globe-alt"></i>Gelombang</a>
                </li>
                <li> <a href="<?php echo e(route('jalur-pendaftaran.index')); ?>"><i class="bx bx-pencil"></i>Jalur Pendaftaran</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="<?php echo e(route('excel.mahasiswa')); ?>">
                <div class="parent-icon"><i class='bx bx-spreadsheet'></i>
                </div>
                <div class="menu-title">Export Data Mahasiswa</div>
            </a>
        </li>
        <?php elseif(auth()->user()->role == 'user'): ?>
        <li class="menu-label">Pilihan Halaman</li>
        <li>
            <a href="<?php echo e(url('/home')); ?>">
                <div class="parent-icon"><i class='bx bx-info-square'></i>
                </div>
                <div class="menu-title">Info Utama</div>
            </a>
        </li>
        <li>
            <a href="<?php echo e(route('transaksi.viewTransaksi')); ?>">
                <div class="parent-icon"><i class='bx bx-wallet-alt'></i>
                </div>
                <div class="menu-title">Konfirmasi Pembayaran</div>
            </a>
        </li>
        <li>
            <a href="<?php echo e(route('usermenu.index')); ?>">
                <div class="parent-icon"><i class='bx bx-list-check'></i>
                </div>
                <div class="menu-title">Lengkapi Pendaftaran</div>
            </a>
        </li>
        <?php endif; ?>
    </ul>
    <!--end navigation-->
</div>
<?php /**PATH C:\laragon\www\Folder_project\Laravel_project\pmbmahasiswa\resources\views/layouts/sidebar.blade.php ENDPATH**/ ?>