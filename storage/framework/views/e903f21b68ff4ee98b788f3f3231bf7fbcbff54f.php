
<?php $__env->startSection('title','Produk Tambah'); ?>
<?php $__env->startSection('parent','Produk'); ?>
<?php $__env->startSection('child','Tambah'); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Form Tambah Produk</h4>
                </div>
                <form method="POST" action="<?php echo e(route('dashboard.admin.product.store')); ?>"
                      enctype="multipart/form-data">
                    <div class="card-body">
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control" name="name" required placeholder="Nama">
                        </div>
                        <div class="form-group">
                            <label>Harga</label>
                            <input type="number" class="form-control" name="price" required placeholder="Harga" min="1" oninput="validity.valid||(value='');">
                        </div>
                        <div class="form-group">
                            <label>Stok</label>
                            <input type="number" class="form-control" name="stock" required placeholder="Jumlah" min="1" oninput="validity.valid||(value='');">
                        </div>
                        <div class="form-group">
                            <label>Gambar</label>
                            <input type="file" class="form-control" name="img" required>
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\KULIAH\SEMESTER 7\PPL\florafauna\resources\views/modules/dashboard/product/create.blade.php ENDPATH**/ ?>