
<?php $__env->startSection('title','Fauna'); ?>
<?php $__env->startSection('parent','Fauna'); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <div class="media">
                            <img class="mr-3"
                                 src="<?php echo e(\Illuminate\Support\Facades\Storage::url($product->img)); ?>"
                                 alt="Generic placeholder image" width="150" height="150">
                            <div class="media-body">
                                <h5 class="mt-0"><?php echo e($product->name); ?></h5>
                                <p class="mb-0">Jumlah : <?php echo e($product->total); ?></p>
                                <p class="mb-0">Status : <?php echo e($product->status); ?></p>
                                <a href="<?php echo e(route('dashboard.user.fauna.show',$product->id)); ?>">Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('modal'); ?>
    <div class="modal fade" tabindex="-1" role="dialog" id="exampleModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Detail Gambar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <img class="img-thumbnail" id="img-lihat-foto" width="100%">
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script>
        $('.btn-detail-img').click(function (e) {
            var img = $(this).data('image');
            $('#img-lihat-foto').prop('src', img)
        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\KULIAH\SEMESTER 7\PPL\florafauna\resources\views/modules/dashboard/users/fauna/index.blade.php ENDPATH**/ ?>