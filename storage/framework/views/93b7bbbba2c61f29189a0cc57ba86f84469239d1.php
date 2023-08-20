<?php $__env->startPush('css'); ?>
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<link href="cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
<link href="<?php echo e(asset('')); ?>rocker_admin/assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<div class="alert alert-primary border-0 bg-primary alert-dismissible fade show py-2">
    <div class="d-flex align-items-center">
        <div class="ms-3 p-2">
            <div class="text-white">Welcome <?php echo e(Auth::user()->name); ?> !! Anda memasuki admin akses</div>
        </div>
    </div>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<div class="row">
    <div class="col-12">
        <div class="card radius-10">
            <div class="card-body">
                <div>
                    <h6>Cari Berdasarkan Gelombang</h6>
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="inputGroupSelect01">Gelombang Ke Berapa</label>
                        <select name="gelombang" id="gelombang" class="form-select">
                            <option value="">Semua Gelombang</option>
                            <?php $__currentLoopData = $gelombang; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($item->id_gelombang); ?>"><?php echo e($item->nama_gelombang); ?>

                            </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="card radius-10">
            <div class="card-body">
                <div>
                    <h6 class="mb-0">Data Mahasiswa</h6>
                    <li class="nav panel_toolbox mt-3"><a href="<?php echo e(route('mahasiswa.create')); ?>"
                            class="btn btn-sm btn-success">Tambah Data</a>
                    </li>
                    <div class="table-responsive mt-3">
                        <table id="table-datatable" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nomor Pendaftaran</th>
                                    <th>Nama Mahasiswa</th>
                                    <th>Nomor Induk Kependudukan</th>
                                    <th>Nomo Hp</th>
                                    <th width="100px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php $__env->stopSection(); ?>
    <?php $__env->startPush('js'); ?>
    <script src="<?php echo e(asset('')); ?>rocker_admin/assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo e(asset('')); ?>rocker_admin/assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var table = $('#table-datatable').DataTable({
                processing: true,
                serverSide: true,
                scrollX: true,
                ajax: {
                    url: "<?php echo e(route('mahasiswa.index')); ?>",
                    data: function (d) {
                        d.gelombang = $('#gelombang').val(),
                            d.search = $('input[type="search"]').val()
                    }
                },
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'no_registrasi',
                        name: 'no_registrasi'
                    },
                    {
                        data: 'nama_mahasiswa',
                        name: 'nama_mahasiswa'
                    },
                    {
                        data: 'nik',
                        name: 'nik'
                    },
                    {
                        data: 'hp',
                        name: 'hp'
                    },
                    {
                        data: 'action',
                        name: 'action',
                    },
                ]
            });

            $('#gelombang').change(function () {
                table.draw();
            });


            $('body').on('click', '.deleteMahasiswa', function () {
                var id = $(this).data("id");
                confirm("Anda yakin ingin menghapus data ini ?");
                $.ajax({
                    type: "DELETE",
                    url: "<?php echo e(route('mahasiswa.store')); ?>" + '/' + id,
                    success: function (data) {
                        table.draw();
                    },
                    error: function (data) {
                        console.log('Error:', data);
                        table.draw();
                    }
                });

            });
        })

    </script>
    <?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Folder_project\Laravel_project\pmbmahasiswa\resources\views/admins/mahasiswa/index.blade.php ENDPATH**/ ?>