
<?php $__env->startSection('title','Produk'); ?>
<?php $__env->startSection('parent','Produk'); ?>
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
                                <p class="mb-0">Harga : Rp. <?php echo e(number_format($product->price)); ?></p>
                                <p class="mb-0">Stock : <?php echo e($product->stock); ?> kg</p>
                                <?php if($product->stock > 0): ?>
                                    <a href="<?php echo e(route('dashboard.user.product.add',['id'=> $product->id])); ?>">Beli</a>
                                <?php endif; ?>
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
    <div class="modal fade" tabindex="-1" role="dialog" id="deleteModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="title"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <form method="POST" id="form-delete-flora">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('delete'); ?>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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

        $('.btn-delete-flora').click(function () {
            var id = $(this).data('id');
            var name = $(this).data('name');
            $('#title').text("Apakah anda yakin akan menghapus data " + name + " ?")
            $('#form-delete-flora').attr('action', '<?php echo e(route('dashboard.admin.product.destroy')); ?>/' + id)
        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\KULIAH\SEMESTER 7\PPL\florafauna\resources\views/modules/dashboard/users/product/index.blade.php ENDPATH**/ ?>