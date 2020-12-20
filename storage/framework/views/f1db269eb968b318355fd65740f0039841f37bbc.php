
<?php $__env->startSection('title','Flora'); ?>
<?php $__env->startSection('parent','Flora'); ?>
<?php $__env->startSection('child','Detail'); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <img style="width: 100%"
                         class="mb-2"
                         src="<?php echo e(\Illuminate\Support\Facades\Storage::url($product->img)); ?>">
                    <h6>Nama : <?php echo e($product->name); ?></h6>
                    <p class="m-0">Spesies : <?php echo e($product->species); ?></p>
                    <p class="m-0">Nama Latin : <?php echo e($product->latin_name); ?></p>
                    <p class="m-0">Warna : <?php echo e($product->name); ?></p>
                    <p class="m-0">Karateristik : <?php echo e($product->characteristic); ?></p>
                    <p class="m-0">Habitat : <?php echo e($product->species); ?></p>
                    <p class="m-0">Bentuk : <?php echo e($product->shape); ?></p>
                    <p class="m-0">Status : <?php echo e($product->status); ?></p>
                    <p class="m-0">Jumlah : <?php echo e($product->total); ?></p>
                    <a href="<?php echo e(route('dashboard.user.flora.download',$product->id)); ?>"
                       target="_blank"
                       class="btn btn-primary btn-action mt-1" data-toggle="tooltip"
                       title="Print"><i
                            class="fas fa-print"></i></a>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\KULIAH\SEMESTER 7\PPL\florafauna\resources\views/modules/dashboard/users/flora/show.blade.php ENDPATH**/ ?>