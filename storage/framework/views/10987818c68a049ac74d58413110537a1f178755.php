
<?php $__env->startSection('title','Fauna Edit'); ?>
<?php $__env->startSection('parent','Fauna'); ?>
<?php $__env->startSection('child','Edit'); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Form Edit Fauna</h4>
                </div>
                <form method="POST" action="<?php echo e(route('dashboard.admin.fauna.update',$product->id)); ?>"
                      enctype="multipart/form-data">
                    <div class="card-body">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('put'); ?>
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control" name="name" value="<?php echo e($product->name); ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Spesies</label>
                            <input type="text" class="form-control" name="species" value="<?php echo e($product->species); ?>"
                                   required>
                        </div>
                        <div class="form-group">
                            <label>Nama Latin</label>
                            <input type="text" class="form-control" name="latin_name" value="<?php echo e($product->latin_name); ?>"
                                   required>
                        </div>
                        <div class="form-group">
                            <label>Warna</label>
                            <input type="text" class="form-control" name="color" value="<?php echo e($product->color); ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Ciri Khas</label>
                            <input type="text" class="form-control" name="characteristic"
                                   value="<?php echo e($product->characteristic); ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Habitat</label>
                            <input type="text" class="form-control" name="habitat" value="<?php echo e($product->habitat); ?>"
                                   required>
                        </div>
                        <div class="form-group">
                            <label>Bentuk</label>
                            <input type="text" class="form-control" name="shape" value="<?php echo e($product->shape); ?>"
                                   required>
                        </div>
                        <div class="form-group">
                            <label>Jumlah</label>
                            <input type="number" class="form-control" name="total" value="<?php echo e($product->total); ?>"
                                   required>
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <select class="form-control" name="status">
                                <option <?php echo e($product->status == 'Dilindungi' ? 'selected' : ''); ?>>Dilindungi</option>
                                <option <?php echo e($product->status == 'Dikembangbiakkan' ? 'selected' : ''); ?>>Dikembangbiakkan
                                </option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Gambar</label>
                            <input type="file" class="form-control" name="image">
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\KULIAH\SEMESTER 7\PPL\florafauna\resources\views/modules/dashboard/fauna/edit.blade.php ENDPATH**/ ?>