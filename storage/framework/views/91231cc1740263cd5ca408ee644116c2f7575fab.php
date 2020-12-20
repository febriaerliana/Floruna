
<?php $__env->startSection('title','Fauna Tambah'); ?>
<?php $__env->startSection('parent','Fauna'); ?>
<?php $__env->startSection('child','Tambah'); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Form Tambah Fauna</h4>
                </div>
                <form method="POST" action="<?php echo e(route('dashboard.admin.fauna.store')); ?>"
                      enctype="multipart/form-data">
                    <div class="card-body">
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control" name="name" required>
                        </div>
                        <div class="form-group">
                            <label>Spesies</label>
                            <input type="text" class="form-control" name="species" required>
                        </div>
                        <div class="form-group">
                            <label>Nama Latin</label>
                            <input type="text" class="form-control" name="latin_name" required>
                        </div>
                        <div class="form-group">
                            <label>Warna</label>
                            <input type="text" class="form-control" name="color" required>
                        </div>
                        <div class="form-group">
                            <label>Ciri Khas</label>
                            <input type="text" class="form-control" name="characteristic" required>
                        </div>
                        <div class="form-group">
                            <label>Habitat</label>
                            <input type="text" class="form-control" name="habitat" required>
                        </div>
                        <div class="form-group">
                            <label>Bentuk</label>
                            <input type="text" class="form-control" name="shape" required>
                        </div>
                        <div class="form-group">
                            <label>Jumlah</label>
                            <input type="number" min="1" class="form-control" name="total" oninput="validity.valid||(value='');" required>
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <select class="form-control" name="status">
                                <option>Dilindungi</option>
                                <option>Dikembangbiakkan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Gambar</label>
                            <input type="file" class="form-control" name="image" required>
                        </div>

                    </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-primary mr-1" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\KULIAH\SEMESTER 7\PPL\florafauna\resources\views/modules/dashboard/fauna/create.blade.php ENDPATH**/ ?>